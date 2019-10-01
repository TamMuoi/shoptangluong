@extends('master-layout')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <!-- <div class="col-md-3 col sidebar my-4">
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>danh mục sản phẩm</span>
                    </div>
                </div>
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>sản phẩm nổi bật</span>
                    </div>
                    <img src="images/product-1.jpg" alt="">
                </div>
                <div class="sidebar-content">
                    <div class="title-sidebar">
                        <span>Về chúng tôi</span>
                    </div>
                    <span>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo velit aliquam sint dolorum placeat
                        fugiat itaque nostrum veniam ipsam alias libero odio nesciunt optio, possimus qui voluptate illo
                        atque deleniti!
                    </span>

                </div>
            </div> -->
            <div class="col-md-12 col-12 product-page d-flex flex-column">
                <h4 class="text-uppercase mt-3 ">tuyển dụng</h4>
                <div class="row">
                    <div class="col-12 d-flex flex-column">
                        <div class="text-center text-uppercase">
                            <h3>tuyển nhân viên part-time 22h - 6h</h3>
                        </div>
                        <div class="tuyendung-content">
                            <img src="images/nhansu.jpg" alt="">
                            <span>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quaerat eligendi quod
                                aspernatur quidem iusto fuga magnam quos. Delectus quisquam error ullam sed dolores
                                tenetur eveniet vel impedit nemo ex?
                            </span>
                            <span>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quaerat eligendi quod
                                aspernatur quidem iusto fuga magnam quos. Delectus quisquam error ullam sed dolores
                                tenetur eveniet vel impedit nemo ex?
                            </span>
                            <span>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quaerat eligendi quod
                                aspernatur quidem iusto fuga magnam quos. Delectus quisquam error ullam sed dolores
                                tenetur eveniet vel impedit nemo ex?
                            </span>
                            <img src="images/nhansu.jpg" alt="">
                            <span>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quaerat eligendi quod
                                aspernatur quidem iusto fuga magnam quos. Delectus quisquam error ullam sed dolores
                                tenetur eveniet vel impedit nemo ex?
                            </span>
                            <span>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quaerat eligendi quod
                                aspernatur quidem iusto fuga magnam quos. Delectus quisquam error ullam sed dolores
                                tenetur eveniet vel impedit nemo ex?
                            </span>
                            <span>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At quaerat eligendi quod
                                aspernatur quidem iusto fuga magnam quos. Delectus quisquam error ullam sed dolores
                                tenetur eveniet vel impedit nemo ex?
                            </span>
                            <div class="text-center text-uppercase">
                                <h3>Vui lòng điền thông tin vào form sau : </h3>
                            </div>
                            <form class="tuyendung">
                                <div class="form-group">
                                    <label for="name">Họ và Tên</label>
                                    <input type="text" class="form-control" id="name" placeholder="Họ và Tên">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                        <label for="phone">Số điện thoại </label>
                                        <input type="text" class="form-control" id="phone" placeholder="Số Điện Thoại">
                                    </div>
                                    <div class="form-group">
                                            <label for="Điạ Chỉ"></label>
                                            <input type="text" class="form-control" id="phone" placeholder="Địa chỉ">
                                        </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Vị trí ứng tuyển </label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Part Time </option>
                                        <option>Full Time</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Ý kiến </label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>



                </div>
                <div class="show-more text-center mb-3">
                    <a href="#">ứng tuyển</a>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="js/danhsach.js"></script>
<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/carousel.js"></script>
@endsection
