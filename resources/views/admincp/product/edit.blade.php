@extends('admincp.index')
@section('title')
    Sửa Sản Phẩm
@endsection
@section('content')
    <h1>
        Thêm Sản Phẩm...
    </h1>

    <br>

    <div class="row">
        <div class="box-content"  >
            <div class="table-responsive" >

                <form name="create" action="{{ url('admincp/product/edit/'.$product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-body custom-control-label">Tên Sản Phẩm(*):</label>
                        <input id="name" type="text" class="form-control backgroundinput @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <p style="color:red">{{ $errors->first('name') }}</p>
                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Danh Mục(*):</label>
                        <select name="cate" required>
                            @foreach($cates as $cate)
                                <option value="{{ $cate->id }}"
                                    @if($product->category_id==$cate->id)
                                    selected
                                    @endif
                                >{{ $cate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Bộ Sưu Tập(*):</label>
                        <select name="collections" required>
                            @foreach($collections as $value)
                                <option value="{{ $value->id }}" style=""
                                    @if($product->collections_id==$value->id)
                                    selected
                                    @endif
                                >{{ $value->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Mô tả(*):</label>
                        {{--<input id="price" type="number" class="form-control backgroundinput @error('name') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>--}}
                        <textarea class="form-control" required name="describe" rows="5">{{ $product->describe }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Ảnh(*):</label>
                        <input name='file-0-0' id='file-0-0' class='form-control' type='file' onchange='fileValidation(this)'>
                        <input name="old-image" type="hidden" value="{{ $product->image }}">
                        <div id='imagePreviewfile-0-0'>
                            <img style="width:200px;" src="{{ asset('images/products/'.$product->image) }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Giá Niêm Yết(VNĐ)(*):</label>
                        <input id="price" type="number" class="form-control backgroundinput @error('name') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price" autofocus>

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Giá Sale(VNĐ):</label>
                        {{--<input id="sale" type="number" class="form-control backgroundinput @error('name') is-invalid @enderror" name="sale" value="{{ $product->sale  }}" autocomplete="price" autofocus>--}}
                        <select class="form-control" name="sale">
                            @for($i=0; $i<=100; $i+=10)
                                <option value="{{ $i }}"
                                    @if($sale == $i)
                                        selected
                                    @endif
                                >{{ $i.'%' }}</option>
                            @endfor
                        </select>
                        @error('sale')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- Màu Hiện có --}}
                    <div id="has-content-color">
                        <label class="text-body custom-control-label">Màu Đã Có:</label>
                         <select id="hascolor" class="form-control" onchange="colorhas(this)">
                             <option>--Màu Đã Có--</option>
                             @foreach($hascolors as $value)
                                 <option value="{{ $value->color_id }}" >{{ $value->name }}</option>
                             @endforeach
                         </select>
                        <div id="hascolorcontent">
                        </div>
                        <input name="has-color-select" id="hascolorselect" type="hidden" value="0">

                          <script>
                              function colorhas(obj) {
                                  $.get('{{ url('editcolor/'.$product->id) }}'+'/'+obj.value, function (data) {
                                      $("#hascolorcontent").append(data);
                                      $("#hascolorselect").val(parseInt($("#hascolorselect").val())+1);
                                  });

                              }
                              function deletecolorhas(id) {
                                  var x= confirm('bạn có chắc chắn xóa màu này?');
                                  if(x==true){
                                      $.get('{{ url('deletecolor/'.$product->id) }}'+'/'+id, function (data) {
                                          var parent = document.getElementById("hascolorcontent");
                                          var child = document.getElementById('color-child-has-'+id);
                                          parent.removeChild(child);
                                      });
                                  }

                              }
                          </script>
                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Thêm Màu Mới:</label>
                        <select class="form-control" id="color"  onchange="chonmau()">
                            <option value="0">--chọn màu--</option>
                            @foreach($colors as $cate)
                                <option value="{{ $cate->id }}" id="colorvalue{{$cate->id}}">{{ $cate->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="color-number" name="color-number" value="0">
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
                                    obj.value = '';
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
                                var number= parseInt($('#sizenumber'+obj.id).val());
                                for (var i = 0; i < options.length; i++){
                                    if (options[i].selected){

                                        html += '<h5>'+options[i].text+'</h5>'
                                            +'<input type="hidden" id="size-name-'+obj.id+'-'+number+'" name="size-name-'+obj.id+'-'+number+'" value="'+options[i].value+'">'
                                            +'<input type="number" id="quantity-'+obj.id+'-'+number+'" name="quantity-'+obj.id+'-'+number+'" min="1" max="100" value="1">';
                                    }
                                }
                                $('#sizenumber'+obj.id).val(number+1);
                                $('#soluong'+obj.id).append(html);
                                $('#quantity').val(parseInt($('#quantity').val())+1);
                            }
                        </script>

                    </div>


                    {{-- Gửi thôn tin đi --}}
                    <div class="form-group">
                        <input id="quantity" type="hidden" value="0">
                        <a class="btn btn-danger" href="{{ route('list.product') }}" type="button" title="Cancel" value="">Quay lại</a>
                        <input name="submit" class="btn btn-primary" type="submit" value="Sửa" onclick="return send()">
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
           /* if($('#color-number').val()=== '0'){
                alert('Bạn chưa chọn màu sản phẩm!');
                return false;
            }
            if($('#quantity').val()=== '0'){
                alert('Bạn chưa nhập số lượng sản phẩm!');
                return false;
            }*/
        }
    </script>
@endsection