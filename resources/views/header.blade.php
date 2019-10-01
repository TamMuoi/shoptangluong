
<div class="header">
    <div class="container-flui bg-dark py-2">
    <div class="container head d-flex justify-content-between mt-1">
        <div class="d-flex flex-column head-2-left ">
            {{--  <span class="text-uppercase ml-2">miễn phí giao hàng toàn quốc từ 100k</span>  --}}
            <span class="dathang text-white">HotLine:<a style="color: white" href="tel:{{ $introduce->phone }}">{{ $introduce->phone }}</a></span>

        </div>
        <div class="d-flex">

            <div class="d-flex jutify-content-between mt-2 text-white">
                    <a style="position : relative" href="{{ url('cart') }}" class="mr-5  text-white"><i class="fas fa-cart-plus mr-1"></i>Giỏ hàng
                       {{-- <div class="cart pt-1">
                            <span>{{ $soluong }}</span>
                        </div>--}}
                    </a>
                    <a href="" class="mr-5 text-white"><i class="far fa-heart ml-3 mr-1"></i>Sản phẩm yêu thích</a>
                    @guest
                    <a class="text-white" class=" text-white" href="{{--{{ url('dangnhap') }}--}}" data-toggle="modal" data-target="#loginModal" style="margin : 0 5px">Đăng nhập</a>

                    @if (Route::has('register'))
                    <span>/</span>
                    <a class="text-white" class=" text-white" href="{{--{{ url('dangky') }}--}}" data-toggle="modal" data-target="#registerModal" style="margin : 0 5px">Đăng ký</a>
                    @endif
                    @else

                    <a href="{{ url('profile/'.Auth::user()->id) }}" class="mr-1 text-white">
                        {{ Auth::user()->name }}
                    </a>
                    <span class="mr-1">/</span>

                    <a href="{{ route('logoutuser') }}" class="text-white">
                        {{ __('Logout') }}
                    </a>

                    <div class="flag ml-3">
                        <img src="{{ asset('images/avatar/'.Auth::user()->avatar) }}" alt="">
                    </div>
                    @endguest

                </div>

        </div>

    </div>


    </div>
    <div class="container head-2 d-flex justify-content-center ">
        <div class="logo">
            <a href="{{ url('') }}"><img src="{{ asset('images/logo-website/logo.png') }}" alt=""></a>
        </div>


    </div>
</div>
<div class="d-flex justify-content-center">
    <div class="logo-mobile">
        <img src="images/logo-website/logo.png" alt="">
    </div>
</div>

