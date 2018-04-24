<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends SiteController
{
    //
    public function __construct()
    {
        $this->template = env('THEME').'.index';
    }
    // метод отображение информации на главной сранице
    public function index() {
        return $this->renderOutput();
    }
}
