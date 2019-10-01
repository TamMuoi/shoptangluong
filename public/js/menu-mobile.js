$('.menu-mobile-button').click(function(event) {
	if($('section.menu-mobile').attr('class')=="menu-mobile menu-mobile-active"){
		$('section.menu-mobile').removeClass('menu-mobile-active');
		$('.menu-mobile-box').removeClass('menu-mobile-box-active');
		$(this).removeClass('menu-mobile-button-active');
		$('nav.nav-horizontal').removeClass('nav-horizontal-active-3');
		 $('section.banner-slider').removeClass('section.banner-slider-active-1');
        $('.nav-horizontal-sublogo').removeClass('nav-horizontal-sublogo-active-1');
        $('.nav-horizontal-logo').removeClass('nav-horizontal-logo-active-1');
        $('.nav-horizontal-container').removeClass('nav-horizontal-container-active-1');
        $('.nav-horizontal-content').removeClass('nav-horizontal-content-active-1');
	}else{
		$(this).addClass('menu-mobile-button-active');
		$('.menu-mobile-box').addClass('menu-mobile-box-active');
		$('section.menu-mobile').addClass('menu-mobile-active');
		$('nav.nav-horizontal').addClass('nav-horizontal-active-3');
		 $('section.banner-slider').addClass('section.banner-slider-active-1');
        $('.nav-horizontal-sublogo').addClass('nav-horizontal-sublogo-active-1');
        $('.nav-horizontal-logo').addClass('nav-horizontal-logo-active-1');
        $('.nav-horizontal-container').addClass('nav-horizontal-container-active-1');
        $('.nav-horizontal-content').addClass('nav-horizontal-content-active-1');
	}
});
$('.menu-mobile-bg').click(function(event) {
	$('section.menu-mobile').removeClass('menu-mobile-active');
	$('.menu-mobile-box').removeClass('menu-mobile-box-active');
	$('.menu-mobile-button').removeClass('menu-mobile-button-active');
	$('nav.nav-horizontal').removeClass('nav-horizontal-active-3');
	$('section.banner-slider').removeClass('section.banner-slider-active-1');
        $('.nav-horizontal-sublogo').removeClass('nav-horizontal-sublogo-active-1');
        $('.nav-horizontal-logo').removeClass('nav-horizontal-logo-active-1');
        $('.nav-horizontal-container').removeClass('nav-horizontal-container-active-1');
        $('.nav-horizontal-content').removeClass('nav-horizontal-content-active-1');
});
var search1 = document.getElementById("search1");
var search = document.getElementById("search");
var form1 = document.querySelector(".search3");
var form = document.querySelector(".search2");
var check = true;
var hihi = true;
/*
search1.addEventListener('click', function () {
    if (hihi === true) {
        form1.classList.add('search');
        form1.classList.remove('search3');
        return hihi = false;

    } else {
        form1.classList.add('search3');
        form1.classList.remove('search');
        return hihi = true;
    }
});*/


search.addEventListener('click', function () {
    if (check === true) {
        form.classList.add('search');
        form.classList.remove('search2');
        check = false;
    } else {
        form.classList.add('search2');
        form.classList.remove('search');
        check = true;
    }
});

