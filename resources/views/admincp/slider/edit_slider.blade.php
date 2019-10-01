@extends('admincp.index')
@section('content')
<h1>
    Sửa img slider...
</h1>

<br>
<div class="row">
    <div class="box-content">
        <div class="table-responsive">

            @foreach ($slider as $value)
            {{-- {{dd($slider->image)}} --}}
                <form name="create" action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-body custom-control-label">Ảnh slider :</label>
                        <input onchange="showIMG()" name="image" id="image" class="form-control" type="file">
                        <input name="old_file" class="form-control" type="hidden" value="{{$value->image}}">
                    </div>
                    <label for="">Ảnh cũ : </label>
                    <div id="viewImg">
                        <img style="width:25%;" src="{{asset('assets/img').'/'.$value->image}}" />
                    </div>
                    <br>
                    <div class="form-group">
                            <label class="text-body custom-control-label">Logo :</label>
                            <input onchange="showIMG()" name="logo" id="logo" class="form-control" type="file">
                            <input name="old_files" class="form-control" type="hidden" value="{{$value->logo}}">
                        </div>
                        <label for="">Logo cũ: </label>
                        <div id="viewImgs">
                            <img style="width:25%;" src="{{asset('assets/img').'/'.$value->logo}}" />
                        </div>
                    <div class="form-group">
                        <a class="btn btn-info" href="{{url('admincp/slider/listslider')}}" type="submit" title="Cancel">Quay lại</a>
                        <input name="submit" class="btn btn-primary" type="submit" value="Lưu">
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</div>

<script>
    function showIMG() {
        var fileInput = document.getElementById(['image','logo']);
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
                    document.getElementById(['viewImg','viewImgs']).innerHTML = '<img style="width:150px; height: 200px;" src="' + e.target.result + '"/>';
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    }

</script>
@endsection
