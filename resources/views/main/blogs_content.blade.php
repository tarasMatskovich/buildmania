<section class="all-blogs">
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="title">
                    <h1>Блог</h1>
                    <hr>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="products-search">
                    <form action="">
                        <input type="text" placeholder="Поиск">
                        <button>
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 order-2 order-md-1">
                <div class="all-blogs-list" id="append_blogs">

                    @if(isset($blogs))
                        @if(!$blogs->isEmpty())
                            @foreach($blogs as $blog)
                                <div class="blog-wrapp">
                                    <div class="blog-main">
                                        <div class="blog-content">
                                            <a href="#" class="link">{{$blog->title}}</a>
                                            <span class="date-info">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span class="date">
                                            @if(is_object($blog->created_at))
                                                {{$blog->created_at->format("d.m.Y")}}
                                            @endif
                                        </span>
                                    </span>
                                            <div class="clearfix"></div>
                                            <a href="#">
                                                <img src="{{asset(env('THEME'))}}/img/{{$blog->img->original}}" alt="">
                                            </a>
                                            <p>
                                                {!! str_limit($blog->text,580) !!}
                                            </p>
                                        </div>

                                        <div class="blog-info">
                                            <div class="blog-info-row">
                                                <i class="fa fa-weixin" aria-hidden="true"></i>
                                                <span class="value">3</span>
                                            </div>
                                            <div class="blog-info-row">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                <span class="value">{{$blog->views}}</span>
                                            </div>
                                            <div class="blog-info-row">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <span class="value">{{(json_decode($blog->rating)->all / json_decode($blog->rating)->count)}}</span>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="blog-dop-info">
                                        <span class="cat">{{$blog->category->title}}</span>
                                        <div class="author">
                                            <img src="{{asset(env('THEME'))}}/img/{{json_decode($blog->user->img)->mini}}" alt="">
                                            <span>{{$blog->user->name}}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Нету записей в блоге</p>
                        @endif

                    @else
                        <p>Нету записей в блоге</p>
                    @endif



                </div>
                @if($blogs && !$blogs->isEmpty())
                    <div class="row">
                        <div class="col">
                            <div class="more-comments">
                                <form action="" id="more_blogs_form">
                                    <span id="more_blogs">Показать ещё</span>
                                    <input type="hidden" name="offset" value="2" id="my_blog_offset">
                                    <input type="hidden" name="sort" value="" id="my_blog_sort">
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-3 order-1 order-md-2">
                <form action="" class="sort">


                    <div class="grouped-form-1" id="form_check">

                        <p>Сортировать</p>

                        <div class="form-check" >
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="blogs_sort" id="exampleRadios1" value="rating" >
                                По рейтингу
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="blogs_sort" id="exampleRadios2" value="popularity">
                                По популярности
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input checked class="form-check-input" type="radio" name="blogs_sort" id="exampleRadios3" value="date">
                                По дате
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="blogs_sort" id="exampleRadios4" value="users">
                                По пользователям
                            </label>
                        </div>
                    </div>



                    <div class="grouped-form-2">

                        <p>Рубрики</p>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Фармакалогия
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Питание
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Фитнес
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Бодибилдинг
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Вопросы треннинга
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Образ жизни
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Другое
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Воркаут
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                Пуэрлифтинг
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>