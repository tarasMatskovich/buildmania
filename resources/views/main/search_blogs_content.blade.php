<section class="all-blogs">
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="title">
                    <h1>Результаты поиска:</h1>
                    <hr>
                </div>
                @if(!$errors->isEmpty())
                    @foreach($errors->all() as $error)
                        <h4 style="color: darkred;">{{$error}}</h4>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col">

                <div class="products-search">

                    <form action="{{route('blogsSearch')}}" method="POST">
                        <input type="text" placeholder="Поиск" name="keywords" value="{{session('oldInput')}}">
                        {{csrf_field()}}
                        <button type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 order-2 order-md-1">
                <div class="all-blogs-list" id="append_blogs">
                    @if(isset($blogs))
                        @if(!$blogs->isEmpty())
                            @foreach($blogs as $blog)
                                <div class="blog-wrapp">
                                    <div class="blog-main">
                                        <div class="blog-content">
                                            <a href="{{route('blog',['id'=>$blog->id])}}" class="link">{{$blog->title}} [{{$blog->category->title}}] [id={{$blog->id}}]</a>
                                            <span class="date-info">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <span class="date">
                                            @if(is_object($blog->created_at))
                                                {{$blog->created_at->format("d.m.Y")}}
                                            @endif
                                        </span>
                                    </span>
                                            <div class="clearfix"></div>
                                            <a href="{{route('blog',['id'=>$blog->id])}}">
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
                            <p>Посик не дал результатов</p>
                        @endif

                    @else
                        <p>Посик не дал результатов</p>
                    @endif



                </div>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="pagination">
                    <ul class="pages-list ul-reset horisontal-menu">
                        @if($blogs->lastPage() > 1)

                            @if($blogs->currentPage() != 1)
                                    <div class="left-arrow">
                                        <a href="{{$blogs->url($blogs->currentPage()-1)}}" class="my-page-link">&laquo;</a>
                                    </div>
                            @endif


                            @for($i = 1; $i <= $blogs->lastPage(); $i++)
                                @if($blogs->currentPage() == $i)
                                    <li><a class="disabled-page">{{$i}}</a></li>
                                @else
                                    <li><a href="{{$blogs->url($i)}}">{{$i}}</a></li>
                                @endif
                            @endfor



                            @if($blogs->currentPage() != $blogs->lastPage())
                                    <div class="right-arrow">
                                        <a href="{{$blogs->url($blogs->currentPage()+1)}}" class="my-page-link">&raquo;</a>
                                    </div>
                            @endif


                        @endif
                        {{--<li><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">4</a></li>--}}


                        {{--<div class="last-arrow">--}}
                            {{--<i class="fa fa-angle-double-right" aria-hidden="true"></i>--}}
                        {{--</div>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>