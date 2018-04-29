<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use Article;

use App\Repositories\ArticlesRepository;

class ArticleAjaxController extends SiteController
{
    //
    public function __construct(ArticlesRepository $a_rep)
    {
        $this->articles_rep = $a_rep;
    }

    public function take(Request $request) {
        $data['offset'] = $request->input('offset');
        $articles = $this->articles_rep->get('*',$data['offset'],3);
        $articles_content = view(env('THEME').'.only_articles_content')->with('articles',$articles)->render();
        $data['articles_content'] = $articles_content;
        return Response::json($data);
    }
}
