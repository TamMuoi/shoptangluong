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
        Thêm user account...
    </h1>
    
    <br>
    
    <div class="row">
        <div class="box-content"  >
            <div class="table-responsive" >
    
                <form name="create" action="{{ route('store.useraccount') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="text-body custom-control-label">Tên Người Dùng:</label>
                        <input id="name" type="text" class="form-control backgroundinput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <p style="color:red">{{ $errors->first('name') }}</p>
                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Giới tính:</label>
                        <select name="gender" class="">
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="text-body col-md-12 custom-control-label">Ngày sinh:</label>
                            <div class="input-group col-md-12 birth-day">
                                <div class="row">
                                    <div id="" class="col-md-4">
                                        Year:<select id="year" name="year" class="backgroundinput" onchange="changyear(this)">
                                            <?php $now = getdate();?>
                                            @for($i = $now["year"]- 15 ; $i>= $now["year"]- 65 ; $i--)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div id="" class="col-md-4">
                                        Month:<select id="month" class="backgroundinput" name="month" onchange="checkmonth(this)">
                                            @for($i = 1; $i<=12 ; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div id="monthday" class="col-md-4">
                                        Day:<select id="day" name="day" class="backgroundinput">
                                            @for($i = 1; $i<=31 ; $i++)
                                                <option>{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        <script>
                            function checkmonth(obj) {
                                var day= document.getElementById('monthday');
                                var year= document.getElementById('year');
                                var numberday="Day:<select id='day' name='day' class='backgroundinput'>";
                                switch ( parseInt(obj.value)) {
                                    case 2:{
                                        if(year.value%4==0 && year.value%100!=0 || year.value%400==0) {
                                            for (i = 1; i <= 29; i++) {
                                                numberday += "<option value='" + i + "'>" + i + "</option>";
                                            }
                                        }
                                        else {
                                            for (i = 1; i <= 28; i++) {
                                                numberday += "<option value='" + i + "'>" + i + "</option>";
                                            }
                                        }
                                        break;
                                    }
                                    case 4:
                                    case 6:
                                    case 9:
                                    case 11:
                                    {
                                        for(i=1; i<=30; i++){
                                            numberday += "<option value='"+i+"'>"+i+"</option>";
                                        }
                                        break;
                                    }
                                    default:{
                                        for(i=1; i<=31; i++){
                                            numberday += "<option value='"+i+"'>"+i+"</option>";
                                        }
                                        break;
                                    }

                                }
                                numberday +="</select>";
                                day.innerHTML =numberday;
                            }
                            function changyear(obj) {
                                var day = document.getElementById('monthday');
                                var month = document.getElementById('month');
                                if (parseInt(month.value) == 2) {
                                    var numberday = "Day:<select id='day' name='day' class='backgroundinput'>";
                                    if (obj.value % 4 == 0 && obj.value % 100 != 0 || obj.value % 400 == 0) {
                                        for (i = 1; i <= 29; i++) {
                                            numberday += "<option value='" + i + "'>" + i + "</option>";
                                        }
                                    }
                                    else{
                                        for (i = 1; i <= 28; i++) {
                                            numberday += "<option value='" + i + "'>" + i + "</option>";
                                        }
                                    }

                                    numberday += "</select>";
                                    day.innerHTML = numberday;
                                }
                            }
                        </script>
                    </div>

                    <div class="form-group">
                        <label class="text-body custom-control-label">Email:</label>
                        <input name="email" id="email" class="form-control" type="email">

                    </div>
                    <div class="form-group">
                        <label class="text-body custom-control-label">Avatar:</label>

                        <input type="file" id="avatar" name="avatar" style="border: transparent;" placeholder="Avatar" class="form-control backgroundinput" onchange="fileValidation()" accept=".jpg, .png, .gif">
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
                            <label class="text-body custom-control-label">Mật Khẩu:</label>
                                <input id="password" type="password" class="form-control backgroundinput @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  onchange="lengthPasswword(this)">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div id="lengthpass" style="color: red; font-size: 15px"></div>
                                <script>
                                    function lengthPasswword(obj) {
                                        var x = obj.value;
                                        if (x.length < 8) {
                                            document.getElementById('lengthpass').style.display = 'block';
                                            document.getElementById('lengthpass').innerHTML = '<span>Password length must be greater than or equal to 8 characters</span>';
                                        } else {
                                            document.getElementById('lengthpass').style.display = 'none';
                                        }
                                    }
                                </script>

                        </div>

                        <div class="form-group">
                            <label class="text-body custom-control-label">Nhập lại Mật Khẩu:</label>
                                <input id="password-confirm" type="password" class="form-control backgroundinput" name="password_confirmation" required autocomplete="new-password" onchange="confirmPasswword(this)">
                                <p id="errorpass" style="color: red; font-size: 15px"></p>
                                <script>
                                    function confirmPasswword(obj) {
                                        var y = document.getElementById('password').value;
                                        var x = obj.value;
                                        if (x != y) {
                                            document.getElementById('errorpass').style.display = 'block';
                                            document.getElementById('errorpass').innerHTML = '<span>Confirm Pass word ís not correct</span>';
                                        } else {
                                            document.getElementById('errorpass').style.display = 'none';
                                        }
                                    }
                                </script>
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