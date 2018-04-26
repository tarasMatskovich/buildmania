@if($slider && !$slider->isEmpty())
    <section>
        <div class="container-fluid main-slider-wrapper">
            <div class="owl-carousel main-slider">
                @foreach($slider as $sliderItem)
                    <div class="slide">
                        <img src="{{asset('main')}}/img/{{$sliderItem->img}}" alt="">
                        <div class="container">
                            <div class="desc">
                                <h3>{!!$sliderItem->title!!}</h3>
                                <p>{{$sliderItem->text}}</p>
                                <a href="{{$sliderItem->url}}">Перейти</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<section class="blue-boxs">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <a href="#" class="blue-box blu1">
                    <h3>20</h3>
                    <p>Программ питания</p>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="#" class="blue-box blu2">
                    <h3>34</h3>
                    <p>Тренировки</p>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="#" class="blue-box blu3">
                    <h3>123</h3>
                    <p>Упражнения</p>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="#" class="blue-box blu4">
                    <h3>61</h3>
                    <p>Рецепта</p>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="info">
    <div class="container">
        <div class="row margin-row">
            <div class="col-lg-6">
                <h2>Тренируйся</h2>
                <hr>
                <p>
                    Хочешь набрать мышечную массу или сбросить лишний вес, но не знаешь как построить свою программу тренировок? Всё просто - выбери подходящий твоей цели готовый тренировочный план или составь свой собственный, используя удобный конструктор тренировок.
                </p>
            </div>
            <div class="col-lg-6 planning">
                <img src="{{asset('main')}}/img/planning.png" alt="" class="left">
                <h4>Подобрать план тренировок</h4>
                <form>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <select id="inputState" class="form-control">
                                <option selected>Для кого</option>
                                <option>Мужчин</option>
                                <option>Женщин</option>
                                <option>Для всех</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <select id="inputState" class="form-control">
                                <option selected>Цель</option>
                                <option>Подготовительная</option>
                                <option>Набор массы</option>
                                <option>Жиросжигание</option>
                                <option>Увеличение силы</option>
                                <option>Выносливость</option>
                                <option>Поддержание формы</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <select id="inputState" class="form-control">
                                <option selected>Тип телосложения</option>
                                <option>Эктоморф</option>
                                <option>Мезоморф</option>
                                <option>Эндоморф</option>
                                <option>Любой</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <select id="inputState" class="form-control">
                                <option selected>Сложность</option>
                                <option>Новичок</option>
                                <option>Любитель</option>
                                <option>Профессионал</option>
                            </select>
                        </div>
                    </div>
                </form>
                <a href="#">Подобрать</a>
            </div>
        </div>
        <div class="row margin-row">
            <div class="col-lg-6">
                <h2>Питайся правильно</h2>
                <hr>
                <p>
                    Не забывайте, что от тренировок будет небольшой результат, если вы будете питаться неправильно! Подберите диету, которая подходит под Вашу цель и следуйте ей. Все представленные программы составлены профессиональными диетологами и проверены на эффективность. Можете составить свой рацион питания с использованием нашего инструмента диет с рассчетом белков, жиров и углеводов.
                </p>
            </div>
            <div class="col-lg-6 planning">
                <img src="{{asset('main')}}/img/planning.png" alt="" class="left">
                <h4>Составить рацион питания</h4>
                <form>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" value="male">
                                    Мужчина
                                </label>
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="exampleRadios" value="female">
                                    Женщина
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <select id="inputState" class="form-control">
                                <option selected>Цель</option>
                                <option>Набор массы</option>
                                <option>Снижение веса</option>
                                <option>Сушка</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <select id="inputState" class="form-control">
                                <option selected>Вес</option>
                                <option>40-50</option>
                                <option>50-60</option>
                                <option>60-70</option>
                                <option>70-80</option>
                                <option>80-90</option>
                                <option>90-100</option>
                                <option>100+</option>
                            </select>
                        </div>
                    </div>
                </form>
                <a href="#">Составить</a>
            </div>
        </div>
    </div>
</section>

