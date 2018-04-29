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
@endif