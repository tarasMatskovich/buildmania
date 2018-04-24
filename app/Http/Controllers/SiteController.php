<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    protected $articles_rep;
    protected $blogs_rep;

    protected $title;
    protected $keywords;
    protected $meta_desc;

    protected $template;

    protected $vars;

    public function __construct()
    {

    }

    public function renderOutput() {
        return view($this->template)->with($this->vars);
    }
}
