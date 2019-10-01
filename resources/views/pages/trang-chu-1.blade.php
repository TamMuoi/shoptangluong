<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ĐM KIÊN</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="https://kenh14cdn.com/2018/4/13/photo-4-1523613034062930366784.jpg" />
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap_4.0.0/css/bootstrap.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/reset-browser.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/fontawesome.5.7.2/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/OwlCarousel2-2.3.4/assets/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('css/trang-chu-1.css') }}">
    

</head>
<body>
	<header class="font-sfui home">
        <div class="container padding0 content_wp">
	        <div class="row" style="height: 100%;">	 
	        	
					<div class="col-md-5 menu-top" style="height: 100%;">
    					<ul class="menu-collapse d-flex align-items-center">
    						<li><a href="#" class="icon-menu"><!-- <i class="fas fa-bars"></i> --></a></li>
    						<li><a href="#" class="s-menu">Menu</a></li>
    					</ul>
						
					</div>
					<div class="col-md-2 logo-top text-center d-flex align-items-center justify-content-center" style="height: 100%;">
						<a href="#">
							<img src="{{ asset('images/logo3.png') }}" alt="" class="logo-ws">
						</a>
					</div>
					<div class="col-md-5 pull-right bread-top" style="height: 100%;">
						<ul class="icon-func d-flex align-items-center pull-right">
                            <li><input type="text" class="form-control input-find" placeholder="Tìm kiếm sản phẩm"></li>
                            <li><a href="#"><i class="fas fa-search"></i></a></li>					
							<li><a href="#"><i class="fas fa-cart-plus"></i></a></li>
							<li><a href="#"><i class="far fa-user"></i></a></li>
						</ul>
					</div>
	        	
	        </div>
        </div>

          <div class="submenu">
            <div class="container">
                <ul class="hidden-xs fix-md ul-submenu flex-m">
                    <li>
                        <a href="">Về LALALAND</a>
                        <!-- <ul class="ul-submenu-child"> 
                            <li class="d-block"><a href="">Giới thiệu</a></li>
                            <li class="d-block"><a href="">Hệ thống showroom</a></li>
                            <li class="d-block"><a href="">Liên hệ</a></li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="" class="menu-product-outlet">
                            <span style="color: #c00;font-weight: bolder;">OUTLET - 50%</span>
                        </a>
                    </li>
                    <li class="visible-sm visible-md visible-lg">
                        <a href="">Sản phẩm</a>
                       <!--  <ul class="ul-submenu-child" style="display: none;">
                                <li class="d-block"><a href="">LALALAND <span style="font-size:10px; color:#de0c34;font-style:italic;">Couture</span></a></li>
                                <li class="d-block"><a href="/san-pham/top-ao">TOP - Áo</a></li>
                                <li class="d-block"><a href="/san-pham/trousers-quan">TROUSERS - Quần</a></li>
                                <li class="d-block"<a href="/san-pham/dress-vay">DRESS - Váy</a></li>
                                <li class="d-block"><a href="/san-pham/skirt-chan-vay">SKIRT - Chân Váy</a></li>
                                <li class="d-block"><a href="/san-pham/shorts-quan-sooc">Shorts - Quần sooc</a></li>
                                <li class="d-block"><a href="/san-pham/jumpsuit">Jumpsuit</a></li>
                        </ul> -->
                    </li>
                    <li class="visible-sm visible-md visible-lg"><a href="">Albums</a></li>
                    <li>
                        <a href="">Tin tức</a>
                       <!--  <ul class="ul-submenu-child" style="display: none;">
                                <li class="d-block"><a href="/tin-tuc/dchic-magazine">LALALAND Magazine</a></li>
                                <li class="d-block"><a href="/tin-tuc/blogs">Blogs</a></li>
                                <li class="d-block"><a href="/tin-tuc/su-kien">S&#x1EF1; ki&#x1EC7;n</a></li>
                        </ul> -->
                    </li>
                    <li><a href="">Video</a></li>
                    <li><a href="">Tuyển dụng</a></li>
                </ul>
            </div>
        </div> 
    </header>

    <nav class="menu-m" style="display: none";>
        <div class="menu-m-wrap">
            <ul class="visible-xs ul-submenu-m">
                <li>
                    <a class="submenu-child-toggle" href="">Về LALALAND<i>+</i></a>
                    <div class="ul-submenu-m-wrap">
                        <ul class="ul-submenu-m-child"> 
                            <li><a href="">Giới thiệu</a></li>
                            <li><a href="">Hệ thống showroom</a></li>
                            <li><a href="">Liên hệ</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="" class="menu-product-outlet" style="display: block;color:#c00;font-weight: bolder;">
                        OUTLET - 50%
                    </a>
                </li>
                <li>
                    <a class="submenu-child-toggle" href="">Sản phẩm<i>+</i></a>
                    <div class="ul-submenu-m-wrap">
                        <ul class="ul-submenu-m-child">
                            <li class="li-submenu-m-head"><a href="">Tất cả sản phẩm</a></li>
                            <li><a href="">LALALAND <span style="font-size:10px; color:#de0c34;font-style:italic;">Couture</span></a></li>
                            <li><a href="">TOP - Áo</a></li>
                            <li><a href="">TROUSERS - Quần</a></li>
                            <li><a href="">DRESS - Váy</a></li>
                            <li><a href="">SKIRT - Chân Váy</a></li>
                            <li><a href="">Shorts - Quần sooc</a></li>
                            <li><a href="">Jumpsuit</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="">Albums</a></li>
                <li>
                    <a class="submenu-child-toggle" href="">Tin tức<i>+</i></a>
                    <div class="ul-submenu-m-wrap">
                        <ul class="ul-submenu-m-child">
                            <li class="li-submenu-m-head"><a href="/tin-tuc">Tất cả tin tức</a></li>
                                <li><a href="">D.chic Magazine</a></li>
                                <li><a href="">Blogs</a></li>
                                <li><a href="">S&#x1EF1; ki&#x1EC7;n</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="">Video</a></li>
                <li><a href="">Tuyển dụng</a></li>
                <li class="menu-m-account">
                    <a class="ic-user display-block icon-header" href="">Tài khoản</a>
                    <a class="ic-shopping-cart icon-header" href="">Giỏ hàng</a>
                </li>
                <li class="menu-m-social">
                    <div>
                        <a href="" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a href="" target="_blank">
                            <i class="fab fa-youtube" style="font-size: 30px;"></i>
                        </a>
                        <a href="" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

