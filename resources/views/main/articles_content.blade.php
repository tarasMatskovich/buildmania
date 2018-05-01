<section class="articles">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title">
                    <h1>Статьи</h1>
                    <hr>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 order-2 order-md-1">
                <div class="all-articles">
                    <div class="row" id="append_articles">
                        @if($articles && !$articles->isEmpty())
                            @foreach($articles as $article)
                                <div class="col-md-4">
                                    <div class="article">
                                        <a href="#"><img src="{{asset(env('THEME'))}}/img/{{$article->img->original}}" alt=""></a>
                                        <a href="#">{{str_limit($article->title,50)}}</a>
                                        <p>
                                            {{str_limit($article->desc,110)}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h2>Статтей нет.</h2>
                        @endif
                    </div>
                    @if($articles && !$articles->isEmpty())
                    <div class="row">
                        <div class="col">
                            <div class="more-comments">
                                <form action="" id="more_articles_form">
                                    <span id="more_articles">Показать ещё</span>
                                    <input type="hidden" name="offset" value="9" id="my_article_offset">
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-md-3 order-1 order-md-2">
                <div class="recepts-categories">
                    <p>Категории:</p>

                    <ul>
                        @if($categories && !$categories->isEmpty())
                            @foreach($categories as $cat)
                                @if($cat->parent_id == 0)
                                    <li>
                                        <a href="{{route('articles').'/'.$cat->url}}">
                                            {{$cat->title}}
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                @endif

                                @foreach($categories as $item)
                                    @if($item->parent_id == $cat->id)
                                        <li><a href="{{route('articles').'/'.$cat->url}}" class="sub-cat">{{$item->title}}</a></li>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>