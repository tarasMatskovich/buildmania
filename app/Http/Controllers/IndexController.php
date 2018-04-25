<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\MenusRepository;
use App\Menu;

class IndexController extends SiteController
{
    //
    public function __construct()
    {
        // вызываем родительский конструктор для инициализации модели Меню
        parent::__construct(new MenusRepository(new Menu));
        $this->template = env('THEME').'.index';
    }
    // метод отображение информации на главной сранице
    public function index() {
        // получаем колекцию моделей меню
        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.menu_content')->with('menu',$menu);
        $this->vars = array_add($this->vars,'navigation',$navigation);
        return $this->renderOutput();
    }
}