<section class="my-progress">
    <div class="container">
        <div class="row">
            <h2>Отслеживай прогресс</h2>
            <p>
                Еще ведете дневник тренировок и следите за своим прогрессом на листке бумаги? Мы предоставляем личный кабинет с возможностями отслеживания прогресса всем! Записывайте свои данные и прогрессируйте! Ставьте себе цели и достигайте их!
            </p>
        </div>
        <div class="row">
            <div class="col-lg-12 activities">
                <div class="activity">
                    <img src="{{asset('main')}}/img/progress1.png" alt="">
                    <p>Дневник тренировок</p>
                </div>
                <div class="activity">
                    <img src="{{asset('main')}}/img/progress2.png" alt="">
                    <p>Фото история прогресса</p>
                </div>
                <div class="activity">
                    <img src="{{asset('main')}}/img/progress3.png" alt="">
                    <p>Замеры тела</p>
                </div>
                <div class="activity">
                    <img src="{{asset('main')}}/img/progress4.png" alt="">
                    <p class="individual">График изменений показателей формы спортсмена</p>
                </div>
                <div class="activity">
                    <img src="{{asset('main')}}/img/progress5.png" alt="">
                    <p class="individual">Общение с професиональными тренерами</p>
                </div>
            </div>
        </div>
        <div class="row go">
            <h4>Начни свой путь в самосовершенствовании!</h4>
            <a href="#">Начать</a>
        </div>
    </div>
</section>

