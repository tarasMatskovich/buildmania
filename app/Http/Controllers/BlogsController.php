<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BlogsRepository;
use App\Repositories\MenusRepository;

use App\Menu;
use App\BlogCategory;

class BlogsController extends SiteController
{
    //

    public function __construct(BlogsRepository $b_rep) {
        $this->blogs_rep = $b_rep;
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

    public function index() {
        // получаем колекцию моделей меню
        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.menu_content')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);

        $blogs = $this->getBlogs();



        foreach($blogs as $blog) {
            $cat_id = $blog->blog_category_id;
            $model = BlogCategory::find($cat_id);
            $blog->category = $model;
        }




        $content = view(env('THEME').'.blogs_content')->with('blogs',$blogs)->render();

        $this->vars = array_add($this->vars,'content',$content);


        return $this->renderOutput();
    }

    public function getBlogs() {
        return $this->blogs_rep->get('*',0,2, false, ['created_at','desc']);
    }
}
