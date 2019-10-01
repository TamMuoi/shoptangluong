@extends('admincp.index')
@section('content')


{{-- <form role="form" class="form-horizontal" action="">    
    <div class="form-group">
        <div class="col-md-8">
            <div class="input-group in-grp1">							
                <span class="input-group-addon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <input type="text" class="form-control1" placeholder="Email Address">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-8">
            <div class="input-group in-grp1">
                <label>Img slider</label>
                <input type="file" id="exampleInputFile">
            </div>
        </div>
    </div>
</form> --}}

<h1>
        Thêm img slider...
    </h1>
    
    <br>
    @if ($errors ->any())

    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{$err}}</li>
            @endforeach
        </ul>
    </div>
        
    @endif
    <div class="row">
        <div class="box-content"  >
            <div class="table-responsive" >
    
                <form name="create" action="{{url('admincp/slider/addslider')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-body custom-control-label">Ảnh slider:</label>
                        <input onchange="showIMG()" name="image" id="image" class="form-control" type="file">
                        {{-- <p style="color:red">{{ $errors->first('image') }}</p> --}}
                    </div>

                    <div class="form-group">
                        <label for="">Ảnh hiển thị : </label>
                        <div id="viewImg">
        
                        </div>
                    </div>
                    
                    <div class="form-group">	
                        <label class="text-body custom-control-label">Logo : (Nếu có)</label>
                        <input onchange="showIMGs()" name="logo" id="logo" class="form-control" type="file">
                        {{-- <p style="color:red">{{ $errors->first('logo') }}</p> --}}
                    </div>

                    <div class="form-group">
                                <label for="">Logo hiển thị : </label>
                                <div id="viewImgs">
                
                                </div>
                    </div>
                    
                    {{-- <div class="form-group">
                        <label for="" class="text-body custom-control-label">Tiêu đề</label>
                        <input type="text" name="title" class="form-control">
                        <p style="color:red">{{ $errors->first('title') }}</p>
    
                    </div>     --}}
                    <div class="form-group">
                        <a class="btn btn-danger" href="{{url('admincp/slider/listslider')}}" type="button" title="Cancel" value="">Quay lại</a>
                        <input name="submit" class="btn btn-primary" type="submit" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function showIMG() {
            var fileInput = document.getElementById('image','logo');
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
                        document.getElementById('viewImg','viewImgs').innerHTML = '<img style="width:350px; height: 200px;" src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
        function showIMGs() {
            var fileInput = document.getElementById('logo');
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
                        document.getElementById('viewImgs').innerHTML = '<img style="width:150px; height: 200px;" src="' + e.target.result + '"/>';
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }

    
    
    </script>
@endsection