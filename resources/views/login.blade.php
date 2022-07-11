<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('frontend/css/login.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap1.min.css')}}" type="text/css" media="all">
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}" type="text/css" media="all">
    <title>Document</title>
</head>
<body>
<div class="login-page">
  <div class="form">
    <h4 class="text-center">welcome to IT.DOC</h4>
    <form action="{{URL::to('/add-customer')}}" method="POST" class="register-form">
    {{csrf_field()}}
      <input type="text" placeholder="name" name="customer_name" required/>
      <input type="text" placeholder="email address" name="customer_email" required/>
      <input type="password" placeholder="password" name="customer_password" required/>
      <input type="password" placeholder="confirm password" name="confirm_password" required/>
      <button type="submit">Register</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>

    <form class="login-form" action="{{URL::to('/trang-chu')}}" method="POST">
    {{csrf_field()}}
    @if (Session::has('error'))
    <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-danger">{{ Session::get('success') }}</div>
    @endif
      <input type="text" placeholder="email" name="customer_email" required/>
      <input type="password" placeholder="password" name="customer_password" required/>
      <button type="submit">login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
  </div>
</div>
</body>
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<script>
    $('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>

</html>