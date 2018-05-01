<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BlogsRepository;
use App\Repositories\MenusRepository;

use App\Menu;

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

        $content = view(env('THEME').'.blogs_content')->render();

        $this->vars = array_add($this->vars,'content',$content);


        return $this->renderOutput();
    }
}
