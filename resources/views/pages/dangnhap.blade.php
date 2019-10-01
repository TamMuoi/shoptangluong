{{--@extends('master-layout')
@section('content')
    <div class="container dangnhap">
        <form>
            <div class="form-group">
              <label for="Email">Tên đăng nhập</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="password">Mật khẩu</label>
              <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>

            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
            hoặc <a href="{{ url('dangky') }}">Đăng ký </a>
          </form>
    </div>
@endsection--}}
<div class="container" style="     position: absolute;">
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content login-custom-form">
                <form action="{{ route('loginuser') }}" method="post">
                @csrf
                <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-centerz" style="text-shadow: 1px 1px 3px;font-size: 30px;">Login</h4>
                        <button type="button" class="close" data-dismiss="modal" style="margin-top:-40px;font-size: 65px;color: red;">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class=" w3l-form-group" style="padding-bottom:10px;">
                            <label>Username:</label>
                            <input id="login_email" type="email" class="form-control backgroundinput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <label>Password:</label>
                        <div class=" w3l-form-group">

                            <div class="pass">
                                <input id="inputpassword" type="password" class="form-control backgroundinput @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
{{--                            <div class="showpass"><i class="fa fa-eye" aria-hidden="true" onclick="showpass()"></i></div>--}}

                        </div>
                        <div class="forgot" style="padding: 5px 0;font-size:13px;">
                            <a href="#" style="color:blue;margin-bottom:5px;">Forgot Password?</a>
                            <div>
                                <p>
                                    <span style="padding-right:10px;"><input type="checkbox"> Remember Me</span>
                                    <span><input type="checkbox" onclick="showPass()"> Show Password</span>
                                </p>
                            </div>
                            <script>
                                function showPass() {
                                    var x = document.getElementById('inputpassword');
                                    if (x.type === 'password') {
                                        x.type = 'text';
                                    } else {
                                        x.type = 'password';
                                    }
                                }
                                function checkEmail(obj) {
                                    var x = obj.value;
                                    var vitri = x.search("@");
                                    if (vitri === 0) {
                                        alert('"@" cannot be at the beginning of the string');
                                        obj.focus();
                                    } else if (vitri === x.length - 1) {
                                        alert('"@" cannot be at the the end of the string');
                                        obj.focus();
                                    } else if (vitri === -1) {
                                        alert('Please include "@" in the email address');
                                        obj.focus();
                                    } else {
                                    }
                                }
                            </script>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-block btn-success">Login</button>

                    </div>
                </form>
                <div style="text-align: center;margin-bottom:20px;">Don't you have an account? <a  target="_blank" class="btn" style="color:blue;font-size:15px;" data-dismiss="modal" data-toggle="modal" data-target="#registerModal">Create Account</a></div>
            </div>
        </div>
    </div>
</div>
