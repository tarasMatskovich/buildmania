<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\MenusRepository;
use App\Repositories\ArticlesRepository;
use App\Repositories\BlogsRepository;
use App\Repositories\SlidersRepository;
use App\Menu;

class IndexController extends SiteController
{
    //
    public function __construct(ArticlesRepository $a_rep, BlogsRepository $blogs_rep,SlidersRepository $sliders_rep)
    {
        $this->articles_rep = $a_rep;
        $this->blogs_rep = $blogs_rep;
        $this->sliders_rep = $sliders_rep;
        // вызываем родительский конструктор для инициализации модели Меню
        parent::__construct(new MenusRepository(new Menu));
        $this->template = env('THEME').'.index';
    }
    // метод отображение информации на главной сранице
    public function index() {
        // получаем колекцию моделей меню
        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.menu_content')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);

        $articles = $this->getLatestArticles();




        $blogs = $this->getLatestBlogs();

        $slider = $this->getSlider();





        $content = view(env('THEME').'.index_content')->with(['articles'=>$articles,'blogs'=>$blogs,'slider'=>$slider])->render();
        $this->vars = array_add($this->vars,'content',$content);
        return $this->renderOutput();
    }

    protected function getLatestArticles() {
        $articles = $this->articles_rep->get(['id','img','title','desc','category_id'],false,3,false,['created_at','desc']);

        return $articles;
    }

    protected function getLatestBlogs() {
        $blogs = $this->blogs_rep->get(['id','img','title','text','blog_category_id','user_id'],false,3,false,['created_at','desc']);

        return $blogs;
    }

    protected function getSlider() {
        return $this->sliders_rep->get();
    }
}
