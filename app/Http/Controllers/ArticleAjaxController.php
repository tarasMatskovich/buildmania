<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Article;

use Log;

use App\Repositories\ArticlesRepository;
use App\Repositories\CommentsRepository;

class ArticleAjaxController extends SiteController
{
    //
    public function __construct(ArticlesRepository $a_rep, CommentsRepository $c_rep)
    {
        $this->articles_rep = $a_rep;
        $this->comments_rep = $c_rep;
    }

    public function take(Request $request) {
        $data['offset'] = $request->input('offset');
        $articles = $this->articles_rep->get('*',$data['offset'],9, false , ['created_at','desc']);
        $articles_content = view(env('THEME').'.only_articles_content')->with('articles',$articles)->render();
        $data['articles_content'] = $articles_content;
        return Response::json($data);
    }

    public function takeByCat(Request $request) {
        $data['offset'] = $request->offset;
        $articles  = $this->articles_rep->get('*',$data['offset'],9, ['category_id',$request->cat_id]);

        $articles_content = view(env('THEME').'.only_articles_content')->with('articles',$articles)->render();
        $data['articles_content'] = $articles_content;
        return Response::json($data);
    }

    public function moreComments(Request $request) {
        $id = $request->id;
        $offset = $request->offset;
        $comments = $this->getCommentsToArticle($id,$offset);


        if($comments) {
            $comments = $comments->groupBy('parent_id');

            foreach($comments as $comment) {
                foreach($comment as $item) {
                    $item->user->img = json_decode($item->user->img);
                }
            }
        }

        $data['comments_content'] = view(env('THEME').'.only_comments')->with('comments',$comments)->render();
        return Response::json($data);
    }

    public function getCommentsToArticle($id, $offset) {
        return $this->comments_rep->get('*',$offset,2,['article_id',$id]);
    }


}
