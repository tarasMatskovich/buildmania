<section class="programs">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title">
                    <h1>Программы тренировок</h1>
                    <hr>
                </div>
            </div>
        </div>
        @if(isset($data))
            <div class="row">
                <div class="col">
                    <div class="parameters">
                        <ul>
                            @foreach($data as $item)
                                <li>{{$item}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="col">
                    <div class="programs-form">
                        <form action="{{route('programs.find')}}" method="POST">
                            {{csrf_field()}}
                            <ul>
                                <li>
                                    <select id="" class="form-control" name="gender">
                                        <option selected value="false">Для кого</option>
                                        <option value="0">Мужчин</option>
                                        <option value="1">Женщин</option>
                                        <option value="2">Для всех</option>
                                    </select>
                                </li>
                                <li>
                                    <select id="" class="form-control" name="target">
                                        <option selected value="false">Цель</option>
                                        <option value="0">Подготовительная</option>
                                        <option value="1">Набор массы</option>
                                        <option value="2">Жиросжигание</option>
                                        <option value="3">Увеличение силы</option>
                                        <option value="4">Выносливость</option>
                                        <option value="5">Поддержание формы</option>
                                    </select>
                                </li>
                                <li>
                                    <select id="" class="form-control" name="body_type">
                                        <option selected value="false">Тип телосложения</option>
                                        <option value="0">Эктоморф</option>
                                        <option value="1">Мезоморф</option>
                                        <option value="2">Эндоморф</option>
                                        <option value="3">Любой</option>
                                    </select>
                                </li>
                                <li>
                                    <select id="inputState" class="form-control" name="difficult">
                                        <option selected value="false">Сложность</option>
                                        <option value="0">Новичок</option>
                                        <option value="1">Любитель</option>
                                        <option value="2">Профессионал</option>
                                    </select>
                                </li>
                                <li>
                                    <input type="submit" value="ПОДОБРАТЬ">
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if($programs)
                @if(!$programs->isEmpty())
                    @foreach($programs as $program)
                        <div class="col-md-6">
                            <div class="program">
                                <div class="program-img">
                                <span class="hidden-desc">
                                    <div class="hidden-desc-wrapp">
                                        <ul class="ul-reset">
                                            <li>
                                                <p>Недель:</p>
                                                <p>{{$program->time->week}}</p>
                                            </li>
                                            <li>
                                                <p>Тренировочных дней:</p>
                                                <p>{{$program->time->days}}</p>
                                            </li>
                                            <li>
                                                <p>Время тренировки:</p>
                                                <p>{{$program->time->hours}} час</p>
                                            </li>
                                            <li>
                                                <p>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </p>
                                                <p>{{$program->favorites}}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </span>
                                    <img src="{{asset(env('THEME'))}}/img/{{$program->img->original}}" alt="">
                                    @if($program->gender == 0)
                                        <span class="gender"><i class="fa fa-mars" aria-hidden="true"></i></span>
                                    @elseif($program->gender == 1)
                                        <span class="gender"><i class="fa fa-venus" aria-hidden="true"></i></span>
                                    @else
                                        <span class="gender"><i class="fa fa-venus-mars" aria-hidden="true"></i></span>
                                    @endif
                                    @if($program->hit)
                                        <span class="hit">хит</span>
                                    @endif

                                    <a href="{{route('program',['id'=>$program->id])}}">{{$program->title}}</a>
                                </div>
                            </div>
                            <div class="program-desc">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <p>Цель:</p>
                                        <span>{{$program->target}}</span>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <p>Телосложение:</p>
                                        <span>{{$program->body_type}}</span>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <p>Сложность:</p>
                                        <span>{{$program->difficult}}</span>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <p>Рейтинг:</p>
                                        <span class="raiting">{{($program->rating->all / $program->rating->count)}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col">
                        <h3>На даной странице нет нужных программ тренировок</h3>
                    </div>
                @endif
            @else
                <div class="col">
                    <h3>На даной странице нет нужных программ тренировок</h3>
                </div>
            @endif



        </div>
        @if($programs)
            @if(!$programs->isEmpty())
        <div class="row">
            <div class="col">
                <div class="pagination">
                    <ul class="pages-list ul-reset horisontal-menu">
                        @if($programs->lastPage() > 1)

                            @if($programs->currentPage() != 1)
                                <div class="left-arrow">
                                    <a href="{{$programs->url($programs->currentPage()-1)}}" class="my-page-link">&laquo;</a>
                                </div>
                            @endif


                            @for($i = 1; $i <= $programs->lastPage(); $i++)
                                @if($programs->currentPage() == $i)
                                    <li><a class="disabled-page">{{$i}}</a></li>
                                @else
                                    <li><a href="{{$programs->url($i)}}">{{$i}}</a></li>
                                @endif
                            @endfor



                            @if($programs->currentPage() != $programs->lastPage())
                                <div class="right-arrow">
                                    <a href="{{$programs->url($programs->currentPage()+1)}}" class="my-page-link">&raquo;</a>
                                </div>
                            @endif


                        @endif
                    </ul>
                </div>
            </div>
        </div>
                @endif
        @endif
        <div class="row">
            <div class="col">
                <div class="programs-text my-text">
                    <h1>Программы тренировок в тренажерном зале: разрабатывай план и иди к цели</h1>
                    <p>
                        Представь, что тебе выпал шанс найти сокровище. Сундук с дарами закопан неизвестно где и у тебя есть 2 варианта. Путь первый: ты берешь в руки лопату и мучительно долго перерываешь огромный земельный участок. Путь второй: изучаешь карту и целенаправленно копаешь ровно там, где спрятан клад. Сокровищем в нашем случае будет твоя идеальная физическая форма, а карта — это специально разработанная программа тренировок. Без этого плана эффективность твоих занятий сильно ограничена.
                    </p>

                    <h1>Готовые планы тренировок: преимущества</h1>
                    <p>
                        Итак, ты определенно знаешь, чего хочешь и осознаешь, что тренировка мышц должна проводиться на регулярной основе. Ты хочешь приступить к работе над собой немедленно. Но прежде чем приступить к тренировкам в тренажерном зале, определись с целью. Какую задачу ты ставишь перед собой? Похудение, набор массы, рельеф? На основании этого и разрабатывается программа тренировок в зале.
                    </p>
                    <p>
                        Благодаря такому плану тебе не нужно тратить свою энергию на выполнение неэффективных упражнений. Обоснованный список заданий позволяет быстро прийти к нужному тебе результату. Например, программа для тренировок в тренажерном зале для девушек, как правило, не содержит упражнения на трапециевидные мышцы. Для мужчин, напротив, эта область имеет значение. Программа для тренировок в тренажерном зале для мужчин будет сильно отличаться от плана занятий для девушек. При этом разница будет проявляться не только в степени сложности, но и в виде нагрузки. И для мужчин, и для девушек рекомендуется грамотно совмещать как аэробные, так и силовые тренировки. Разработанный профессионалами план занятий позволяет не терять времени на поиски лучших упражнений, а следовать по наиболее эффективному пути.
                    </p>

                    <h1>
                        Программы тренировок для мужчин и девушек в тренажерном зале:
                        просто действуй
                    </h1>
                    <p>
                        На нашем портале представлены готовые программы тренировок в тренажерном зале, которые уже доказали свою эффективность. Каждый план занятий сбалансирован, результативен и направлен на решение конкретной задачи. Вы можете выбрать готовые программы тренировок, направленные на решение таких задач, как:
                    </p>
                    <ul class="programs-types-list">
                        <li>Подготовка</li>
                        <li>Набор массы</li>
                        <li>Жирсжигание</li>
                        <li>Увеличение силы</li>
                        <li>Выносливость</li>
                        <li>Рельеф</li>
                        <li>Поддержание формы</li>
                    </ul>

                    <p>
                        План тренировок в тренажерном зале для мужчин позволяет обрести желаемую форму как эктоморфу, так и эндроморфу. Стоит отметить, что наряду с регулярными тренировками, необходимо следовать режиму правильного питания. В каждой из программ тренировок для мужчин и девушек есть соответствующие рекомендации. Следуя этому плану, вы гарантированно придете к успеху.
                    </p>

                    <p>
                        Тренировки для мужчин обычно базируются на едином принципе: выполнении базовых упражнений и увеличении объема мышц. Для представительниц прекрасного пола программа совершенно иная. В тренировках для девушек, как правило, некоторые группы мышц исключаются вовсе, а основной акцент идет на ягодицы и бицепс бедра.
                    </p>

                    <p>
                        На нашем сайте в абсолютно бесплатном доступе представлены программы для любых целей. Следуя этим указаниям, вы быстро и эффективно приобретете желаемую форму. Для достижения наибольшей результативности предлагаем составление программы тренировок для девушек и мужчин от профессиональных тренеров. Индивидуальный план значительно ускорит твой путь к победе. Такая программа тренировок в тренажерном зале, составленная с учетом твоей подготовки, типа телосложения, состояния здоровья позволяет добиться совершенства быстро и эффективно.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>