<!--     <div class="mini-cart">
            <p>Chưa có sản phẩm nào trong giỏ hàng</p>
    </div>  --> 
</header>
    <section id="content" class="body-content">
        
    
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1920px;height:1080px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{{ asset('images/loading/spin.svg') }}" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1920px;height:1080px;overflow:hidden;">
            <div data-b="0">
                <img data-u="image" src="{{ asset('images/banner-7.jpg') }}"/>
                <div data-ts="preserve-3d" style="position:absolute;top:77px;left:460px;width:460px;height:210px;">                 
                </div> 
            </div>
            <div data-b="1">
                <img data-u="image" src="{{ asset('images/banner-6.png') }}" />
                <div data-ts="flat" data-p="1360" style="position:absolute;top:0px;left:0px;width:1920px;height:1080px;overflow:hidden;">
                  
                </div>
                <div data-ts="preserve-3d" style="position:absolute;top:20px;left:327px;width:336px;height:312px;">
                    <div data-t="25" data-ts="preserve-3d" style="position:absolute;top:82px;left:104px;width:128px;height:147px;">
                      
                    </div>
                 
                </div>
            </div>
            <div data-b="2">
                <img data-u="image" src="{{ asset('images/banner-5.png') }}" />
                <div data-ts="flat" data-p="850" style="position:absolute;top:0px;left:0px;width:1920px;height:1080px;overflow:hidden;">
                  
                    <div data-t="72" data-ts="preserve-3d" style="position:absolute;top:-210px;left:200px;width:580px;height:225px;">
                      
                    </div>
                </div>
               
            </div>
            <div data-b="3">
                <img data-u="image" src="{{ asset('images/banner-4.png') }}" />
                <div data-ts="flat" data-p="850" style="position:absolute;top:0px;left:0px;width:1920px;height:1080px;overflow:hidden;">
                  
                    <div data-t="72" data-ts="preserve-3d" style="position:absolute;top:-210px;left:200px;width:580px;height:225px;">
                      
                    </div>
                </div>
               
            </div>
        </div>
        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>

    <!-- SLIDE MOBIE -->
        <div id="jssor_2" style="position:relative;margin:0 auto;top:0px;left:0px;width:768px;height:1365px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{{ asset('images/loading/spin.svg') }}" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:768px;height:1365px;overflow:hidden;">
            <div data-b="0">
                <img data-u="image" src="{{ asset('images/banner-mb-3.png') }}"/>
                <div data-ts="preserve-3d" style="position:absolute;top:77px;left:460px;width:460px;height:210px;">                 
                </div> 
            </div>
            <div data-b="1">
                <img data-u="image" src="{{ asset('images/banner-mb-1.png') }}" />
                <div data-ts="flat" data-p="1360" style="position:absolute;top:0px;left:0px;width:768px;height:1365px;overflow:hidden;">
                  
                </div>
                <div data-ts="preserve-3d" style="position:absolute;top:20px;left:327px;width:336px;height:312px;">
                    <div data-t="25" data-ts="preserve-3d" style="position:absolute;top:82px;left:104px;width:128px;height:147px;">
                      
                    </div>
                 
                </div>
            </div>
            <div data-b="2">
                <img data-u="image" src="{{ asset('images/banner-mb-2.png') }}" />
                <div data-ts="flat" data-p="850" style="position:absolute;top:0px;left:0px;width:768px;height:1365px;overflow:hidden;">
                  
                    <div data-t="72" data-ts="preserve-3d" style="position:absolute;top:-210px;left:200px;width:580px;height:225px;">
                      
                    </div>
                </div>
               
            </div>
            <div data-b="3">
                <img data-u="image" src="{{ asset('images/banner-mb-4.png') }}" />
                <div data-ts="flat" data-p="850" style="position:absolute;top:0px;left:0px;width:768px;height:1365px;overflow:hidden;">
                  
                    <div data-t="72" data-ts="preserve-3d" style="position:absolute;top:-210px;left:200px;width:580px;height:225px;">
                      
                    </div>
                </div>
               
            </div>
        </div>
        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
