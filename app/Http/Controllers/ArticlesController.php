<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository;
use App\Repositories\MenusRepository;
use App\Repositories\CommentsRepository;

use App\Menu;
use App\ArticleCategory;
use App\Comment;


class ArticlesController extends SiteController
{
    //
    public function __construct(ArticlesRepository $a_rep, CommentsRepository $c_rep)
    {
        $this->articles_rep = $a_rep;
        $this->comments_rep = $c_rep;
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

    public function getCatModel($cat_alias) {
        $model = ArticleCategory::select('*')->where('url',$cat_alias)->first();
        return $model;
    }

    public function getCatModelById($id) {
        return ArticleCategory::find($id);
    }

    public function byCategories($cat_alias) {
        // получаем колекцию моделей меню
        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.menu_content')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);

        $cat_model = $this->getCatModel($cat_alias);

        $cat_id = $cat_model->id;

        $cat_name = $cat_model->title;

        $articles = $this->getArticlesByCategory($cat_id);

        $content = view(env('THEME').'.articles_cat_content')->with(['articles'=>$articles,'cat_model'=>$cat_model]);

        $this->vars = array_add($this->vars,'content',$content);

        return $this->renderOutput();


    }

    public function getArticlesByCategory($id) {
        return $this->articles_rep->get('*',0,9,['category_id',$id]);
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


    public function take($id) {
        // получаем колекцию моделей меню
        $menu = $this->getMenu();
        $navigation = view(env('THEME').'.menu_content')->with('menu',$menu)->render();
        $this->vars = array_add($this->vars,'navigation',$navigation);

        $article = $this->getOneArticle($id);

        $article->user->img = json_decode($article->user->img);


        $category = $this->getCatModelById($article->category_id);

        $article->category = $category;

        $text = $article->text;
        $matches = [];


        preg_match_all("#<h2>(.*?)</h2>#is", $text, $matches);;

        $subjects = $matches[1];

        $categories = $this->getCategories();

        $comments = $this->getCommentsToArticle($article->id);







        if($comments) {
            $comments = $comments->groupBy('parent_id');

            foreach($comments as $comment) {
                foreach($comment as $item) {
                    $item->user->img = json_decode($item->user->img);
                }
            }
        }

        $popular_articles = $this->getPopularArticles();

        $last_articles = $this->getLatestArticles();





        $content = view(env('THEME').'.article_content')->with([
            'article'=>$article,
            'categories'=>$categories,
            'subjects'=>$subjects,
            'comments'=>$comments,
            'popular_articles'=>$popular_articles,
            'last_articles'=>$last_articles])->render();

        $this->vars = array_add($this->vars,'content',$content);

        $this->crumbs[] = [
            'url' => '/articles/'.$id,
            'name' => $article->title
        ];


        $tmp_array  = $this->crumbs;

        unset($this->vars['crumbs']);
        $this->vars = array_add($this->vars,'crumbs',$tmp_array);




        return $this->renderOutput();
    }

    public function getLatestArticles() {
        return $this->articles_rep->get(['id','title','created_at'],0,8,false,['created_at','desc']);
    }

    public function getPopularArticles() {
        return $this->articles_rep->get(['id','title','views'],0,8,false,['views','desc']);
    }

    public function getCommentsToArticle($id) {
        return $this->comments_rep->get('*',0,4,['article_id',$id]);
    }

    public function getOneArticle($id) {
        return $this->articles_rep->get('*',false,false,['id',$id])->first();
    }
}
