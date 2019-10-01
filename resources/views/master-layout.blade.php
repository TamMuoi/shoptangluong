<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tặng Lương Shop - @yield('title')</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="images/logo-website/logo.png" />
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap_4.0.0/css/bootstrap.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/reset-browser.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/fontawesome.5.7.2/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/OwlCarousel2-2.3.4/assets/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css') }}">

	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/banner-slider/engine1/style.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/toar/css/toastr.css') }}">
    <!-- End WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
	<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('lib/bootstrap_4.0.0/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
	<link rel="stylesheet" href="{{ asset('css/xzoom.css') }}">
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.3'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="2224038581240215"
  theme_color="#d696bb"
  logged_in_greeting="Xin chào !!! , Tâm Muỗi có thể giúp gì cho bạn."
  logged_out_greeting="Xin chào !!! , Tâm Muỗi có thể giúp gì cho bạn.">
</div>
</head>
<body>
@if(session('thongbao'))
	{{-- <div class = "alert alert-success">{{ session('thongbao') }}</div>--}}
@endif
@include('header')
@include('pages.dangnhap')
@include('pages.dangky')
@yield('content')
@include('footer')
<script type="text/javascript">

	$(window).load(function () {
		$('#loginModal').show();
	});
</script>
<script src="{{ asset('assets/toar/js/toastr.min.js') }}"></script>
@if(session('thongbao'))
	<script type="text/javascript">
		toastr.success('{{ session('thongbao') }}', 'Thông báo', {timeOut: 3000});
		toastr.options.progressBar = true;
	</script>
@endif
@if ($errors->any())
	@foreach ($errors->all() as $error)
		<script type="text/javascript">
			toastr.error('{{ $error }}', 'Thông báo', {timeOut: 3000});
		</script>
	@endforeach
@endif
@if(session('error'))
	<script type="text/javascript">
		toastr.error('{{ session('error') }}', 'Thông báo', {timeOut: 3000});
	</script>
@endif

</body>
</html>