</section>

<footer class="not-fixed">
        <div class="container pd0" id="footer">
        <div class="row">
            
       
            <div class="col-xs-12 col-sm-4 dchic-info">
                <a href="" class="logo">
                     <img src="{{ asset('images/logo-nguoi2.png') }}" width="50px" height="50px"> 
                  <!--   LALALAND -->
                </a>
                <div class="footer-info">
                    <p><a href="showroom.html">Hệ thống showrooms</a></p>
                    <p><a href="lien-he.html">Liên hệ</a></p>
                    <a href="" class="icon-bct">
                        <img alt="Đã thông báo Bộ Công Thương" title="Đã thông báo Bộ Công Thương" src="{{ asset('images/dathongbao.png') }}" style="width: 100%; opacity: 0.5; max-width: 85px!important; margin-top: 5px;margin-bottom: 5px;" />
                    </a>
                </div>
            </div>

            <div class="col-xs-12 col-sm-5">
                <h3 class="heading font-playfair">Hỗ trợ khách hàng</h3>
                <div class="footer-info ">
                    <p><a href="">Hướng dẫn đặt hàng</a></p>
                    <p><a href="">Chính sách mua hàng</a></p>                    
                    <p><a href="">Chính sách ưu đãi khách hàng</a></p>
                    <p><a href="">Chính sách bảo mật thông tin</a></p>
                </div>
            </div>

            <div class="col-xs-12 col-sm-3">
                <div class="company-follow">
                    <h3 class="heading font-playfair">Follow LALALAND</h3>
                    <div class="footer-info">
                        <ul class="social-link">
                            <li>
                                <a href="" target="_blank" class="ic-circle ic-facebook">
                                    <i class="fab fa-facebook-square"></i>&nbsp;&nbsp;Facebook
                                </a>
                            </li>

                            <li>
                                <a href="" target="_blank" class="ic-circle ic-youtube">
                                    <i class="fab fa-youtube"></i>&nbsp;Youtube
                                </a>
                            </li>

                            <li>
                                <a href="" target="_blank" class="ic-circle ic-instagram">
                                    <i class="fab fa-instagram"></i>&nbsp;&nbsp;Instagram
                                </a>
                            </li>
                        </ul>
                    </div>                    
                </div>
                 </div>
            </div>            
        </div>
        <p class="company-copyright">
            <i class="far fa-registered"></i> Địa chỉ:Tòa CT2, Khu đô thi Thái Hà Constrexim, 43 Phạm Văn Đồng, Hà Nội. Giấy chứng nhận đăng kí kinh doanh số được cấp bởi Sở Kế hoạch và Đầu tư thành phố Hà Nội
        </p>
    </footer>


<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('js/jssor.slider-27.5.0.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('lib/bootstrap_4.0.0/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/OwlCarousel2-2.3.4/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/js-trang-chu-1.js') }}"></script>
</body>
</html>
