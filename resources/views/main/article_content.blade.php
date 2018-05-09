
<section class="part-article-top">
    <div class="container">
        <div class="row">
            <div class="col-md-9 order-2 order-md-1">
                <div class="part-article-img">
                    <span></span>
                    <img src="{{asset(env('THEME'))}}/img/{{$article->img->original}}" alt="">
                </div>
                <div class="part-article-title">
                    <h1>Как запастись жизненной энергией и укрепить здоровье</h1>
                </div>
            </div>
            <div class="col-md-3 order-1 order-md-2">
                <div class="recepts-categories">
                    <p>Категории:</p>

                    <p class="ingredients-cat-2">
                        Категории
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </p>


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
                                        <li><a href="{{route('articles').'/'.$item->url}}" class="sub-cat">{{$item->title}}</a></li>
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

<section class="part-article">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="article-content">
                    <a href="#" class="but">{{$article->category->title}}</a>
                    <div class="article-author">
                        <div class="article-author-img">
                            <p>Автор статьи:</p>
                            <a href="#">
                                <img src="{{asset(env('THEME'))}}/img/{{$article->user->img->mini}}" alt="">
                            </a>
                            <span>{{$article->user->name}}</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="my-text">
                        <p>
                            {{$article->title}}
                        </p>

                        @if(!empty($subjects))
                        <div class="insertion">
                            <span>Содержание</span>

                            <ul>
                                @foreach($subjects as $subject)
                                    <li><a href="" class="prevent-default">{{$subject}}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        @endif

                        {!! $article->text !!}


                        <hr>

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar popular">
                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                    <h4>Популярное</h4>
                    <ul class="ul-reset">
                        @if(!$popular_articles->isEmpty())
                            @foreach($popular_articles as $item)
                                <li><a href="{{route('article',['id'=>$item->id])}}">{{$item->title}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="sidebar new">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    <h4>Новое</h4>
                    <ul class="ul-reset">
                        @if(!$last_articles->isEmpty())
                            @foreach($last_articles as $item)
                                <li><a href="{{route('article',['id'=>$item->id])}}">{{$item->title}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="prog-comments article-comments">
    <div class="container">
        <div class="row">
            <div class="col">
                <h6>Коментарии</h6>
                <div class="order-login">
                    <div class="inner">
                        <span>Для того , чтобы оставить комментарий неоходимо авторизоваться на сайте.</span>
                        <span class="login">Войти</span>
                    </div>
                </div>
            </div>
        </div>
        @if($comments)
            <div class="row">
                <div class="col">
                    <div class="allcomments" id="append_comments">
                        @if(!empty($comments))

                            @foreach($comments as $k => $com)

                                @if($k!=0)
                                    @break
                                @endif
                                @include(env('THEME').'.comment',['items'=>$com])
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="more-comments">
                        <span id="more_comments" comments-offset="4" article-id="{{$article->id}}">Показать ещё</span>
                    </div>
                </div>
            </div>

            @else

            <p>Комментариев ещё нет</p>
        @endif
    </div>
</section>