@extends('admincp.index')
@section('title')
    Thêm Sản Phẩm
@endsection
@section('content')
    <h1>
        Thêm Sản Phẩm...
    </h1>

    <br>

    <div class="row">
        <div class="box-content"  >
            <div class="table-responsive" >

                <form name="create" action="{{ route('store.product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-body custom-control-label">Tên Sản Phẩm(*):</label>
                        <input id="name" type="text" class="form-control backgroundinput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <p style="color:red">{{ $errors->first('name') }}</p>
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Mã Sản Phẩm(*):</label>
                        <input id="code" type="text" class="form-control backgroundinput @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="name" autofocus>

                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Danh Mục(*):</label>
                        <select name="cate" required>
                            @foreach($cates as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Bộ Sưu Tập(*):</label>
                        <select name="collections" required>
                            @foreach($collections as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Mô tả(*):</label>
                        {{--<input id="price" type="number" class="form-control backgroundinput @error('name') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>--}}
                        <textarea class="form-control" required name="describe" rows="5">{{ old('describe') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Ảnh(*):</label>
                        <input name='file-0-0' id='file-0-0' class='form-control' type='file' required onchange='fileValidation(this)'>
                        <div id='imagePreviewfile-0-0'>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="text-body custom-control-label">Giá Niêm Yết(VNĐ)(*):</label>
                        <input id="price" type="number" class="form-control backgroundinput @error('name') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" onchange="checkprice(this)">
                        <script>
                            function checkprice(obj) {
                                if(obj.value<0){
                                    toastr.error('Bạn không được chọn giá niêm yết nhỏ hơn 0%!', 'Thông báo', {timeOut: 3000});
                                    obj.value=0;
                                }
                            }
                        </script>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Giá Sale(%):</label>
                        <input id="sale" type="number" class="form-control backgroundinput @error('name') is-invalid @enderror" name="sale" min="1" max="70" value="{{ old('sale') }}" autocomplete="price" onchange="checksale(this)">
                        <script>
                        function checksale(obj) {
                            if(obj.value >70){
                                toastr.error('Bạn không nên chọn giá sale lớn hơn 70%!', 'Thông báo', {timeOut: 3000});
                                obj.value=70;
                            }
                            else if(obj.value<0){
                                toastr.error('Bạn không được chọn giá sale nhỏ hơn 0%!', 'Thông báo', {timeOut: 3000});
                                obj.value=0;
                            }
                        }
                        </script>
                        @error('sale')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Danh mục:</label>
                        <select class="form-control" id="color"  onchange="chonmau()" required>
                            <option value="0">--chọn màu--</option>
                            @foreach($colors as $cate)
                                <option value="{{ $cate->id }}" id="colorvalue{{$cate->id}}">{{ $cate->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="color-number" name="color-number" value="0" required>
                        <div id="content-color" ></div>
                        <script>
                            function chonmau() {
                                 var number=parseInt($('#color-number').val())+1;

                                var html="<div id='color-child"+$('#color').val()+"' style='border: black dotted 1px; border-radius: 10px'>";

                                    html+="<div style='text-align: right'><a onclick='huychon("+$('#color').val()+")'><i class='fa fa-times' ></i></a> </div>";
                                    html+="<h4>Thêm màu</h4>";
                                    html+="<hr>";
                                    html+="<input name='color"+number+"' class='form-control' type='hidden' value='"+$('#color').val()+"'>";
                                    html+="<input name='file-"+number+"-1' id='file-1-"+$('#color').val()+"' class='form-control' type='file' required onchange='fileValidation(this)'>";
                                    html+="<div id='imagePreviewfile-1-"+$('#color').val()+"'>";
                                    html+="</div>";
                                    html+="<input name='file-"+number+"-2' id='file-2-"+$('#color').val()+"' class='form-control' type='file' required onchange='fileValidation(this)'>";
                                    html+="<div id='imagePreviewfile-2-"+$('#color').val()+"'>";
                                    html+="</div>";
                                    html+="<input name='file-"+number+"-3' id='file-3-"+$('#color').val()+"' class='form-control' type='file' required onchange='fileValidation(this)'>";
                                    html+="<div id='imagePreviewfile-3-"+$('#color').val()+"'>";
                                    html+="</div>";
                                    html+="<h5>Chọn Size:</h5>";
                                    html+="<select id='"+$('#color').val()+"' onchange='chonsize(this)' required>";
                                    @foreach($sizes as $value)
                                        html+="<option value='"+"{{ $value->id }}"+"'>"+"{{ $value->name }}"+"</option>";
                                    @endforeach
                                    html+="</select>";
                                    html+="<div id='soluong"+$('#color').val()+"'>";
                                    html+="<input name='sizenumber"+$('#color').val()+"' id='sizenumber"+$('#color').val()+"' class='form-control' type='hidden' value='0'>";
                                    html+="</div>";
                                    html+="<hr>";
                                    html+="</div>";

                                var parent = document.getElementById("color");
                                var child = document.getElementById('colorvalue'+$('#color').val());
                                parent.removeChild(child);
                                $('#content-color').append(html);

                                $('#color-number').val(number);
                            }
                            function fileValidation(obj) {
                                //var fileInput = document.getElementById('file'+id);
                                var filePath = obj.value; //lấy giá trị input theo id
                                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; //các tập tin cho phép
                                //Kiểm tra định dạng
                                if (!allowedExtensions.exec(filePath)) {
                                    alert('You can only select files with .jpeg/.jpg/.png/.gif extension.');
                                    obj.valuơe = '';
                                    return false;
                                } else {
                                    //Image preview
                                    if (obj.files && obj.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            document.getElementById('imagePreview'+obj.id).innerHTML = '<img style="width:200px;" src="' + e.target.result + '"/>';
                                        };
                                        reader.readAsDataURL(obj.files[0]);
                                    }
                                }
                            }
                            function huychon(id) {
                                var parent = document.getElementById("content-color");
                                var child = document.getElementById('color-child'+id);
                                parent.removeChild(child);
                                // $('#color-number').val(parseInt($('#color-number').val())-1);
                            }
                            function chonsize(obj) {
                                var options = obj.children;
                                var html="";
                                var number= parseInt($('#sizenumber'+obj.id).val())+1;
                                for (var i = 0; i < options.length; i++){
                                    if (options[i].selected){
                                        html += '<h5>'+options[i].text+'</h5>'
                                            +'<input type="hidden" name="size-name-'+obj.id+'-'+number+'" value="'+options[i].value+'">'
                                            +' <input type="number" name="quantity-'+obj.id+'-'+number+'" min="1" max="100" value="1">';

                                    }
                                }
                                $('#sizenumber'+obj.id).val(number);
                                $('#soluong'+obj.id).append(html);
                                $('#quantity').val(parseInt($('#quantity').val())+1);
                            }
                        </script>

                    </div>


                    <div class="form-group">
                        <input id="quantity" type="hidden" value="0">
                        <a class="btn btn-danger" href="{{ route('list.product') }}" type="button" title="Cancel" value="">Quay lại</a>
                        <input name="submit" class="btn btn-primary" type="submit" value="Thêm" onclick="return send()">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    </script>
    <script src="{{ asset('js/chosen/chosen.jquery.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.chosen-select').chosen();
        });
        function send() {
            if($('#color-number').val()=== '0'){
                toastr.error('Bạn chưa chọn màu sản phẩm!', 'Thông báo', {timeOut: 3000});
                return false;
            }
            if($('#quantity').val()=== '0'){
                toastr.error('Bạn chưa chọn số lượng sản phẩm!', 'Thông báo', {timeOut: 3000});
                return false;
            }
        }
    </script>
@endsection