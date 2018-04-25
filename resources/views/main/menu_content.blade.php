@if(isset($menu) && !$menu->isEmpty())
<header>
    <div class="container-fluid">
        <div class="container">
            <nav class="navbar">
                <a href="#" class="navbar-logo">
                    <img src="{{asset('main')}}/img/logo.png" alt="">
                </a>
                <button class="button-collapse hide">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <ul class="menu-collapsed">
                    @foreach($menu as $menuItem)
                        @if($menuItem->parent_id == 0)
                            @if($menuItem->hasChildren($menuItem->id))
                                <li>
                                    <div class="dropdown show">
                                        <a class="btn btn-secondary dropdown-toggle dropdown1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{$menuItem->title}}
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            @foreach($menu as $menuSubItem)
                                                @if($menuSubItem->parent_id == $menuItem->id)
                                                    <a class="dropdown-item" href="{{$menuSubItem->url}}">{{$menuSubItem->title}}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li><a href="{{$menuItem->url}}">{{$menuItem->title}}</a></li>
                            @endif


                        @endif
                    @endforeach

                </ul>
                <div class="seacrh-login">
                    <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                    <a href="#" class="login">Войти</a>
                </div>
            </nav>
        </div>
    </div>
</header>
@endif