$(document).ready(function(){
	// to do
	function resetMargins(exception) {
		if($(".dropdown1").hasClass('margin1') && exception != 1)
			$(".dropdown1").toggleClass('margin1');
		if($(".dropdown2").hasClass('margin1') && exception != 2)
			$(".dropdown2").toggleClass('margin1');
		if($(".dropdown3").hasClass('margin1') && exception != 3)
			$(".dropdown3").toggleClass('margin1');
	}
	$(".button-collapse").click(function(event){
		$(".menu-collapsed").toggleClass('show');
		var vidth = $(".menu-collapsed").width();
	});
	$(".dropdown1").click(function(event){
		resetMargins(1);
		$(".dropdown1").toggleClass('margin1');
	});

	$(".dropdown2").click(function(event){
		resetMargins(2);
		$(".dropdown2").toggleClass('margin1');
	});

	$(".dropdown3").click(function(event){
		resetMargins(3);
		$(".dropdown3").toggleClass('margin1');
	});
	$(document).click(function(event){
		if($(".dropdown1").hasClass('margin1')) {
			$(".dropdown1").removeClass('margin1');
		}

		if($(".dropdown2").hasClass('margin1')) {
			$(".dropdown2").removeClass('margin1');
		}

		if($(".dropdown3").hasClass('margin1')) {
			$(".dropdown3").removeClass('margin1');
		}
	});
	
	$(".ex-select-click").click(function(event){
		var id = this.id;
		switch(id) {
			case 'ex-select-1':
				$(".grouped-form-1").toggleClass('show-ex-select');
				break;
			case 'ex-select-2':
				$(".grouped-form-2").toggleClass('show-ex-select');
				break;
			case 'ex-select-3':
				$(".grouped-form-3").toggleClass('show-ex-select');
				break;
		}
	});


	$(document).on('click',"#golos",function(){
		$(".cur-ex .ex-title h2").toggleClass('hide');
		$(".cur-ex .ex-title .my-range").toggleClass('show');
	});

	$(document).on('click',"#golosGo",function(){
		$(".cur-ex .ex-title h2").toggleClass('hide');
		$(".cur-ex .ex-title .my-range").toggleClass('show');
		alert('Спасибо, за Ваш голос!')
	});

	// loading of image

	$(".cur-program-img-wrap").css({
		'background': 'url(img/eat-programm1.jpg)',
		'background-attachment' : 'fixed',
		'background-repeat' : 'no-repeat'
	});


	function reset_blue_bgc() {
		$(".eat-portion").each(function(){
			if($(this).hasClass('blue-bgc')) {
				$(this).removeClass('blue-bgc');
			}
		});
	}

	reset_blue_bgc();

	$(".eat-portion").click(function(event){
		reset_blue_bgc();
		$(this).addClass('blue-bgc');
	});

	// changing fo recepts count

	var receptsCount = {
			"caloriesCount" : $(".caloriesCount").text(),
			"proteinsCount" : $(".proteinsCount").text(),
			"wightsCount" : $(".wightsCount").text(),
			"carbohydratesCount" : $(".carbohydratesCount").text(),
			"mass" : $("#mass").text()
		}

	$("#changeCount").on("change",function() {

		this.value = this.value.replace(/\D/g, '');

		var cal = receptsCount["caloriesCount"]*$("#changeCount").val();
		var prot = receptsCount["proteinsCount"]*$("#changeCount").val();
		var weights = receptsCount["wightsCount"]*$("#changeCount").val();
		var carbohydrates = receptsCount["carbohydratesCount"]*$("#changeCount").val();
		var mass = receptsCount["mass"]*$("#changeCount").val();


		prot = Math.round(prot);
		cal = Math.round(cal);
		weights = Math.round(weights);
		carbohydrates = Math.round(carbohydrates);
		mass = Math.round(mass);
		$(".caloriesCount").text(cal);
		$(".proteinsCount").text(prot);
		$(".wightsCount").text(weights);
		$(".carbohydratesCount").text(carbohydrates);
		$("#mass").text(mass);

	});

	$(".ingredients-cat-2").click(function() {
		$(".ingredients .recepts-categories ul, .part-article-top .recepts-categories ul").toggleClass('show');
		$(".ingredients-cat-2").toggleClass('bottom-margin-30');
	});

	// голосование

	$("#giveEstimationBlog").click(function(){
		$(".part-blog .blog-estimation").toggleClass("estHeight");
		$(".part-blog .blog-estimation form").toggleClass("estBack");
		$(".part-blog .blog-estimation").toggleClass("ovv");
	});

	// вкладки пользователя

	$(".tabs_content").hide();
	$(".tabs_content:first").show();
	$(".part-people .part-people-personal-info ul.ul-tabs li:first").addClass("active");

	$(".part-people .part-people-personal-info ul.ul-tabs li").click(function(event){
		$(".part-people .part-people-personal-info ul.ul-tabs li").removeClass("active");
		$(this).addClass('active');

		var selectTab = $(this).attr("href");
		$(".tabs_content").hide();
		$(selectTab).fadeIn();
	});

	// вкладки клуба 

	$(".dop-info .club-tabs-content").hide();
	$(".dop-info .club-tabs-content:first").show();
	$(".dop-info .tabs_wrapp li:first").addClass("active");

	$(".dop-info .tabs_wrapp li").click(function(event){
		$(".dop-info .tabs_wrapp li").removeClass("active");
		$(this).addClass("active");

		$(".dop-info .club-tabs-content").hide();
		var selectedTab = $(this).attr("href");
		$(selectedTab).fadeIn();
	});

	// галерея пользователя

	$(".p-progress-item").magnificPopup({
		type: 'image',
		gallery : {
			enabled: true
		},
		removalDelay: 300,
		mainClass: 'mfp-fade'
	});

	// галерея клубу

	$('.club-slider').slick({
	  dots: false, 
	  infinite: false,
	  prevArrow : '<button type="button" class="my-slick-prev"><i class="fa fa-chevron-circle-left"></i></button>',
	  	nextArrow : '<button type="button" class="my-slick-next"><i class="fa fa-chevron-circle-right"></i></button>',
	  asNavFor  : '.club-slider-2'
	});

	$(".club-slider-2").slick({
		asNavFor  : '.club-slider',
		slidesToShow: 5,
		arrows: false,
		infinite: false,
		draggable: false,
		focusOnSelect: true
	});
});

$(window).on('load',function(){

	$(".club-carousel").owlCarousel({
		items: 1,
		nav: true,
		dots: true,
		navText: 	[	"<i class='fa fa-caret-left' aria-hidden='true'></i>",
						"<i class='fa fa-caret-right' aria-hidden='true'></i>"
					]
	});


	$(".main-slider").owlCarousel({
		items: 1,
		nav: true,
		navText: 	[	"<i class='fa fa-caret-left' aria-hidden='true'></i>",
						"<i class='fa fa-caret-right' aria-hidden='true'></i>"
					]
	});
	
	$(".owl-nav").addClass("container");
	$(".club .owl-nav").removeClass("container");
	/*For dynamic transformation of slides size*/
	var size = $('.slide > img').height();
	$(".slide").height(size);
	/*
	$(window).resize(function(){
		// chacnging height
		size = $('.slide > img').height();
		$(".slide").height(size);
		setTimeout(function(){
			size = $('.slide > img').height();
			$(".slide").height(size);
		},100);
	});
	*/
	window.onresize = function () {
    	size = $('.slide > img').height();
		$(".slide").height(size);
		setTimeout(function(){
			size = $('.slide > img').height();
			$(".slide").height(size);
		},100);
	};
});

