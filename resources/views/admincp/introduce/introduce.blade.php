@extends('admincp.index')
@section('content')



<h1>
        Giới thiệu...
    </h1>
    
    <br>
@if(session('thongbao'))
    <script>
        alert('{{ session('thongbao') }}');

    </script>
@endif
    
    <div class="row">
        <div class="box-content"  >
            <div class="table-responsive" >
    
                <form name="create" action="{{url('admincp/introduce/edit/'.$introduce->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="text-body custom-control-label">Mô tả ngắn:</label><br>
                        <textarea name="summary" class="form-controlr"  rows="10" cols="80">{{ $introduce->summary}}</textarea>

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Giới thiệu chi tiết:</label>
                        <textarea name="content"  rows="10" cols="80">{{ $introduce->content}}</textarea>

                    </div>


                    <div class="form-group">
                        <label class="text-body custom-control-label">Email:</label>
                        <input id="email" type="email" class="form-control backgroundinput @error('email') is-invalid @enderror" name="email" value="{{ $introduce->email }}"  autocomplete="name" autofocus>

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Số điện thoại:</label>
                        <input id="phone" type="text" class="form-control backgroundinput @error('phone') is-invalid @enderror" name="phone" value="{{ $introduce->phone }}"  autocomplete="name" autofocus>

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">FaceBook:</label>
                        <input id="facebook" type="text" class="form-control backgroundinput @error('facebook') is-invalid @enderror" name="facebook" value="{{ $introduce->facebook }}" autocomplete="name" autofocus>

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">YouTube:</label>
                        <input id="youtube" type="text" class="form-control backgroundinput @error('youtube') is-invalid @enderror" name="youtube" value="{{ $introduce->youtube }}"  autocomplete="name" autofocus>

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Instagram:</label>
                        <input id="instagram" type="text" class="form-control backgroundinput @error('instagram') is-invalid @enderror" name="instagram" value="{{ $introduce->instagram }}"  autocomplete="name" autofocus>

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Twitter:</label>
                        <input id="twitter" type="text" class="form-control backgroundinput @error('twitter') is-invalid @enderror" name="twitter" value="{{ $introduce->twitter }}" autocomplete="name" autofocus>

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">video:</label>
                        <input id="video" type="text" class="form-control backgroundinput @error('video') is-invalid @enderror" name="video" value="{{ $introduce->video }}">
                    </div>

                    <div class="form-group">
                        <a class="btn btn-danger" href="{{url('admincp/introduce/listintroduce')}}" type="button" title="Cancel" value="">Quay lại</a>
                        <input name="submit" class="btn btn-primary" type="submit" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace( 'content' ,{
            filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
    
@endsection