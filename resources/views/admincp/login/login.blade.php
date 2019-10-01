<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Login Page</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Switch Login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Index-Page-CSS -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo-website/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin/login') }}/css/style.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <link href="//fonts.googleapis.com/css?family=Mukta+Mahee:200,300,400,500,600,700,800" rel="stylesheet">
    <!-- //fonts -->
    <!-- Font-Awesome-File-Links -->
    <link rel="stylesheet" href="{{ asset('admin/login') }}/css/font-awesome.css" type="text/css" media="all">
</head>

<body>
<h1 class="title-agile text-center">Login Admin</h1>
<div class="content-w3ls">
    <div class="content-top-agile">
        <img src="{{ asset('images/logo-website/logo.png') }}" alt="">
    </div>
    <div class="content-bottom">
        <form action="{{ route('admin.auth.loginAdmin') }}" method="post">
            @csrf
            <div class="field-group">
                <span class="fa fa-user" aria-hidden="true"></span>
                <div class="wthree-field">
                    <input name="email" id="username" type="email" placeholder="Email*" required autocomplete="off" />
                </div>
            </div>

            <div class="field-group pass">
                <span class="fa fa-lock" aria-hidden="true"></span>
                <div class="wthree-field">
                    <input name="password" id="paswword" type="password" placeholder="Mật Khẩu*" required autocomplete="off" />
                </div>
                <div class="showpass"><i class="fa fa-eye" aria-hidden="true" onclick="showpass()"></i></div>
                <script>
                    function showpass() {
                        var x= document.getElementById('paswword');
                        if(x.type=== 'password'){
                            x.type='text';
                        }
                        else{
                            x.type='password';
                        }
                    }
                </script>
            </div>
            <ul class="list-login">
                <li class="switch-agileits">
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                        nhớ đăng nhập
                    </label>
                </li>
                <li class="clearfix"></li>
            </ul>
            <div class="wthree-field">
                <input id="saveForm" name="saveForm" type="submit" value="Đăng Nhập"/>
            </div>
        </form>
    </div>
</div>
<div class="copyright text-center">
    <p>© 2019 Copy right
        <a target="_blank" href="https://www.facebook.com/tamcoj.chjp">TM International</a>
    </p>
</div>
</body>
<!-- //Body -->

</html>
