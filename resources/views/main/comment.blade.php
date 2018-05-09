
@foreach($items as $item)


    <div class="comment {{($item->parent_id != 0) ? "answer" : ""}}">
        <div class="row">
            <div class="col-sm-1">
                <a href="#"><img src="{{asset(env('THEME'))}}/img/{{$item->user->img->mini}}" alt=""></a>
            </div>
            <div class="col-sm-11">
                <a href="#">{{$item->user->name}}</a>
                <span class="date">{{$item->created_at->format("d.m.Y")}}</span>
                <div class="text">
                    <p>{{$item->text}}</p>
                </div>
            </div>
        </div>
    </div>

    @if(isset($comments[$item->id]))
        @include(env('THEME').'.comment',['items'=>$comments[$item->id]])
    @endif



@endforeach