<nav class="nav-horizontal container-fluid">

    <div class="nav-horizontal-container container">

        <div class="nav-horizontal-content">

            <ul class="nav-ul-lv-1">
                <li><a href="{{ url('trang-chu') }}"> <img class="nav-logo" src="images/logo-website/logo.png" alt=""></a></li>
                <li><a href="{{ url('trang-chu') }}">Trang chủ</a></li>
                <li class="sanpham" style="position : unset">
                    <a href="{{ url('loaisanpham/all') }}">Sản phẩm<i class="fas fa-caret-down"></i></a>
                    <div class="sp-hover">
                        <div class="row">
                            @foreach($cate_products as $value)
                            <div class="col-md-3">
                                <div class="hover-item hover-item1 d-flex flex-column justify-content-start">
                                    <a href="{{ url('loaisanpham/'.$value->slug) }}">{{ $value->name }}</a>
                                    @foreach($all_products as $key => $product)
                                        @if($key<3 && $product->category_id == $value->id)
                                            <a href="{{ url('sanpham/'.$product->slug) }}">{{ $product->name }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            {{--<div class="col text-left px-5">

                                  <div class="hover-item hover-item1 d-flex flex-column justify-content-start">
                                      <a href="">Áo</a>
                                      <a href="#">jacket</a>
                                      <a href="#">sơ mi</a>
                                      <a href="#">hello</a>
                                  </div>
                                  <div class="hover-item d-flex flex-column justify-content-start">
                                      <a href="">Quần</a>
                                      <a href="#">joger</a>
                                      <a href="#">jean</a>
                                      <a href="#">thể thao</a>
                                  </div>


                              </div>
                              <div class="col text-left px-5">
                                  <div class="hover-item hover-item1 d-flex flex-column justify-content-start">
                                      <a href="">Đầm</a>
                                      <a href="#">đầm 1</a>
                                      <a href="">đầm 2</a>
                                      <a href="">đầm 3</a>

                                  </div>
                                  <div class="hover-item d-flex flex-column justify-content-start">
                                      <a href="">Phụ kiện</a>
                                      <a href="">phụ kiện 1</a>
                                      <a href="">phụ kiện 2</a>
                                      <a href="">phụ kiện 3</a>

                                  </div>


                              </div>
                              <div class="col text-left px-5">
                                  <div class="hover-item hover-item1 d-flex flex-column justify-content-start">
                                      <a href="">Chân váy</a>
                                      <a href="">chân váu 1</a>
                                      <a href="">chân vay 2</a>

                                  </div>
                                  <div class="hover-item d-flex flex-column justify-content-start">
                                      <a href="">Công sở</a>
                                      <a href="">quần jeep</a>
                                      <a href="">sơ mi</a>

                                  </div>


                              </div>
                              <div class="col text-left px-5">
                                  <div class="hover-item hover-item1 d-flex flex-column justify-content-start">
                                      <a href="">hot</a>
                                      <a href="">xem nhiều</a>
                                  </div>
                                  <div class="hover-item d-flex flex-column justify-content-start">
                                      <a href="">mới</a>
                                      <a href="">mới 2019</a>
                                  </div>
                              </div>
                              <div class="col text-left px-5">
                                  <img src="https://kenh14cdn.com/2018/4/13/photo-4-1523613034062930366784.jpg" alt="">
                              </div>--}}
                        </div>
                    </div>

                </li>
                <li><a href="{{ url('sale') }}" style="color: #DE0C36;">Sale</a></li>
                <li>
                    <a href="{{ url('bosuutap/all') }}">Bộ sưu tập<i class="fas fa-caret-down"></i></a>
                    <ul class="nav-ul-lv-2">
                        @foreach($headcollections as $collec)
                        <li><a href="{{ url('bosuutap/'.$collec->slug) }}">{{ $collec->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="lienhe-led">
                    <a href="{{ url('lienhe') }}">Về Tặng Lương<i class="fas fa-caret-down"></i></a>
                    <ul class="nav-ul-lv-2">
                        <li><a href="{{ url('gioithieu') }}">giới thiệu</a></li>
                        <li><a href="{{ url('lienhe') }}">liên hệ</a></li>
                        <li><a href="{{ url('gioithieu') }}">Hệ thống showrom</a></li>
                    </ul>

                </li>
                <li class="lienhe-led"><a href="{{ url('huongdan') }}">Hướng dẫn</a></li>
                <li class="lienhe-led"><a href="{{ url('loaitin/all') }}">Tin tức<i class="fas fa-caret-down"></i>
                        <ul class="nav-ul-lv-2">
                            @foreach($cate_news as $cate_new)
                            <li><a href="{{ url('loaitin/'.$cate_new->slug) }}">{{ $cate_new->name }}</a></li>
                            @endforeach
                            {{--  <li><a href="{{ url('tinkhuyenmai') }}">Tin khuyến mãi
                    </a></li>
                <li><a href="{{ url('tinthoitrang') }}">Tin Thời trang</a></li>
                <li><a href="{{ url('tinsukien') }}">Tin sự kiện</a></li>--}}
            </ul>
            </a></li>
            <li class="lienhe-led"><a href="{{ url('video') }}">video</a></li>
            <li class="lienhe-led"><a href="{{ url('tuyendung') }}">tuyển dụng</a></li>
            <li class="right">
                    <div style="display : block" class="menu-mobile" >
                        <form action="{{ url('search') }}" method="get">
                            @csrf
                            <input type="text" name="name" id="searchvalue" placeholder="Tìm kiếm" hidden>
                            <button type="submit" style=" border:none; background: none; padding : 10px ; position: relative ;z-index : 999" onclick="return searchform()"><i class="fas fa-search"></i></button>
                        </form>
                        <script>
                            function searchform() {
                                if($('#searchvalue').prop('hidden') === true){
                                    document.getElementById('searchvalue').removeAttribute('hidden');
                                    document.getElementById('searchvalue').focus();
                                    return false;
                                }
                                else{
                                    if($('#searchvalue').val()==''){
                                        $('#searchvalue').prop('hidden', true);
                                        return false;
                                    }
                                    else {
                                        return true;
                                    }
                                }
                            }
                        </script>
                        {{--<div id="search" hidden>
                            <form class="search3 mb-1">
                                <input class="form-control" type="text" placeholder="tìm kiếm">
                                <i class="fas fa-search"></i>
                            </form>
                        </div>--}}

                    </div>
            </li>

            </ul>
            <div class="menu-mobile-head">
                <div class="menu-mobile-button">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="menu-mobile">
                    <a data-toggle="modal" data-target="#loginModal"><i class="fas fa-user-friends"></i></a>
                </div>
                <div class="menu-mobile" >
                    <a onclick="search" id="search"><i class="fas fa-search-plus"></i></a>
                    <form class="search2" action="{{ url('search') }}" method="get">
                        @csrf
                        <input class="form-control" name="name" type="text" placeholder="tìm kiếm" autofocus>
                        <button type="submit" style=" border:none; background: none;"><i class="fas fa-search"></i></button>
                    </form>

                </div>
                <div class="menu-mobile">
                    <a href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>

    </div>
</nav>
<script type="text/javascript" src="js/nav-horizontal.js"></script>

<section class="menu-mobile">
    <div class="menu-mobile-bg"></div>
    <div class="menu-mobile-box">
        <div class="menu-mobile-info">

        </div>
        <div class="menu-mobile-content">
            <div class="menu-left">
                <div class="menu-left-title">
                    <h3>Menu</h3>
                </div>
                <div class="menu-left-content">

                    <ul class="menu-left-ul-lv-1">
                        <li><a href="{{ url('trang-chu') }}">Trang chủ</a></li>
                        <li><a href="{{ url('gioithieu') }}">Giới thiệu</a></li>
                        <li><a href="{{ url('loaisanpham/all') }}">Sản Phẩm</a></li>
                        <li><a href="{{ url('sale') }}">Khuyến mãi</a></li>
                        <li><a href="{{ url('lienhe') }}">Liên hệ</a></li>
                        <li><a href="{{ url('huongdan') }}">Hướng Dẫn</a></li>
                        <li><a href="{{ url('tintuc') }}">Tin Tức</a></li>

                    </ul>

                </div> <!-- menu-left-content -->
            </div> <!-- menu-left -->
            <script type="text/javascript" src="js/menu-left-js.js"></script>
        </div>
    </div>
    <script type="text/javascript" src="js/menu-mobile.js"></script>
</section>

