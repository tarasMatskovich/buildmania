<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\MenusRepository;
use App\Repositories\ProgramsRepository;

use App\Menu;
use App\Program;
use App\ProgramComment;

use Cookie;

class ProgramsController extends SiteController
{
    //
    public $targets = array('Подготовительная','Набор массы','Жиросжигание','Увеличение силы','Выносливость','Поддержание формы');

    public $difficults = array('Новичок','Любитель','Проффесионал');

    public $body_types = array('Эктоморф','Мезоморф','Эндоморф');

    public $genders = array('Для мужчин', 'Для женщин', 'Для всех');


    public function __construct(ProgramsRepository $p_rep) {
        // сохраняем нужные для роботы репозитории
        $this->programs_rep = $p_rep;
        // вызываем родительский конструктор для инициализации модели Меню
        parent::__construct(new MenusRepository(new Menu));
        $this->template = env('THEME').'.programs';

        // делаем хлебные крошки
        $this->crumbs = array();
        $this->crumbs[] = [
            'url' => '/',
            'name' => 'Главная'
        ];
        $this->crumbs[] = [
            'url' => '/programs',
            'name' => 'Программы тренировок'
        ];

        $this->vars = array_add($this->vars,'crumbs',$this->crumbs);

        // получаем колекцию моделей меню
        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.menu_content')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);
    }

    public function index() {

        $programs = $this->programs_rep->get('*',0,0,0,0,8);

        $content = view(env('THEME').'.programs_content')->with(['programs'=>$programs])->render();
        $this->vars = array_add($this->vars,'content',$content);

        return $this->renderOutput();
    }

    public function find(Request $request) {
        $data = array();
        if($request->isMethod('post')) {

            if($request->target !== 'false') {
                $data['target'] = $request->target;
            }
            if($request->difficult !== 'false') {
                $data['difficult'] = $request->difficult;
            }

            if($request->gender !== 'false') {
                $data['gender'] = $request->gender;
            }
            if($request->body_type !== 'false') {
                $data['body_type'] = $request->body_type;
            }

            if(empty($data)) {
                return redirect()->route('programs');
            }
            session(['programs_data'=>serialize($data)]);
        } else {
            $data = unserialize(session('programs_data'));
        }

        //dump($data);


        $programs = $this->getNeededPrograms($data);

        if($programs) {
            if(!$programs->isEmpty()) {
                $programs->transform(function($item,$key){
                    if(is_string($item->img) && is_object(json_decode($item->img)) && json_last_error() == JSON_ERROR_NONE) {
                        $item->img = json_decode($item->img);
                    }
                    if(is_string($item->time) && is_object(json_decode($item->time)) && json_last_error() == JSON_ERROR_NONE) {
                        $item->time = json_decode($item->time);
                    }
                    if(is_string($item->rating) && is_object(json_decode($item->rating)) && json_last_error() == JSON_ERROR_NONE) {
                        $item->rating = json_decode($item->rating);
                    }
                    $item->difficult = $this->difficults[$item->difficult];
                    $item->target = $this->targets[$item->target];
                    $item->body_type = $this->body_types[$item->body_type];
                    return $item;
                });
            }
        }

        $data2 = array();
        if(isset($data['target']))
            $data2[] = $this->targets[$data['target']];
        if(isset($data['difficult']))
            $data2[] = $this->difficults[$data['difficult']];
        if(isset($data['gender']))
            $data2[] = $this->genders[$data['gender']];
        if(isset($data['body_type']))
            $data2[] = $this->body_types[$data['body_type']];


        $content = view(env('THEME').'.programs_content')->with(['programs'=>$programs, 'data'=>$data2])->render();
        $this->vars = array_add($this->vars,'content',$content);

        return $this->renderOutput();
    }

    public function getNeededPrograms($data) {
        $builder = Program::select('*');
        if(isset($data['target'])) {
            $builder->where('target',$data['target']);
        }
        if(isset($data['difficult'])) {
            $builder->where('difficult',$data['difficult']);
        }
        if(isset($data['gender'])) {
            $builder->where('gender',$data['gender']);
        }
        if(isset($data['body_type'])) {
            $builder->where('body_type',$data['body_type']);
        }

        return $builder->paginate(8);

    }

    public function take($id) {

        $program = $this->getOneProgram($id);

        $this->crumbs[] = [
            'url' => '/',
            'name' => $program->title
        ];

        $program->user->img = json_decode($program->user->img);

        $comments = $this->getCommentsToProgram($program->id);

        if($comments) {
            $comments = $comments->groupBy('parent_id');

            foreach($comments as $comment) {
                foreach($comment as $item) {
                    $item->user->img = json_decode($item->user->img);
                }
            }
        }


        $content = view(env('THEME').'.program_content')->with([
            'program'=>$program,
            'crumbs'=>$this->crumbs,
            'comments'=>$comments])->render();

        $this->vars = array_add($this->vars,'content',$content);

        return $this->renderOutput();
    }

    public function getCommentsToProgram($id) {
        return ProgramComment::select('*')->where('program_id',$id)->skip(0)->take(4)->get();
    }

    public function getOneProgram($id) {
        return $this->programs_rep->get('*',0,0,['id',$id])->first();
    }
}
