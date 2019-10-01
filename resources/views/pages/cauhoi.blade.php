@extends('master-layout')
@section('title')
    Các câu hỏi thường gặp
@endsection
@section('content')



<div class="container question text-center">
    <h3>Các câu hỏi thường gặp :</h3>
    <div class="container border-line"></div>
    <span>Nếu bạn có câu hỏi thắc mắc về dịch vụ của chúng tôi, sau đây là một số câu hỏi mà các khách hàng chúng tôi
        hay
        hỏi để các bạn tham khảo, nếu bạn chưa tìm thấy câu hỏi phù hợp, xin hãy gửi email về: </span>
    <div class="d-flex flex-column">

        <div id="accordion">
            <div class="card">
                <div class="card-header" id="question1">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1"
                            aria-expanded="true" aria-controls="collapse1">
                            <span>các cửa hàng của chúng tôi</span>
                        </button>
                    </h5>
                </div>

                <div id="collapse1" class="collapse" aria-labelledby="question1" data-parent="#accordion">
                    <div class="card-body text-center">
                        @foreach($showroms as $value)
                            <li>{{ $value->address }}</li>
                        @endforeach
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-header" id="question2">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse2"
                            aria-expanded="true" aria-controls="collapse2">
                            <span>Phương thức thanh toán</span>
                        </button>
                    </h5>
                </div>

                <div id="collapse2" class="collapse" aria-labelledby="question2" data-parent="#accordion">
                    <div class="card-body text-left">
                       <ul>
                        @foreach($payments as $value)
                            <li>{{ $value->name }}</li>
                        @endforeach
                       </ul>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header" id="question3">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse3"
                            aria-expanded="true" aria-controls="collapse3">
                            <span>sau bao lâu nhận được hàng</span>
                        </button>
                    </h5>
                </div>

                <div id="collapse3" class="collapse" aria-labelledby="question3" data-parent="#accordion">
                    <div class="card-body text-left">
                     Sau khoảng 2 đến 3 ngày sau khi đặ hàng bạn sẽ nhận được hàng của mình!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
