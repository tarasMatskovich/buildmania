<section class="articles">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title">
                    <h1>Статьи в категории: <br> <span style="color: #00bcd4">{{$cat_model->title}}</span></h1>
                    <hr>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="all-articles">
                    <div class="row" id="append_articles">
                        @if($articles && !$articles->isEmpty())
                            @foreach($articles as $article)
                                <div class="col-md-4">
                                    <div class="article">
                                        <a href="{{route('article',['id'=>$article->id])}}"><img src="{{asset(env('THEME'))}}/img/{{$article->img->original}}" alt=""></a>
                                        <a href="{{route('article',['id'=>$article->id])}}">{{str_limit($article->title,50)}}</a>
                                        <p>
                                            {{str_limit($article->desc,110)}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h2>Статтей нет в даной категории.</h2>
                        @endif
                    </div>
                    @if($articles && !$articles->isEmpty())
                        <div class="row">
                            <div class="col">
                                <div class="more-comments">
                                    <form action="" id="more_articles_cat_form">
                                        <span id="more_articles_cat">Показать ещё</span>
                                        <input type="hidden" name="offset" value="9" id="my_article_cat_offset">
                                        <input type="hidden" name="cat" value="{{$cat_model->id}}" id="my_article_cat_id">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            </div>
        </div>

    </div>
</section>