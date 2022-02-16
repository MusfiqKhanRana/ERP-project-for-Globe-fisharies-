<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logo/icon.png')}}"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/backend/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/backend/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/backend/global/css/components-rounded.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset('assets/backend/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/backend/pages/css/login-4.min.css')}}" rel="stylesheet" type="text/css" />

</head>
    
<body class="login" style="background-image: url({{asset('assets/backend/img/office.jpg')}})">
<br>
<br>
<br>
<br>
<br>
<br>

<div class="content" style="background-color: black">
    {{-- @if(Session::has('message'))
        <div class="alert alert-success">
            <strong>{{Session::get('message')}}</strong>.
        </div>
    @endif
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif --}}
    {!! session('flash_msg_success')!!}
    <!-- BEGIN LOGIN FORM -->
   <form class="login-form"  method="POST" action="{{ route('post-login') }}">
        {{ csrf_field() }}
        <h3 class="form-title">Admin Login</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter Your Email and password. </span>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" />
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" />
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-actions">
            <div style="color: red;"> 
            @php
                if(isset($misscred)){
                    echo '**',$misscred,'**';
                    echo '<br>';
                }  
            @endphp
                        </div>  
            <label class="control-label">
                <input  type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>  Remember me
            </label>
            <button type="submit" class="btn green-dark pull-right"> Login </button>
        </div>
    </form>

</div>

<div class="copyright" style="color: black">2022@copyright All rights reserved</div>



<script src="assets/backend//global/plugins/respond.min.js"></script>
<script src="assets/backend//global/plugins/excanvas.min.js"></script>

<script src="assets/backend//global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/backend//global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/backend//global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="assets/backend//global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/backend//global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/backend//global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/backend//global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/backend//global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

<script src="assets/backend//global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/backend//global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="assets/backend//global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="assets/backend//global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>

<script src="assets/backend//global/scripts/app.min.js" type="text/javascript"></script>

<script src="assets/backend//pages/scripts/login-4.min.js" type="text/javascript"></script>

</body>

</html>