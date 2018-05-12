<section class="part-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="part-blog-content">
                    <h1>{{$blog->title}}</h1>

                    <a href="#">{{$blog->category->title}}</a>

                    <br>

                    <span class="date">{{$blog->created_at->format("d.m.Y")}}</span>

                    <div class="my-text">
                        {!! $blog->text !!}
                    </div>

                    <img src="{{asset(env('THEME'))}}/img/{{$blog->img->original}}" alt="">
                </div>
                <div class="blog-estimation">
                    <div class="estimation">
                        <div>{{($blog->rating->all / $blog->rating->count)}}</div>
                    </div>
                    <p class="text">Рейтинг пользователей <br> ({{$blog->rating->count}} голоса)</p>
                    <a id="giveEstimationBlog">Голосовать</a>
                    <div class="clearfix"></div>
                    <form action="#">
                        <p>Оцените от 1 до 10</p>
                        <input type="number">
                        <button>Оценить</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">

                <span class="author-title">Автор статьи</span>

                <div class="author-wrapp">
                    <a href="#">
                        <div class="author">
                            <img src="{{asset(env('THEME'))}}/img/{{$blog->user->img->mini}}" alt="">
                            <h3>{{$blog->user->name}}</h3>

                            <hr>

                            <p>{{($blog->user->city) ? $blog->user->city : ""}}{{($blog->user->age) ? $blog->user->age : ""}}</p>
                        </div>
                    </a>
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
        @if(!$comments->isEmpty())
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
                        <span id="more_blog_comments" comments-offset="4" article-id="{{$blog->id}}">Показать ещё</span>
                    </div>
                </div>
            </div>

        @else

            <p>Комментариев ещё нет</p>
        @endif
    </div>
</section>