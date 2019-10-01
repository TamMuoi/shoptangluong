@extends('master-layout')
@section('title')
    Hướng Dẫn
@endsection
@section('content')

<div class="container-fluid">
    <div class="container">
        <h4 class="text-uppercase">Hướng dẫn mua hàng</h4>
        <div class="huongdan">
            <span>Bước 1 : Lựa chọn sản phẩm :</span>
            <span>Các bạn có thể vào từng danh mục sản phẩm để xem sản phẩm và lựa chọn sản phẩm mình yêu thích để mua
                bằng cách bấm vào hình ảnh sản phẩm mà các bạn nhìn thấy.</span>
            <img src="images/huongdan1.png" alt="">
        </div>
        <div class="huongdan">
            <span>Bước 2 : Lựa chọn thông số sản phẩm :</span>
            <span>Sau khi lựa chọn sản phẩm, các bạn sẽ tới trang thông tin chi tiết của sản phẩm đó, các bạn lựa chọn
                các thuộc tính của sản phẩm để phù hợp với bạn nhất như màu sắc, size, số lượng sản phẩm các bạn muốn
                mua, sau đó bấm "Thêm vào giỏ hàng"</span>
            <img src="images/huongdan2.png" alt="">
            <span>Cửa sổ nhỏ sẽ mở ra để thông báo cho bạn biết nếu bạn muốn tiếp tục mua hàng hay muốn thanh toán luôn.

                Bạn có thể lựa chọn "Đến giỏ hàng" để tiếp tục bước tiếp theo</span>
            <img src="images/huongdan3.png" alt="">

        </div>
        <div class="huongdan">
            <span>Bước 3 : Xem lại số lượng sản phẩm trong giỏ hàng và thanh toán </span>
            <span>Sau khi vào "Giỏ hàng của bạn", bạn có thể thay đổi số lượng hàng muốn lấy rồi bấm "Cập nhật giỏ hàng
                của bạn" hoặc nếu bạn thấy số lượng cần mua đã chuẩn và đúng rồi, bạn hãy bấm nút "THANH TOÁN"</span>
            <img src="images/huongdan4.png" alt="">
        </div>
        <div class="huongdan">
            <span>Bước 4: Hoàn thiện đơn đặt hàng </span>
            <span>Các bạn sẽ được đưa tới trang hoàn thiện để thanh toán. Tại trang này, các bạn điền thông tin vào các
                trường cần thiết như Số điện thoại, Địa chỉ, Tỉnh thành phố & quận huyện nơi giao hàng, các bạn có thể
                điền mã voucher khuyến mãi nếu có để được giảm giá, sau đó bấm nút "Tiếp tục hình thức thanh toán".
                <br>
                Các bạn sẽ được chuyển sang trang lựa chọn hình thức thanh toán là trả tiền khi giao hàng (COD) hoặc
                chuyển khoản. Lựa chọn hình thức thanh toán bạn mong muốn rồi bấm nút "Đặt hàng".</span>
            <img src="images/huongdan5.png" alt="">
            <span>Sau khi hoàn thiện đơn hàng, trang tóm tắt thông tin về đơn hàng của bạn xuất hiện như sau nghĩa là bạn đã hoàn thiện đặt hàng và sẽ có email gửi về xác nhận thông tin cho bạn.</span>
            <img src="images/huongdan-6.png" alt="">
        </div>
    </div>
</div>


@endsection
