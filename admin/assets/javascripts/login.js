$(document).ready(function(){

  const site_url = 'http://127.0.0.1/corpboot/';

  $('#showregform').click(function(){
    $('#login-form-box').hide();
    $('#reg-form-box').show();
  });

  $('#showloginform').click(function(){
    $('#reg-form-box').hide();
    $('#login-form-box').show();
  });

  $('#showforgetform').click(function(){
    $('#reg-form-box').hide();
    $('#forget-form-box').show();
  });

  $('#showloginform2').click(function(){
    $('#forget-form-box').hide();
    $('#login-form-box').show();
  });


  $('#showforgetpassword').click(function(){
    $('#login-form-box').hide();
    $('#forget-form-box').show();
  });



  $('#signup').click(function(e){
    if ($('#reg-form')[0].checkValidity()) {
      e.preventDefault();
      // $('#signup').val('Loading...').attr('disabled',true);
      nameCheck();
      userNameCheck();
      regEmailCheck();
      regPasswordCheck();
      conPasswordCheck();
      if ( $('#regPassword').val() !== '' &&  $('#conPassword').val() !== '' ) {
        var userNameLength = $('#userName').val().length;
        if (userNameLength>5) {
          if (userNameLength<21) {
            var regEmail = $('#regEmail').val();
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (regex.test(regEmail)) {
              var regPasswordLength = $('#regPassword').val().length;
              if (regPasswordLength>5 && regPasswordLength<21) {
                if ( $('#regPassword').val() === $('#conPassword').val() ) {
                  if ( $('#userName').val() !== '' &&  $('#regEmail').val() !== '') {
                    // console.log('working...');
                    $.ajax({
                      url : site_url+'admin/action.php',
                      method :  'post',
                      data : $('#reg-form').serialize()+'&action=register',
                      success: function(response){
                        if (response) {
                          $('#signup').val('Loading...').attr('disabled',true);
                          setTimeout(function(){
                            $('#signup').val('Signup').attr('disabled',false);
                          },100);
                          $('#reg-msg-show').html(response);
                        }
                      }
                    });
                  }
                }
              }else {
                regPasswordCheck();
              }
            }else {
              regEmailCheck();
            }

          }else {
            userNameCheck();
          }
        }else {
          userNameCheck();
        }

      }


    }
  });


  $('#login').click(function(e){
    if ($('#login-form')[0].checkValidity()) {
      e.preventDefault();
      // $('#signup').val('Loading...').attr('disabled',true);
      loginEmailCheck();
      loginPasswordCheck();
      if ( $('#loginEmail').val() !== '' &&  $('#password').val() !== '' ) {
        var loginEmail = $('#loginEmail').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (regex.test(loginEmail)) {
          var passwordLength = $('#password').val().length;
          if (passwordLength>5 && passwordLength<16) {
            $.ajax({
              url : site_url+'admin/action.php',
              method :  'post',
              data : $('#login-form').serialize()+'&action=login',
              success: function(response){
                if (response=="ok") {
                  window.location = "index.php";
                }else {
                  $('#login').val('Loading...').attr('disabled',true);
                  setTimeout(function(){
                    $('#login').val('Signin').attr('disabled',false);
                  },100);
                  $('#login-msg-show').html(response);
                }
              }
            });
          }else {
            loginPasswordCheck();
          }
        }else {
          loginEmailCheck();
        }

      }


    }
  });

  $('#forgetPassword').click(function(e){
    if ($('#forget-form')[0].checkValidity()) {
      e.preventDefault();
      // $('#signup').val('Loading...').attr('disabled',true);
      forgetEmailCheck();
      if ( $('#forgetEmail').val() !== '') {
        var forgetEmail = $('#forgetEmail').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (regex.test(forgetEmail)) {
          $.ajax({
              url : site_url+'admin/action.php',
              method :  'post',
              data : $('#forget-form').serialize()+'&action=forgetpass',
              success: function(response){
                $('#forgetPassword').val('Loading...').attr('disabled',true);
                setTimeout(function(){
                  $('#forgetPassword').val('Forget Password').attr('disabled',false);
                },200);
                $('#forget-msg-show').html(response);
              }
            });
        }else {
          forgetEmailCheck();
        }
      }
    }
  });

  $('#resetPassword').click(function(e){
    if ($('#reset-form')[0].checkValidity()) {
      e.preventDefault();
      resetPasswordCheck();
      resetConPasswordCheck();
      // $('#signup').val('Loading...').attr('disabled',true);
      if ( $('#reset_password').val() !== '' &&  $('#reset_cpassword').val() !== '' ) {
        var resetPasswordLength = $('#reset_password').val().length;
        if (resetPasswordLength>5 && resetPasswordLength<21) {
          if ( $('#reset_password').val() === $('#reset_cpassword').val() ) {
              $.ajax({
                url : site_url+'admin/action.php',
                method :  'post',
                data : $('#reset-form').serialize()+'&action=reset',
                success: function(response){
                  if (response) {
                    $('#resetPassword').val('Loading...').attr('disabled',true);
                    setTimeout(function(){
                      $('#resetPassword').val('Reset Password').attr('disabled',false);
                    },100);
                    $('#reset-msg-show').html(response);
                  }
                }
              });
          }else {
            resetPasswordCheck();
            resetConPasswordCheck();
          }
        }else {
          resetPasswordCheck();
        }
      }
    }
  });





  /* ==========================================================
          form jquery validation below
  =============================================================*/

  //first name check function defination
  function nameCheck(){
    var name = $('#name').val();
    var nameLength = name.length;
    if(name === ''){
      $('#name_notice').text('Name Field is Required');
      $('#name_notice').show();
      $('#name').removeClass('input_success');
      $('#name').addClass('input_errors');
    }else if (nameLength>3 && nameLength<50) {
      $('#name_notice').hide();
      $('#name').removeClass('input_errors');
      $('#name').addClass('input_success');
    }else {
      $('#name_notice').text('Name must be 4 to 50 character');
      $('#name_notice').show();
      $('#name').removeClass('input_success');
      $('#name').addClass('input_errors');
    }
  };



// User name check function defination
function userNameCheck(){
  var userName = $('#userName').val();
  var userNameLength = userName.length;
  if(userName === ''){
    $('#userName_notice').text('Username Field is Required');
    $('#userName_notice').show();
    $('#userName').removeClass('input_success');
    $('#userName').addClass('input_errors');
  }else if (userNameLength>3 && userNameLength<20) {
    $('#userName_notice').hide();
    $('#userName').removeClass('input_errors');
    $('#userName').addClass('input_success');
  }else {
    $('#userName_notice').text('Username must be 4 to 20 character');
    $('#userName_notice').show();
    $('#userName').removeClass('input_success');
    $('#userName').addClass('input_errors');
  }
};


//Email check function defination
function regEmailCheck(){
  var regEmail = $('#regEmail').val();
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  var regEmailLength = regEmail.length;
  if(regEmail === ''){
    $('#regEmail_notice').text('Email Field is Required');
    $('#regEmail_notice').show();
    $('#regEmail').removeClass('input_success');
    $('#regEmail').addClass('input_errors');
  }else {
    if(!regex.test(regEmail)){
      $('#regEmail_notice').text('Invalid Email Address');
      $('#regEmail_notice').show();
      $('#regEmail').removeClass('input_success');
      $('#regEmail').addClass('input_errors');
    }else {
      $('#regEmail_notice').hide();
      $('#regEmail').removeClass('input_errors');
      $('#regEmail').addClass('input_success');
    }
  }
}

// Reg Password Check check function defination
function regPasswordCheck(){
  var regPassword = $('#regPassword').val();
  var regPasswordLength = regPassword.length;
  if(regPassword === ''){
    $('#regPassword_notice').text('Password Field is Required');
    $('#regPassword_notice').show();
    $('#regPassword').removeClass('input_success');
    $('#regPassword').addClass('input_errors');
  }else if (regPasswordLength>5 && regPasswordLength<15) {
    $('#regPassword_notice').hide();
    $('#regPassword').removeClass('input_errors');
    $('#regPassword').addClass('input_success');
  }else if (regPasswordLength>15) {
    $('#regPassword_notice').text('Password Equal or Less than 15 character');
    $('#regPassword_notice').show();
    $('#regPassword').removeClass('input_success');
    $('#regPassword').addClass('input_errors');
  }else {
    $('#regPassword_notice').text('Password more than 5 character');
    $('#regPassword_notice').show();
    $('#regPassword').removeClass('input_success');
    $('#regPassword').addClass('input_errors');
  }
};


// Confirm password Check function defination
function conPasswordCheck(){
  var regPassword = $('#regPassword').val();
  var conPassword = $('#conPassword').val();
  var conPasswordLength = conPassword.length;
  if(conPassword === ''){
    $('#conPassword_notice').text('Confirm Password Field is Required');
    $('#conPassword_notice').show();
    $('#conPassword').removeClass('input_success');
    $('#conPassword').addClass('input_errors');
  }else {
    if (regPassword === conPassword) {
      $('#conPassword_notice').text('Confirm Password Match').addClass('cp_match');
      // $('#conPassword_notice').hide();
      $('#conPassword').removeClass('input_errors');
      $('#conPassword').addClass('input_success');
      setTimeout(function(){
        $('#conPassword_notice').hide();


      },2000);
    }else {
      $('#conPassword_notice').text('Confirm Password not Match').removeClass('cp_match');
      $('#conPassword_notice').show();
      $('#conPassword').removeClass('input_success');
      $('#conPassword').addClass('input_errors');
    }
  }
};

// login function definition
//Email check function defination
function loginEmailCheck(){
  var loginEmail = $('#loginEmail').val();
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  var loginEmailLength = loginEmail.length;
  if(loginEmail === ''){
    $('#loginEmail_notice').text('Email Field is Required');
    $('#loginEmail_notice').show();
    $('#loginEmail').removeClass('input_success');
    $('#loginEmail').addClass('input_errors');
  }else {
    if(!regex.test(loginEmail)){
      $('#loginEmail_notice').text('Invalid Email Address');
      $('#loginEmail_notice').show();
      $('#loginEmail').removeClass('input_success');
      $('#loginEmail').addClass('input_errors');
    }else {
      $('#loginEmail_notice').hide();
      $('#loginEmail').removeClass('input_errors');
      $('#loginEmail').addClass('input_success');
    }
  }
}

// Reg Password Check check function defination
function loginPasswordCheck(){
  var loginPassword = $('#password').val();
  var loginPasswordLength = loginPassword.length;
  if(loginPassword === ''){
    $('#password_notice').text('Password Field is Required');
    $('#password_notice').show();
    $('#password').removeClass('input_success');
    $('#password').addClass('input_errors');
  }else if (loginPasswordLength>5 && loginPasswordLength<21) {
    $('#password_notice').hide();
    $('#password').removeClass('input_errors');
    $('#password').addClass('input_success');
  }else if (loginPasswordLength>20) {
    $('#password_notice').text('Password Less than 20 character');
    $('#password_notice').show();
    $('#password').removeClass('input_success');
    $('#password').addClass('input_errors');
  }else {
    $('#password_notice').text('Password more than 5 character');
    $('#password_notice').show();
    $('#password').removeClass('input_success');
    $('#password').addClass('input_errors');
  }
}


//forget check function defination
function forgetEmailCheck(){
  var forgetEmail = $('#forgetEmail').val();
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

  if(forgetEmail === ''){
    $('#forgetEmail_notice').text('Email Field is Required');
    $('#forgetEmail_notice').show();
    $('#forgetEmail').removeClass('input_success');
    $('#forgetEmail').addClass('input_errors');
  }else {
    if(!regex.test(forgetEmail)){
      $('#forgetEmail_notice').text('Email Address Pattern not match write continue');
      $('#forgetEmail_notice').show();
      $('#forgetEmail').removeClass('input_success');
      $('#forgetEmail').addClass('input_errors');
    }else {
      $('#forgetEmail_notice').hide();
      $('#forgetEmail').removeClass('input_errors');
      $('#forgetEmail').addClass('input_success');
    }
  }
}



// Reset Password check function defination
function resetPasswordCheck(){
  var resetPassword = $('#reset_password').val();
  var resetPasswordLength = resetPassword.length;
  if(resetPassword === ''){
    $('#reset_password_notice').text('New Password Field is Required');
    $('#reset_password_notice').show();
    $('#reset_password').removeClass('input_success');
    $('#reset_password').addClass('input_errors');
  }else if (resetPasswordLength>5 && resetPasswordLength<15) {
    $('#reset_password_notice').hide();
    $('#reset_password').removeClass('input_errors');
    $('#reset_password').addClass('input_success');
  }else if (resetPasswordLength>15) {
    $('#reset_password_notice').text('Password Equal or Less than 15 character');
    $('#reset_password_notice').show();
    $('#reset_password').removeClass('input_success');
    $('#reset_password').addClass('input_errors');
  }else {
    $('#reset_password_notice').text('Password more than 5 character');
    $('#reset_password_notice').show();
    $('#reset_password').removeClass('input_success');
    $('#reset_password').addClass('input_errors');
  }
}


// reset Confirm password Check function defination
function resetConPasswordCheck(){
  var resetPassword = $('#reset_password').val();
  var resetConPassword = $('#reset_cpassword').val();
  var resetConPasswordLength = resetConPassword.length;
  if(resetConPassword === ''){
    $('#reset_cpassword_notice').text('Confirm Password Field is Required');
    $('#reset_cpassword_notice').show();
    $('#reset_cpassword').removeClass('input_success');
    $('#reset_cpassword').addClass('input_errors');
  }else {
    if (resetPassword === resetConPassword) {
      $('#reset_cpassword_notice').text('Confirm Password Match').addClass('cp_match');
      // $('#conPassword_notice').hide();
      $('#reset_cpassword').removeClass('input_errors');
      $('#reset_cpassword').addClass('input_success');
      setTimeout(function(){
        $('#reset_cpassword_notice').hide();


      },2000);
    }else {
      $('#reset_cpassword_notice').text('Confirm Password not Match').removeClass('cp_match');
      $('#reset_cpassword_notice').show();
      $('#reset_cpassword').removeClass('input_success');
      $('#reset_cpassword').addClass('input_errors');
    }
  }
}





// all function calling
  // signup form function calling
    // name check function call
    $('#name').keyup(function(){
      nameCheck();
    });
    $('#name').blur(function(){
      nameCheck();
    });

    $('#name').click(function(){
      nameCheck();
    });


    // userNameCheck function calling
    $('#userName').keyup(function(){
      userNameCheck();
    });
    $('#userName').blur(function(){
      userNameCheck();
    });

    $('#userName').click(function(){
      userNameCheck();
    });


    // Registrationn Email check function call
    $('#regEmail').keyup(function(){
      regEmailCheck();
    });
    $('#regEmail').blur(function(){
      regEmailCheck();
    });

    $('#regEmail').click(function(){
      regEmailCheck();
    });


    // Reg password check function call
    $('#regPassword').keyup(function(){
      regPasswordCheck();
    });
    $('#regPassword').blur(function(){
      regPasswordCheck();
    });

    $('#regPassword').click(function(){
      regPasswordCheck();
    });

    // confirmPassword check function call
    $('#conPassword').keyup(function(){
      conPasswordCheck();
    });
    $('#conPassword').blur(function(){
      conPasswordCheck();
    });

    $('#conPassword').click(function(){
      conPasswordCheck();
    });

  // login form function calling

  // Registrationn Email check function call
  $('#loginEmail').keyup(function(){
    loginEmailCheck();
  });
  $('#loginEmail').blur(function(){
    loginEmailCheck();
  });

  $('#loginEmail').click(function(){
    loginEmailCheck();
  });


  // Reg password check function call
  $('#password').keyup(function(){
    loginPasswordCheck();
  });
  $('#password').blur(function(){
    loginPasswordCheck();
  });

  $('#password').click(function(){
    loginPasswordCheck();
  });


  // forget Email check function call
  $('#forgetEmail').keyup(function(){
    forgetEmailCheck();
  });
  $('#forgetEmail').blur(function(){
    forgetEmailCheck();
  });

  $('#forgetEmail').click(function(){
    forgetEmailCheck();
  });


  // Reset password check function call
  $('#reset_password').keyup(function(){
    resetPasswordCheck();
  });
  $('#reset_password').blur(function(){
    resetPasswordCheck();
  });

  $('#reset_password').click(function(){
    resetPasswordCheck();
  });

  // resetConPassword check function call
  $('#reset_cpassword').keyup(function(){
    resetConPasswordCheck();
  });
  $('#reset_cpassword').blur(function(){
    resetConPasswordCheck();
  });

  $('#reset_cpassword').click(function(){
    resetConPasswordCheck();
  });








});
