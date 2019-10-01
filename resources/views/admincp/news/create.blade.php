@extends('admincp.index')
@section('title')
    Thêm Bài Viết
@endsection
@section('content')
    <link href="{{ asset('css/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">
<h1>
    Thêm Bài Viết...
    </h1>
    
    <br>
    
    <div class="row">
        <div class="box-content"  >
            <div class="table-responsive" >
    
                <form name="create" action="{{ route('store.news') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-body custom-control-label">Tiêu Đề:</label>
                        <input id="name" type="text" class="form-control backgroundinput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <p style="color:red">{{ $errors->first('name') }}</p>
                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Mô Tả:</label>

                        <textarea name="summary" class="form-control" required rows="5">{{ old('summary') }}</textarea>
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
                        <label class="text-body custom-control-label">Avatar:</label>

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
                            <label class="text-body custom-control-label">Danh mục:</label>
                            <select class="form-control" name="cate">
                                @foreach($cates as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                @endforeach

                            </select>

                        </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Tag:</label>
                        <input type="text" value="" data-role="tagsinput" name="tags" value="{{ old('tag') }}">

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