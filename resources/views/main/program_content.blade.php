<section class="cur-program-img">
    <div class="container-fluid">
        <div class="cur-program-img-wrap" style="background: url({{asset(env('THEME')).'/img/'.$program->img->original}});">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="cur-program-img-content">
                            <h1>{{$program->title}}</h1>
                            <p>{{$program->dub_desc}}</p>
                            <a href="#">Начать программу</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="crumbs">
    <div class="container">
        <div class="row">
            <ul>
                @if(isset($crumbs))
                    @if(is_array($crumbs))
                        @foreach($crumbs as $crumb)
                            <li><a href="{{$crumb['url']}}">{{$crumb['name']}}</a></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                        @endforeach
                    @endif
                @endif
            </ul>
        </div>
    </div>
</section>

<section class="pr-sinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-4">
                <div class="cur-info">
                    <span>{{$program->time->week}}</span>
                    <p>Недель</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="cur-info">
                    <span>{{$program->time->days}}</span>
                    <p>Дня в неделю</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="cur-info">
                    <span>{{floor($program->time->hours)}}:{{($program->time->hours - floor($program->time->hours))}}</span>
                    <p>В день</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="cur-info">
                    <span>{{$program->views}}</span>
                    <p>Просмотров</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="cur-info">
                    <span>{{($program->rating->all / $program->rating->count)}}</span>
                    <p>Рейтинг</p>
                </div>
            </div>
            <div class="col-md-2 col-sm-4">
                <div class="cur-info">
                    <span>{{$program->favorites}}</span>
                    <p>В избранном</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cur-program-info">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="short-info">
                    <div class="my-row">
                        <span>Цель:</span>
                        <span class="val">{{$program->target}}</span>
                    </div>
                    <div class="my-row">
                        <span>Телосложение:</span>
                        <span class="val">{{$program->body_type}}</span>
                    </div>
                    <div class="my-row">
                        <span>Сложность:</span>
                        <span class="val">{{$program->difficult}}</span>
                    </div>
                    <div class="my-row">
                        <span>Для кого:</span>
                        @switch($program->gender)
                            @case(0)
                                <span class="val">Мужчин</span>
                                @break;
                            @case(1)
                                <span class="val">Женщин</span>
                                @break;
                            @case(2)
                                <span class="val">Всех</span>
                                @break;
                        @endswitch

                    </div>
                </div>
            </div>
            <div class="col-md-4 center col-sm-6">
                <div class="raiting">
                        <span class="digit left">
                            {{($program->rating->all / $program->rating->count)}}
                        </span>
                    <p>Рейтинг пользователей<br>({{$program->rating->count}} голоса)</p>
                    <a href="#" class="block">Голосовать</a><br>
                    <a href="#" class="gototrain">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        План тренировки
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="author">
                    <div class="row">
                        <div class="col-4">
                            <a href="#">
                                <img src="{{asset(env('THEME'))}}/img/{{$program->user->img->mini}}" alt="">
                            </a>
                        </div>
                        <div class="col-8">
                            <h4><a href="#">{{$program->user->name}}</a></h4>
                            <p>Автор плана тренировок</p>
                            <hr>
                            <p>{{($program->user->city ? "Уфа" : "")}}{{($program->user->city ? ", 26 лет" : "")}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cur-program-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="my-text">
                    <p>Особенности организма эктоморфов обязательно должны быть учтены при составлении программы тренировок:</p>

                    <ul>
                        <li>в организме постоянно низкий уровень жира;</li>
                        <li>человек обладает недостаточным весом;</li>
                        <li>содержание мышечной массы низкое;</li>
                        <li>кости имеют тонкую структуру;</li>
                        <li>метаболизм находится на высоком уровне;</li>
                        <li>эктоморфы обычно физически слабы.</li>
                    </ul>

                    <div class="insertion">
                        <div class="row">
                            <div class="col-4">
                                <img src="img/ectomorph.jpg" alt="">
                            </div>
                            <div class="col-8">
                                <p>
                                    Если не знаете или сомневаетесь к какому типу телосложения Вы относитесь, то прочитайте <a href="#">эту статью</a>. В ней подробно рассказано, чем отличаются друг от друга эктоморф, мезоморф и эндоморф.
                                </p>
                            </div>
                        </div>
                    </div>

                    <p>
                        Набрать мышечную массу со свойствами организма эктоморфа трудно, но вполне возможно, если использовать специальную, программу тренировок – в основе которой базовые упражнения. Кроме этого важно придерживаться калорийного рациона и правильного режима отдыха и сна.
                    </p>

                    <h2>Особенности тренировочной программы для эктоморфов</h2>

                    <p>
                        Бодибилдинг для эктоморфов основывается на следующих основных принципах:
                    </p>

                    <ul>
                        <li>необходимо заниматься в тренажерном зале не менее 40 минут, но и не больше часа;</li>
                        <li>тренировки не чаще трех раз в неделю;</li>
                        <li>интенсивность выполнения упражнений – не пределе возможного;</li>
                        <li>используется большой рабочий вес;</li>
                        <li>применяются базовые упражнения;</li>
                        <li>между упражнениями продолжительный отдых;</li>
                        <li>высококалорийное питание.</li>
                    </ul>

                    <p>
                        Данная тренировка для эктоморфов на массу рассчитана на 2-2,5 месяца. И кроме мышечной массы добавляет силу. Это позволяет подготовить организм эктоморфа к следующему тренировочному массонаборному циклу, в которых тренировки дополняются изолирующими упражнениями.
                    </p>

                    <p>
                        Как было сказано, преимущественно вся программа складывается из упражнений базовых, поскольку лишь они могут обеспечить эктоморфу необходимую степень мышечного стресса в ходе тренировок. Это позволит за максимально сжатый период времени набрать мышечную массу (которую будет заметно :) ). В течение промежутка времени продолжительностью от восьми до десяти недель требуется постепенно наращивать нагрузку – только прогрессия нагрузок даст хорошие результаты.
                    </p>

                    <p>
                        Между сетами отдыхайте по две-три минуты – пока не почувствуете, что восстановились.
                    </p>

                    <p>
                        Важные моменты, которые следует учитывать:
                    </p>

                    <ul>
                        <li>необходимо свести к минимуму аэробные нагрузки (<a href="">кардио</a>);</li>
                        <li>необходимо делать 5-10-минутную разминку перед началом каждой тренировки;</li>
                        <li>в конце занятий требуется 5-10-минутная заминка, растяжка мышц;</li>
                        <li>между подходами необходимо отдыхать в течение двух-трех минут;</li>
                        <li>тренировка должна занимать минимально возможное общее время;</li>
                        <li>необходимо спать не меньше восьми часов в сутки.</li>
                    </ul>

                    <div class="insertion">
                        <div class="row">
                            <div class="col-4">
                                <img src="img/ectomorph2.jpg" alt="">
                            </div>
                            <div class="col-8">
                                <p>
                                    Прежде чем приступить к практике очень важно иметь представление о там, какие процессы происходят в организме в процессе тренировок и после них. Изучите статью <a href="#">как накачать мышцы</a> и Вы поймете, как правильно тренироваться и восстанавливаться.
                                </p>
                            </div>
                        </div>
                    </div>

                    <h2>Организация питания</h2>

                    <p>
                        При таком телосложении наращивание мышц возможно только при увеличении калорийности питания. Для роста мышц решающее значение имеет эффективная диета. Количество необходимых калорий легко рассчитывается по формуле на основе массы тела: необходимо на каждый килограмм собственного веса употреблять по 45-55 килокалорий. Если начальный вес равен 65 кг, диета должна иметь калорийность в пределах 2900-3600 ккал в день. Хорошим результатом будет еженедельное прибавление к массе тела по 0,3-0,4 кг. Если вы набираете меньше, то постепенно увеличивайте калорийность рациона до необходимого результата.
                    </p>

                    <p>
                        Питание распределяйте на 6-8 приемов пищи (прием коктейлей из протеина тоже считается за прием пищи). Т.е. в течение дня необходимо есть через каждые 2,5-3 часа. Из общего количества калорий 25-30% должно приходиться на потребление белка, 50% в рационе должны занимать углеводы, и жиры 20-25%. Простые углеводы в меню должны быть сведены к минимуму или полностью исключены из рациона. Но, если не получается набрать нужное количество из сложных углеводов, простые приветствуются.
                    </p>

                    <p>
                        Желательно преимущественно употреблять продукты с низким гликемическим индексом. К таким продуктам относятся: макаронные изделия, изготовленные из пшеницы твердых сортов, коричневый рис, цельнозерновой хлеб, овсяные каши, гречневая крупа. Особенно важно добавлять в продукты комплексные минерально-витаминные комплексы проверенных производителей, а также не забывать о овощах и фруктах.
                    </p>

                    <p>
                        Источниками жиров могут быть такие продукты: масло арахисовое, оливковое, рапсовое, семечки и орехи, подсолнечное, растительное и кукурузное масло, льняное семя и масло, орехи, жирные рыбы – сельдь, макрель, лосось.
                    </p>

                    <p>
                        Разработанная для эктоморфов программа может быть полезна новичкам и вообще всем, у кого имеются трудности с набором мышечной массы.
                    </p>

                    <hr>



                </div>
            </div>
            <div class="col-md-4">
                <span class="playlist-decs">Плейлист для тренировки:</span>
            </div>
        </div>
    </div>
