<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BlogsRepository;
use App\Repositories\MenusRepository;
use App\Repositories\CommentsRepository;

use App\Menu;
use App\Blog;
use App\BlogCategory;
use Session;

use Validator;
use App\BlogComment;

class BlogsController extends SiteController
{
    //

    public function __construct(BlogsRepository $b_rep, CommentsRepository $c_rep) {
        // сохраняем нужные для роботы репозитории
        $this->blogs_rep = $b_rep;
        $this->comments_rep = $c_rep;
        // вызываем родительский конструктор для инициализации модели Меню
        parent::__construct(new MenusRepository(new Menu));
        $this->template = env('THEME').'.blogs';

        // делаем хлебные крошки
        $this->crumbs = array();
        $this->crumbs[] = [
            'url' => '/',
            'name' => 'Главная'
        ];
        $this->crumbs[] = [
            'url' => '/blogs',
            'name' => 'Блоги'
        ];

        $this->vars = array_add($this->vars,'crumbs',$this->crumbs);


    }

    public function take($id) {
        // получаем колекцию моделей меню
        $menu = $this->getMenu();
        $navigation = view(env('THEME') . '.menu_content')->with('menu', $menu)->render();
        $this->vars = array_add($this->vars, 'navigation', $navigation);
        $blog = $this->getBlogsById($id);

        $cat_id = $blog->blog_category_id;
        $model = BlogCategory::find($cat_id);
        $blog->category = $model;


        $blog->rating = json_decode($blog->rating);

        $blog->user->img = json_decode($blog->user->img);



        $comments = $this->getCommentsToBlog($blog->id);




        if($comments) {
            $comments = $comments->groupBy('parent_id');

            foreach($comments as $comment) {
                foreach($comment as $item) {
                    $item->user->img = json_decode($item->user->img);
                }
            }
        }




        $content = view(env('THEME').'.blog_content')->with(['blog'=>$blog,'comments'=>$comments]);

        $this->vars = array_add($this->vars, 'content', $content);

        return $this->renderOutput();


    }

    public function getCommentsToBlog($id) {
        return BlogComment::select("*")->take(4)->where('blog_id',$id)->get();
    }

    public function getBlogsById($id) {
        return $this->blogs_rep->get('*',false,false,['id',$id])->first();
    }

    public function index() {
        // получаем колекцию моделей меню
        $menu = $this->getMenu();
        $navigation = view(env('THEME') . '.menu_content')->with('menu', $menu)->render();
        $this->vars = array_add($this->vars, 'navigation', $navigation);
        $blogs = $this->getBlogs();


        foreach ($blogs as $blog) {
            $cat_id = $blog->blog_category_id;
            $model = BlogCategory::find($cat_id);
            $blog->category = $model;
        }

        // получаем колекцию категорий для записей блога

        $categories = BlogCategory::select('*')->get();


        $content = view(env('THEME') . '.blogs_content')->with(['blogs' => $blogs, 'categories' => $categories])->render();

        $this->vars = array_add($this->vars, 'content', $content);


        return $this->renderOutput();
    }

    public function search (Request $request) {
        // получаем колекцию моделей меню
        $menu = $this->getMenu();
        $navigation = view(env('THEME') . '.menu_content')->with('menu', $menu)->render();
        $this->vars = array_add($this->vars, 'navigation', $navigation);

        if($request->isMethod('post')) {
            $rules = array();
            $messages = [
                'required' => 'Введите искомое слово',
                'min' => 'Минимальное кол-во символов - 3',
                'max' => 'Максимальное кол-во символов - 255'
            ];
            $rules = [
                'keywords' => 'required|min:3|max:255'
            ];
            $validator = Validator::make($request->only(['keywords']),$rules,$messages);
            //dd($validator);
            if($validator->fails()) {
                return redirect('/blogs')
                    ->withErrors($validator)
                    ->with('oldInput',$request->only(['keywords'])['keywords']);
            }



            $blogs = $this->getSearchedBlogs($request->only(['keywords'])['keywords']);

            session(['oldInput'=>$request->only(['keywords'])['keywords']]);


            $content = view(env('THEME') . '.search_blogs_content')->with(['blogs' => $blogs])->render();

            $this->vars = array_add($this->vars, 'content', $content);


            return $this->renderOutput();


        } else {
            $oldInput = $request->only('page');
            if($oldInput) {
                $blogs = $this->getSearchedBlogs(session('oldInput'));

                $lastPage = $blogs->lastPage();

                $currentPage = $blogs->currentPage();

                if($currentPage < 0 || $currentPage > $lastPage) {
                    abort(404);
                }

                $content = view(env('THEME') . '.search_blogs_content')->with(['blogs' => $blogs])->render();

                $this->vars = array_add($this->vars, 'content', $content);


                return $this->renderOutput();
            } else {
                abort(404);
            }
        }
    }

    public function getBlogs() {
        return $this->blogs_rep->get('*',0,2, false, ['created_at','desc']);
    }

    public function getSearchedBlogs($keyword) {
        return $this->blogs_rep->getSearchedBlogs($keyword);
    }
}
