@extends('master-layout')
@section('title')
        Profile
@endsection
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">

    <div class="container">
        <h1>Tài Khoản Người Dùng</h1>
        <hr>
        <div class="row">

            <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4" style="">
                <div class="profileavatar" id="profileavatar">
                    <img src="{{ asset('images/avatar/'.$user->avatar) }}" >
                </div>
            </div>
            <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 row inforuser" id="inforuser" style="">
                <form action="{{ url('profile/changeinfor/'.$user->id) }}" method="post" name="change" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12" style="">
                        <input type="text" name="username" class="nameuser profileinput" value="{{ $user->name }}" required readonly />
                        <hr>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4" style="">
                        <b>Email:</b>
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8" style="">
                        <input type="text" name="emailuser" class="profileinput" value="{{ $user->email }}" required readonly />
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4" style="">

                        <b>Ngày Sinh:</b>
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8" style="">
                        <input type="date" name="birthuser" value="{{ $user->birth }}" class="profileinput" required readonly />
                        <input type="hidden" name="old-file" value="{{ $user->avatar }}" class="profileinput" />
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4" style="">
                        <b>Giới tính:</b>
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8" style="">
                        <div id="gender">
                            @if($user->gender==0)
                                Nam
                            @else
                                Nữ
                            @endif
                        </div>
                        <select name="genderuser" id="changgender" class="profileinput" hidden>
                            <option value="0">nam</option>
                            <option value="1">nữ</option>
                        </select>
                    </div>

                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12" style=""  id="avataruser" hidden>
                        <label><b>Chọn Ảnh mới:</b></label>
                        <input type="file" name="avataruser" id="avataruser" accept=".png, .jpg, .jpeg, .gif" onchange="fileValidation2(this)">

                    </div>
                    <hr>
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12" style="">
                        <button class="btn btn-outline-success" type="submit" id="btsubmmitchange" hidden>Thay Đổi</button>
                        <button class="btn btn-outline-danger" type="reset" id="btcancelchange" onclick="return huysuathongtin()" hidden>Hủy</button>
                    </div>
            </form>


        </div>
            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12" style="text-align: center">
                    <br>

                    <button class="btn btn-outline-success" id="btinforchange" onclick="suathongtin()">Sửa Thông tin</button>
                    <button class="btn btn-outline-primary" id="btchangepass" onclick="changpassword()">Đổi Mật Khẩu</button>
                    <script>
                        function suathongtin() {
                            var x = document.querySelector("#inforuser");
                            // var y = document.querySelector(".profileinput");

                            x.classList.remove('inforuser');
                            // y.classList.add('form-control');
                            $('.profileinput').addClass('form-control');
                            $('.profileinput').removeAttr('readonly');
                            $('#btinforchange').prop('hidden', true);

                            $('#btcancelchange').removeAttr('hidden');
                            $('#btsubmmitchange').removeAttr('hidden');
                            $('#avataruser').removeAttr('hidden');

                            $('#changgender').prop('hidden', false);
                            $('#gender').prop('hidden', true);
                        }
                        function huysuathongtin() {
                            var x = document.querySelector("#inforuser");
                            // var y = document.querySelector(".profileinput");

                            x.classList.add('inforuser');
                            // y.classList.add('form-control');
                            $('.profileinput').removeClass('form-control');
                            $('.profileinput').prop('readonly', true);
                            $('#btinforchange').prop('hidden', false);

                            $('#btcancelchange').prop('hidden', true);
                            $('#btsubmmitchange').prop('hidden', true);
                            $('#avataruser').prop('hidden', true);

                            $('#changgender').prop('hidden', true);
                            $('#gender').prop('hidden', false);
                            document.getElementById('profileavatar').innerHTML = '<img src="{{ asset('images/avatar/'.$user->avatar) }}" >';
                            return true;
                        }
                        function changpassword() {
                            $('#changepass').removeAttr('hidden');

                            $('#btchangepass').prop('hidden', true);
                        }
                        function fileValidation2(obj) {
                            // var fileInput = document.getElementById('avataruser');

                            var filePath = obj.value; //lấy giá trị input theo id
                            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; //các tập tin cho phép
                            //Kiểm tra định dạng
                            if (!allowedExtensions.exec(filePath)) {
                                alert('You can only select files with .jpeg/.jpg/.png/.gif extension.');
                                fileInput.value = '';
                                return false;
                            } else {
                                //Image preview
                                if (obj.files && obj.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        document.getElementById('profileavatar').innerHTML = '<img src="' + e.target.result + '"/>';
                                    };
                                    reader.readAsDataURL(obj.files[0]);
                                }
                            }
                        }
                    </script>
            </div>

            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12" id="changepass" hidden >
                    <hr>
                <h1>Thay Đổi Mật Khẩu</h1>
                <form action="{{ url('profile/changepass/'.$user->id) }}" method="post" name="changepass">
                    @csrf
                    <div class="form-group">
                        <label class="label">Mật Khẩu Hiện Tại:</label>
                        <input class="form-control" type="password" name="oldpass" id="oldpass" required placeholder="Old Password" onchange="checkPass(this)"/>
                        <p style="color: red" id="errorPass"></p>
                    </div>
                    <div class="form-group">
                        <label class="label">Mật Khẩu Mới:</label>
                        <input class="form-control" type="password" name="newpass" id="newpass" required placeholder="New Password" onchange="lengthPasswword(this)"/>
                        <p style="color: red" id="lengthpassinfor"></p>
                    </div>
                    <div class="form-group">
                        <label class="label"> Nhập Lại Mật Khẩu:</label>
                        <input class="form-control" type="password" name="repass" id="repass" required placeholder="Confirm Password" onchange="confirmPasswword(this)"/>
                        <p style="color: red" id="errorpassinfor"></p>
                    </div>
                    <div class="form-group" style="text-align: center">
                        <input type="reset" class="btn btn-outline-danger" value="Hủy" onclick="return huypass()" />
                        <script>
                            function huypass() {
                                $('#btchangepass').removeAttr('hidden');

                                $('#changepass').prop('hidden', true);
                                return true;
                            }
                            function checkPass(obj){
                                /*var x= document.getElementById('search_name').value;*/
                                var x = obj.value;
                                if(x===""){
                                    $("#errorPass").innerHTML='';

                                }
                                else {

                                    $.get('{{ url('profile/checkpass/'.Auth::user()->id) }}'+'/'+x, function (data) {
                                        $("#errorPass").html(data);
                                    });
                                }
                            }
                            function lengthPasswword(obj) {
                                var x= obj.value;
                                if(x.length < 8){
                                   /* document.getElementById('lengthpass').style.display = 'block';
                                    document.getElementById('lengthpass').innerHTML = '<span>Password length must be greater than or equal to 8 characters</span>';*/
                                   $('#lengthpassinfor').html('Mật Khẩu phải dài hơn 8 ký tự');
                                }
                                else if(x === ('#oldpass').value){
                                    $('#lengthpassinfor').html('Mật khẩu mới không nên trùng vơi mật khẩu cũ');
                                }
                                else
                                {
                                    $('#lengthpassinfor').html('');

                                }
                            }
                            function confirmPasswword(obj) {
                                var x= obj.value;
                                var y= document.getElementById('newpass').value;


                                if(x != y){
                                   $('#errorpassinfor').html('Nhập Lại Mật khẩu Không đúng');
                                }
                                else
                                {
                                    $('#errorpassinfor').html('');

                                }
                            }
                        </script>
                        <input type="submit" class="btn btn-outline-success" value="Thay Đổi" onclick="return check()"/>
                        <script>
                        function check() {
                            var x= document.getElementById('repass').value;
                            var y= document.getElementById('newpass').value;


                            if(x != y){
                                return false;
                            }
                            else
                            {
                               return true;

                            }
                        }
                        </script>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
