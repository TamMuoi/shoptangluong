@extends('admincp.index')
@section('title')
    Thêm Bài Viết tuyển dụng
@endsection
@section('content')
    <link href="{{ asset('css/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">
<h1>
    Thêm Bài Viết Tuyển Dụng...
    </h1>
    
    <br>
    
    <div class="row">
        <div class="box-content"  >
            <div class="table-responsive" >
    
                <form name="create" action="{{ route('store.recruitment') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-body custom-control-label">Tiêu Đề:</label>
                        <input id="title" type="text" class="form-control backgroundinput @error('name') is-invalid @enderror" name="title" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <input name="code" type="hidden" value="{{ str_random(6) }}" />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <p style="color:red">{{ $errors->first('name') }}</p>
                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Bắt Đầu:</label>
                        <input class="form-control" name="begin_time" type="date" required  value=""/>
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Kết thúc:</label>
                        <input class="form-control" name="end_time" type="date" required />
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label" >Nội Dung:</label>
                        <textarea name="content" class="form-control" required rows="5">{{ old('content') }}</textarea>
                        <p style="color: red">{{ $errors->first('content') }}</p>
                        <script>
                            CKEDITOR.replace( 'content', {
                                filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
                                filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
                                filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
                                filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                                filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                                filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                            });
                        </script>
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Ảnh:</label>

                        <input type="file" id="avatar" name="image" style="border: transparent;" placeholder="Avatar" class="form-control backgroundinput" onchange="fileValidation()" accept=".jpg, .png, .gif">
                        <div id="imagePreview" style="margin: 0 auto;">
                        </div>
                        <script type="text/javascript">
                            function fileValidation() {
                                var fileInput = document.getElementById('avatar');
                                var filePath = fileInput.value; //lấy giá trị input theo id
                                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; //các tập tin cho phép
                                //Kiểm tra định dạng
                                if (!allowedExtensions.exec(filePath)) {
                                    alert('You can only select files with .jpeg/.jpg/.png/.gif extension.');
                                    fileInput.value = '';
                                    return false;
                                } else {
                                    //Image preview
                                    if (fileInput.files && fileInput.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            document.getElementById('imagePreview').innerHTML = '<img style="width:300px;" src="' + e.target.result + '"/>';
                                        };
                                        reader.readAsDataURL(fileInput.files[0]);
                                    }
                                }
                            }
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Mức Lương:</label>
                        <input type="number" class="form-control" name="salary" required value="{{ old('salary') }}">

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Vị Trí:</label>
                        <input type="text" class="form-control" name="position" required value="{{ old('position') }}">

                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Tag:</label>
                        <input type="text"  data-role="tagsinput" name="tags" value="{{ old('tag') }}" title=""><br>
                        <span>(Nhấn "," để thêm tag)</span>
                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Thời Gian Làm việc:</label>
                      <select name="work_time">
                          <option value="0">PartTime</option>
                          <option value="1">FullTime</option>
                      </select>

                    </div>

                    <div class="form-group">
                        <a class="btn btn-danger" href="{{url('admincp/listslider')}}" type="button" title="Cancel" value="">Quay lại</a>
                        <input name="submit" class="btn btn-primary" type="submit" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
    </script>
    <script src="{{ asset('js/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
@endsection