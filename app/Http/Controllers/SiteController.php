<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\MenusRepository;

class SiteController extends Controller
{
    //
    protected $articles_rep;
    protected $blogs_rep;
    protected $sliders_rep;
    protected $comments_rep;

    protected $title;
    protected $keywords;
    protected $meta_desc;

    protected $template;

    protected $crumbs;

    // repositories

    protected $m_rep;

    protected $vars;

    public function __construct(MenusRepository $m_rep)
    {
        $this->m_rep = $m_rep;
    }

    public function getMenu() {
        $menu = $this->m_rep->get();
        return $menu;
    }

    public function renderOutput() {
        return view($this->template)->with($this->vars);
    }
}
