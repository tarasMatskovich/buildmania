@if(!empty($comments))

    @foreach($comments as $k => $com)

        @if($k!=0)
            @break
        @endif
        @include(env('THEME').'.comment',['items'=>$com])
    @endforeach
@endif