</section>


<section class="train-plan">
    <div class="container">
        <div class="row">
            <div class="col">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <h1>План тренировок</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="day">
                    <p>День 1</p>
                    <span>грудь и трицепс</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </div>

                <div class="day">
                    <p>День 2</p>
                    <span>спина и бицепс</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </div>

                <div class="day">
                    <p>День 3</p>
                    <span>ноги и плечи</span>
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </div>
            </div>
            <div class="col-md-9">
                <div class="days-exersices">
                    <h6>День 1. Грудь и бицепс</h6>
                    <div class="cur-exercise">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="#"><img src="img/exer1.jpg" alt=""></a>
                            </div>
                            <div class="col-sm-9">
                                <a href="#">Жим штанги лёжа</a>

                                <p>Первый подход - разминочный</p>

                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fa fa-exchange" aria-hidden="true"></i>
                                        <span>5 подходов</span>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                        <span>р,10,8,8,8 повторов</span>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>Отдых 2 мин.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cur-exercise">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="#"><img src="img/exer2.jpg" alt=""></a>
                            </div>
                            <div class="col-sm-9">
                                <a href="#">Жим гантелей лёжа</a>

                                <p>Наклон скамьи - 45 градусов</p>

                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fa fa-exchange" aria-hidden="true"></i>
                                        <span>4 подходов</span>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                        <span>8,8,7,6 повторов</span>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>Отдых 2 мин.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cur-exercise">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="#"><img src="img/exer3.jpg" alt=""></a>
                            </div>
                            <div class="col-sm-9">
                                <a href="#">Разведение рук с гантелями лёжа</a>

                                <p></p>

                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fa fa-exchange" aria-hidden="true"></i>
                                        <span>3 подходов</span>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                        <span>10,10,10 повторов</span>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>Отдых 2 мин.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cur-exercise">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="#"><img src="img/exer4.jpg" alt=""></a>
                            </div>
                            <div class="col-sm-9">
                                <a href="#">Отжимания на брусьях</a>

                                <p></p>

                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fa fa-exchange" aria-hidden="true"></i>
                                        <span>3 подходов</span>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                        <span>12,10,8 повторов</span>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>Отдых 2 мин.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cur-exercise">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="#"><img src="img/exer5.jpg" alt=""></a>
                            </div>
                            <div class="col-sm-9">
                                <a href="#">Отжимания от пола</a>

                                <p>Узкое расположения рук</p>

                                <div class="row">
                                    <div class="col-md-3">
                                        <i class="fa fa-exchange" aria-hidden="true"></i>
                                        <span>3 подходов</span>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-refresh" aria-hidden="true"></i>
                                        <span>10-20 повторов</span>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>Отдых 2 мин.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <span id="more_blog_comments" comments-offset="4" article-id="{{$program->id}}">Показать ещё</span>
                    </div>
                </div>
            </div>

        @else

            <p>Комментариев ещё нет</p>
        @endif
    </div>
</section>