<section class="blogs info">
    <div class="container">
        <div class="row">
            <!--START BLOGS-->
            <div class="col-lg-6 container1">
                <h2>Общайся</h2>
                <hr>
                <p>
                    Общайтесь с другими пользователями и профессиональными спортсменами. Получайте составленные индивидуально для Вас тренировки и диеты. Консультируйтесь у врачей.
                </p>
                <div class="humans">
                    @if(isset($blogs) && !$blogs->isEmpty())
                        @foreach($blogs as $blog)
                            <div class="human">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="#"><img src="{{asset('main')}}/img/{{json_decode($blog->user->img)->mini}}" alt=""></a>
                                            <a href="#" class="name">Анастасия Лапушкина</a>
                                        </div>
                                        <div class="col-sm-9">
                                            <a href="#"><h4>TheStart</h4></a>
                                            <p>
                                                С завтрашнего дня ,будем пробовать начинать заново заниматься.Был огромный перерыв ,застой,поднабрал жирка и скинул сухую массу ....Надо все возвращать .
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <a href="#" class="more">Последнее в блоге</a>
            </div>
            <!--END BLOGS-->

            <!--START ARTICLES-->
            <div class="col-lg-6">
                <h2>Изучай</h2>
                <hr>
                <p>
                    Очень важно понимать теоритические основы тренинга и физиологических процессов происходящих в организме. Изучайте информацию на нашем сайте. Знания сила!
                </p>
                <div class="articles">
                    @if(isset($articles) && !$articles->isEmpty())
                        @foreach($articles as $article)
                            <div class="article">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="#"><img src="{{asset('main')}}/img/{{$article->img->mini}}" alt=""></a>
                                        </div>
                                        <div class="col-sm-9">
                                            <a href="#"><h4>{{str_limit($article->title,30)}}</h4></a>
                                            <p>
                                                {{str_limit($article->desc,90)}}
                                            </p>
                                            <a href="#" class="articles_cat">{{$article->category->title}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Нет статтей</p>
                    @endif
                </div>
                <a href="#" class="more">Последние статьи</a>
            </div>
            <!--END ARTICLES-->
        </div>
    </div>
</section>

<section class="text">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Портал о фитнесе и бодибилдинге: твой личный помощник</h1>
                <p>
                    Задержись на минутку. Здесь и сейчас прочувствуй, осознай: твоя мечта по-прежнему жива? Каким ты видишь себя через месяц…год…20 лет? Готов ли ты идти к своей победе до конца? Если ты из тех немногих сильных духом людей и твой ответ «да», портал о фитнесе и бодибилдинге iq-body — это именно то, что тебе нужно. И сейчас ты узнаешь, почему.
                </p>
                <h2>
                    Занятия фитнесом и бодибилдингом: залог твоего успеха
                </h2>
                <p>
                    Нет, мы не будем говорить тебе о том, что регулярные тренировки необходимы для каждого, кто хочет быть в отличной физической форме. Не будет и страшилок о том, что сейчас ты молод, но без фитнес-упражнений ты обрекаешь себя на больную, дряхлую и беспомощную старость.
                </p>
                <p>
                    Незачем также рассуждать, что отличная фигура позволяет вывести личную жизнь на новый уровень. Это же закономерно: красивые телом и сильные духом личности всегда вызывают неподдельное восхищение. Мы не станем говорить и о том, что занятия фитнесом и бодибилдингом позволят тебе стать обладателем совершенного тела и обрести колоссальную уверенность в себе.
                </p>
                <p>
                    Ну а то, что регулярные тренировки — это лучший способ борьбы с депрессией, тоже, далеко не новость. Бодибилдинг позволяет эффективно преодолевать любые стрессы: во время занятий вырабатываются эндорфины и любые потрясения переживаются проще.
                </p>
                <p>
                    Позволь избавить тебя от долгих и пустых разъяснений. Ведь если ты профессионал, ты лучше нас перечислишь все преимущества спорта. А если ты новичок, ты и сам знаешь, какую непоправимую пользу приносят занятия фитнесом и бодибилдингом. Мы хотим сказать о другом. Каждый раз, когда ты идешь на тренировку, ты выбираешь именно ту жизнь, которую заслуживаешь. С каждым новым сетом и подходом ты на шаг ближе к своей мечте. И не важно, какова главная цель твоей жизни. Спортсмен, способный каждый раз преодолевать себя, обречен на успех в любой из сфер.
                </p>
                <h2>
                    Занимайся бодибилдингом или фитнесом - стань лучшей версией себя
                </h2>
                <p>
                    Если ты выбрал ЗОЖ, мы рады пригласить тебя в свою команду. Тренируйся, правильно питайся, следи за своим прогрессом, превращай в образ жизни фитнес и бодибилдинг. Программы тренировок на нашем сайте предлагаются абсолютно бесплатно. Достаточно указать свою цель и исходные данные. А если тебе нужен глубокий индивидуальный подход, тренеры-профессионалы готовы составить для тебя персональную программу. Оставаясь с нами, ты можешь:
                </p>
                <ul>
                    <li>легко подобрать программу тренировок с помощью специального конструктора;</li>
                    <li>получить персональную программу тренировок и питания;</li>
                    <li>пользоваться генератором питания;</li>
                    <li>вести дневник тренировок;</li>
                    <li>отслеживать историю своего прогресса на графиках;</li>
                    <li>слушать лучшую музыку для тренировок;</li>
                    <li>следить за интересной и постоянно обновляющейся информацией в блогах;</li>
                    <li>приобрести качественное спортивное питание;</li>
                    <li>общаться с единомышленниками и профессиональными тренерами.</li>
                </ul>
                <p>
                    Занятия фитнесом и бодибилдингом дают гораздо больше, чем физическую силу, выносливость, красоту и уверенность. Регулярные тренировки открывают перед вами дверь в мир, где нет ничего невозможного. Твоя сила духа будет крепнуть, и сквозь пот и боль ты придешь к тому, о чем мечтаешь.
                </p>
                <p>
                    Арнольд Шварценеггер сказал:
                </p>
                <p class="citata">
                    «У всех нас есть великая внутренняя сила. Это сила — вера в себя. Важно ваше отношение к победе. Прежде чем победить, надо увидеть свою победу. И вы должны быть голодны, должны хотеть победить».
                </p>
                <p>
                    Будь голодным, испытывай жажду победы, становись примером для своего окружения, стремись, мечтай, достигай! А за вдохновением возвращайся на наш портал о фитнесе и бодибилдинге. Вместе мы пройдем через любые тернии, прямо к звездам. Твой триумф уже ждет тебя. Вперед к победе!
                </p>
            </div>
            <div class="col-md-4">
                saasd
            </div>
        </div>
    </div>
</section>