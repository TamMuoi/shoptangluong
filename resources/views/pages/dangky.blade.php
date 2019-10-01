<style>
    /*.input-group {*/
    /*    width: 100%;*/
    /*}*/

    /*.birth-day .birth-item{*/
    /*    float: left;*/
    /*    width: 30%;*/
    /*}*/
    /*.birth-day .birth-item select{*/

    /*    background-color: white;*/
    /*}*/
</style>
<div class="container" style="position: absolute;">

    <div class="modal fade" id="registerModal">
        <div class="modal-dialog">
            <div class="modal-content login-custom-form">
                <div class="modal-header" >
                    <h4 class="modal-title text-center" style="text-shadow: 1px 1px 3px;font-size: 30px;">Create Account</h4>
                    <button type="button" class="close" data-dismiss="modal" style="margin-top:-40px;font-size:65px;color: red;">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('createuser') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control backgroundinput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Giới tính:') }}</label>

                            <div class="col-md-9">
                                <select name="gender" class="backgroundinput">
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Birthday') }}</label>

                            <div class="col-md-9">
                                <div class="input-group birth-day">
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

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control backgroundinput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                     <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if($errors->first('email')!=null)
                                <script>
                                    alert("{{ $errors->first('email') }}");
                                </script>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-9">
                                <input type="file" id="avatar" name="avatar" style="border: transparent;" placeholder="Avatar" class="form-control backgroundinput" onchange="fileValidation()" accept=".jpg, .png, .gif">
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
                                <div id="imagePreview" style="margin: 0 auto;">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-9">
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

                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-9">
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
                        </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" value="Register" class="btn btn-block btn-warning float-right login_btn">
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
