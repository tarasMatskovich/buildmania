@if($blogs && !$blogs->isEmpty())
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
@endif