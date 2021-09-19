<?php require_once '../vendor/autoload.php';
  use  App\Classes\Database;
  $db = new Database();

  if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];
    $query = "SELECT * FROM `users` where `email`='$email' AND `token`='$token'";
    $result = $db->select($query);
    if ($result !=FALSE) {

    }else {
      header('location: login.php');
    }


  }else {
    header('location: login.php');
  }

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
                    <h2>Reset Your Password</h2>
                    <hr class="form-top-hr">
                    <div class="" id="reset-msg-show"></div>
                    <form action="" method="post" enctype="multipart/form-data" id="reset-form">
                        <input type="hidden" name="reset_email" value="<?= $email; ?>">
                        <input type="hidden" name="reset_token" value="<?= $token; ?>">
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="reset_password" placeholder="New Password" name="reset_password" value="">
                                <i class="fa fa-key"></i>
                            </span>
                            <span class="notice" id="reset_password_notice"></span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="reset_cpassword" placeholder="Confirm Password" name="reset_cpassword" value="">
                                <i class="fa fa-key"></i>
                            </span>
                            <span class="notice" id="reset_cpassword_notice"></span>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" id="resetPassword" name="resetPassword" value="Reset Password">
                        </div>
                    </form>
                  </div>
                  <div class="col-md-6 pd-100">
                    <div class="wlc-text">
                      <h2>Wellcome Back</h2>
                      <hr>
                      <p>Please login with your valid email and password</p>
                      <a href="login.php" class="btn btn-wide btn-darker-1">login</a>
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
