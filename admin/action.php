<?php
  require '../vendor/autoload.php';

  use  App\Classes\Database;
  use  App\Classes\ShowMessage;
  use  App\Classes\Session;

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;




  $db = new Database();
  $showMsg = new ShowMessage();
  $session = new Session();

  $mail = new PHPMailer(true);



  if (isset($_POST['action']) && $_POST['action']=='register') {
    $name = $_POST['name'];
    $username = $_POST['userName'];
    $email = $_POST['regEmail'];
    $password = $_POST['regPassword'];
    $con_password = $_POST['conPassword'];
    $passwordlength = strlen($password);
    $password = password_hash($password,PASSWORD_DEFAULT);

    $usernameLength = strlen($username);
    if ($usernameLength>5) {
      if ($usernameLength<21) {
        if ($passwordlength>5) {
          if ($passwordlength<21) {
            if ($password == $con_password) {
              // code...
            }else {
              // code...
            }
            $query = "SELECT `username` FROM `users` WHERE `username` = '$username' ";
            $user_name_exist = $db->user_info_exist($query);

            $query = "SELECT `email` FROM `users` WHERE `email` = '$email' ";
            $user_email_exist = $db->user_info_exist($query);

            if ($user_email_exist == 1) {
              $msg = "This Email already exist our system";
              echo $showMsg->showMessage('warning','Sorry',$msg);
            }else {
              if ($user_name_exist == 1) {
                $msg = "This Username already exist our system";
                echo $showMsg->showMessage('warning','Sorry',$msg);
              }else {
                $query = "INSERT INTO `users`(`name`, `username`, `email`, `password`) VALUES ('$name','$username','$email','$password')";
                $result = $db->insert($query);

                if (isset($result)){
                  $msg = "Successfully Signup goto Login";
                  echo $showMsg->showMessage('success','Congratulation',$msg);
                }
              }
            }
          }else {
            $msg = "Password less than 21 character";
            echo $showMsg->showMessage('warning','Sorry',$msg);
          }
        }else {
          $msg = "Password more than 5 character";
          echo $showMsg->showMessage('warning','Sorry',$msg);
        }
      }else {
        $msg = "Username less then 21 Character";
        echo $showMsg->showMessage('warning','Sorry',$msg);
      }
    }else {
      $msg = "Username more then 5 Character";
      echo $showMsg->showMessage('warning','Sorry',$msg);
    }


  }


  if (isset($_POST['action']) && $_POST['action']=='login') {
    $email = $_POST['loginEmail'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember'])? 1 : 0 ;

    $query = "SELECT * FROM `users` WHERE `email` = '$email' ";
    $result = $db->select($query);
    if ($result) {
      // print_r($result);
      $row = mysqli_fetch_assoc($result);
      $serv_pass = $row['password'];
      $passwordlength = strlen($password);

      if ($passwordlength>5) {
        if ($passwordlength<21) {
          if (password_verify($password,$serv_pass)) {
            if ($row['status']==1) {
              Session::init();
              Session::set('login',TRUE);
              Session::set('username',$row['username']);
              Session::set('email',$row['email']);
              echo 'ok';
              if ($remember) {
                setcookie('useremail', $email,time()+(7*24*60*60));
                setcookie('password', $password,time()+(7*24*60*60));
              }else {
                setcookie('useremail', '', -time()+(7*24*60*60));
                setcookie('password', '', -time()+(7*24*60*60));
              }
              // header('location:index.php');
              // $msg = "Password Match";
              // echo $showMsg->showMessage('success','Congratulation',$msg);
            }else {
              $msg = "Your Account is Not Active";
              echo $showMsg->showMessage('warning','Sorry',$msg);
            }

          }else {
            $msg = "Password Not Match";
            echo $showMsg->showMessage('danger','Sorry',$msg);
          }
        }else {
          $msg = "Password less than 21 character";
          echo $showMsg->showMessage('warning','Sorry',$msg);
        }
      }else {
        $msg = "Password more than 5 character";
        echo $showMsg->showMessage('warning','Sorry',$msg);
      }


    }else {
      $msg = "You are not registered our system";
      echo $showMsg->showMessage('warning','Sorry',$msg);
    }

  }

  if (isset($_POST['action']) && $_POST['action']=='forgetpass') {
    $email = $_POST['forgetEmail'];

    $query = "SELECT * FROM `users` WHERE `email` = '$email' ";
    $result = $db->select($query);
    if ($result != FALSE) {
      $token = uniqid();
      $query = "UPDATE `users` SET `token`='$token' WHERE `email` = '$email'";
      $db->update($query);
      try {
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'smtp.mailtrap.io';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = '6bf7c187e12d42';                     //SMTP username
          $mail->Password   = 'a8a1250f61f32a';                               //SMTP password
          // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
          $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
          $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          //Recipients
          $mail->setFrom('admin@corpboot.com.bd', 'Corpboot');
          $mail->addAddress($email);

          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = 'Reset Password';
          $mail->Body    = '`<div class="" style="height: auto; max-width: 500px; margin: 20px auto; border: 2px solid gray; padding: 20px; text-align: center;">
                                <h3>Reset Your Password</h3>
                                <a href="http://127.0.0.1/corpboot/admin/reset-password.php?email='.$email.'& token='.$token.'" style="text-decoration:none; padding: 10px 25px; background-color: blue; color:white; border-radius: 8px;">Cleck here</a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              </div>`';

          $mail->send();
          $msg = "Check Your email quickly";
          echo $showMsg->showMessage('success','Done',$msg);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }else {
      $msg = "You are not registered our system";
      echo $showMsg->showMessage('danger','Sorry',$msg);
    }

  }


  if (isset($_POST['action']) && $_POST['action']=='reset') {

    $email = $_POST['reset_email'];
    $token = $_POST['reset_token'];
    $reset_password = $_POST['reset_password'];
    $reset_cpassword = $_POST['reset_cpassword'];
    $reset_password_length = strlen($reset_password);
    $reset_cpassword_length = strlen($reset_cpassword);
    if ($reset_password_length>5) {
      if ($reset_password_length <20 ) {
        if ($reset_password == $reset_cpassword) {
          $reset_password = password_hash($reset_password,PASSWORD_DEFAULT);
          $query = "UPDATE `users` SET `password`='$reset_password' WHERE `email`='$email' AND `token` = '$token'";
          $result = $db->update($query);
          if ($result != FALSE) {
            $msg = "Password Reset Successfully";
            echo $showMsg->showMessage('info','Congratulation',$msg);
            $query = "UPDATE `users` SET `token`=NULL WHERE `email` = '$email'";
            $db->update($query);
          }else {
            $msg = "Server Error";
            echo $showMsg->showMessage('warning','Sorry',$msg);
          }
        }else {
          $msg = "Confirm Password Not Match";
          echo $showMsg->showMessage('danger','Sorry',$msg);
        }
      }else {
        $msg = "Password Less than 20 character";
        echo $showMsg->showMessage('warning','Sorry',$msg);
      }
    }else {
      $msg = "Password more than 5 character";
      echo $showMsg->showMessage('warning','Sorry',$msg);
    }

  }
