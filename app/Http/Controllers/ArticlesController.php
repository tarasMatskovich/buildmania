<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository;
use App\Repositories\MenusRepository;

use App\Menu;
use App\ArticleCategory;
class ArticlesController extends SiteController
{
    //
    public function __construct(ArticlesRepository $a_rep)
    {
        $this->articles_rep = $a_rep;
        // вызываем родительский конструктор для инициализации модели Меню
        parent::__construct(new MenusRepository(new Menu));
        $this->template = env('THEME').'.articles';

        // делаем хлебные крошки
        $this->crumbs = array();
        $this->crumbs[] = [
            'url' => '/',
            'name' => 'Главная'
        ];
        $this->crumbs[] = [
            'url' => '/articles',
            'name' => 'Статьи'
        ];

        $this->vars = array_add($this->vars,'crumbs',$this->crumbs);

    }
    public function index() {
        // получаем колекцию моделей меню
        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.menu_content')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);

        $articles = $this->getAllArticles();

        //dd($articles[0]->category);

        $categories = $this->getCategories();






        $content = view(env('THEME').'.articles_content')->with(['articles'=>$articles,'categories'=>$categories])->render();
        $this->vars = array_add($this->vars,'content',$content);
        return $this->renderOutput();
    }

    public function getCategories() {
        $categories = ArticleCategory::select(['id','title','parent_id','url'])->get();

        return $categories;
    }

    public function getAllArticles() {
        return $this->articles_rep->get('*',0,9);
    }
}
