$('ul.menu-left-ul-lv-1>li:not(:first-child)>ul.menu-left-ul-lv-child').hide();
$('ul.menu-left-ul-lv-1>li:first-child>ul.menu-left-ul-lv-child').addClass('menu-left-ul-lv-child-active');	
$('ul.menu-left-ul-lv-1>li>i').click(function(event) {
	if ($(this).siblings('ul.menu-left-ul-lv-child').attr('class')=='menu-left-ul-lv-child menu-left-ul-lv-child-active') {
		$(this).parent('li').addClass('li-hover-active');
	}else {
		$('ul.menu-left-ul-lv-1>li>ul.menu-left-ul-lv-child').hide(300);
		$('ul.menu-left-ul-lv-1>li').removeClass('li-hover-active');
		$('ul.menu-left-ul-lv-1>li>ul.menu-left-ul-lv-child').removeClass('menu-left-ul-lv-child-active');
		$(this).siblings('ul.menu-left-ul-lv-child').addClass('menu-left-ul-lv-child-active');
		$('ul.menu-left-ul-lv-1>li>ul.menu-left-ul-lv-child-active').show(300);
		$(this).parent('li').addClass('li-hover-active');
	}
});

$('ul.menu-left-ul-lv-child>li>ul.menu-left-ul-lv-child').hide();
// $('ul.menu-left-ul-lv-child>li:first-child>ul.menu-left-ul-lv-child').addClass('menu-left-ul-lv-child-active');	
$('ul.menu-left-ul-lv-child>li>i').click(function(event) {
	if ($(this).siblings('ul.menu-left-ul-lv-child').attr('class')=='menu-left-ul-lv-child menu-left-ul-lv-child-1 menu-left-ul-lv-child-active') {
		$(this).parent('li').addClass('li-hover-active');
	}else {
		$('ul.menu-left-ul-lv-child>li>ul.menu-left-ul-lv-child').hide(300);
		$('ul.menu-left-ul-lv-child>li').removeClass('li-hover-active');
		$('ul.menu-left-ul-lv-child>li>ul.menu-left-ul-lv-child').removeClass('menu-left-ul-lv-child-active');
		$(this).siblings('ul.menu-left-ul-lv-child').addClass('menu-left-ul-lv-child-active');
		$('ul.menu-left-ul-lv-child>li>ul.menu-left-ul-lv-child-active').show(300);
		$(this).parent('li').addClass('li-hover-active');
	}
});
