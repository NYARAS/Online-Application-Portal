<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">



  <title>Login</title>
{!!Html::style('public/css/bootstrap.min.css')!!}
{!!Html::style('public/css/bootstrap-theme.css')!!}
{!!Html::style('public/css/elegant-icons-style.css')!!}
{!!Html::style('public/css/font-awesome.css')!!}
{!!Html::style('public/css/style.css')!!}
{!!Html::style('public/css/style-responsive.css')!!}


</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" action="{{route('admin.login.submit')}}" method="POST">
  {!!csrf_field()!!}
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="email" class="form-control" placeholder="email" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
        <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button>
      </div>
    </form>
    
  </div>


</body>

</html>
