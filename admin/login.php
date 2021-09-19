<?php require_once '../vendor/autoload.php';
  use  App\Classes\Session;
  // $session  = new Session;
  // Session::init();
  Session::  checklogin();

 ?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Corpboot || Admin Sign in</title>
    <link rel="apple-touch-icon" sizes="120x120" href="img/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ==============-=========================================== -->
    <link rel="stylesheet" href="assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <div class="h-100vh">
          <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
          <!--LOGO-->
          <div class="logo">
            <img alt="logo" src="img/logo.png" />
            <!-- <h1 class="text-center">Corporate</h1> -->
          </div>
          <div class="container">
            <!-- login form -->
            <div class="row" id="login-form-box">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="row login-bg-color">
                  <div class="col-md-6 bg-light pd-100">
                    <h2>Login to Your Account</h2>
                    <hr class="form-top-hr">
                    <div class="" id="login-msg-show"></div>
                    <form action="" method="post" enctype="multipart/form-data" id="login-form">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" id="loginEmail" placeholder="Email" name="loginEmail" value="<?= isset($_COOKIE['useremail'])?$_COOKIE['useremail']:''; ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <span class="notice" id="loginEmail_notice"></span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?= isset($_COOKIE['password'])?$_COOKIE['password']:''; ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <span class="notice" id="password_notice"></span>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary pull-left">
                                <input type="checkbox" id="remember" name="remember" value="1" >
                                <label class="check" for="remember">Remember me</label>
                            </div>
                            <div class="pull-right">
                              <a href="javascripts:avoid(0)" id="showforgetpassword">Forget password?</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" id="login" name="login" value="Login">
                        </div>
                    </form>
                  </div>
                  <div class="col-md-6 pd-100">
                    <div class="wlc-text">
                      <h2>Wellcome Back</h2>
                      <hr>
                      <p>Please login with your valid email and password</p>
                      <button class="btn btn-wide btn-darker-1" id="showregform">Sign Up</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- reg form -->
            <div class="row" id="reg-form-box">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="row login-bg-color">
                  <div class="col-md-6 bg-light pd-100">
                    <h2> Create New Account</h2>
                    <hr class="form-top-hr">
                    <div class="" id="reg-msg-show"></div>
                    <form action="" method="post" enctype="multipart/form-data" id="reg-form">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="name"  placeholder="Your Name" name="name" value="" >
                                <i class="fa fa-user"></i>
                            </span>
                            <span class="notice" id="name_notice"></span>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="userName" placeholder="User Name" name="userName" value=""  >
                                <i class="fa fa-user"></i>
                            </span>
                            <span class="notice" id="userName_notice"></span>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" id="regEmail" placeholder="Email" name="regEmail" value="" >
                                <i class="fa fa-envelope"></i>
                            </span>
                            <span class="notice" id="regEmail_notice"></span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="regPassword" placeholder="Password" name="regPassword" value="" >
                                <i class="fa fa-key"></i>
                            </span>
                            <span class="notice" id="regPassword_notice"></span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="conPassword" placeholder="Confirm Password" name="conPassword" value="" >
                                <i class="fa fa-key"></i>
                            </span>
                            <span class="notice" id="conPassword_notice"></span>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" id="signup" name="signup" value="Sign Up">
                        </div>
                    </form>
                  </div>
                  <div class="col-md-6 pd-100">
                    <div class="wlc-text">
                      <h2>Welcome Back !</h2>
                      <hr>
                      <p>If you have alrady an account login here</p>
                      <button class="btn btn-wide btn-darker-1" id="showloginform">Login</button>
                      <p>If you forget your password click here</p>
                      <button class="btn btn-wide btn-darker-1" id="showforgetform">Forget Password</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- forget form -->
            <div class="row" id="forget-form-box">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="row login-bg-color">
                  <div class="col-md-6 bg-light pd-150">
                    <h2> Forget Your Password</h2>
                    <hr class="form-top-hr">
                    <div class="" id="forget-msg-show"></div>
                    <form action="" method="post" enctype="multipart/form-data" id="forget-form">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" id="forgetEmail" placeholder="Email" name="forgetEmail" value="">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <span class="notice" id="forgetEmail_notice"></span>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" id="forgetPassword" name="forgetpassword" value="Forget Password">
                        </div>
                    </form>
                  </div>
                  <div class="col-md-6 pd-100">
                    <div class="wlc-text">
                      <h2>Welcome Back !</h2>
                      <hr>
                      <p>Enter Your mail and check your inbox for Instruction. Please also check your span folder.</p>
                      <button class="btn btn-wide btn-darker-1" id="showloginform2">Log In</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>


          </div>
          <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<!-- <script src="assets/vendor/jquery/jquery-3.6.min.js"></script> -->
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="assets/javascripts/template-script.min.js"></script>
<script src="assets/javascripts/template-init.min.js"></script>
<script src="assets/javascripts/login.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


</html>
