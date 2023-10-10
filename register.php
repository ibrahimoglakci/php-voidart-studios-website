<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require_once ('connection/connection.php');


if(isset($_GET['void'])) {
  $void = mysql_real_escape_string(trim($_GET['void']));
}else {
  $void = "";
}


if(isset($_GET['error'])) {
  $error = mysql_real_escape_string(trim($_GET['error']));
}else {
  $error = "";
}


switch ($void) {
  case "":

  
  

  case '':
  if(isset($_SESSION['login'])) {
    if ($_SESSION["login"] == 5) {
      header("Location: index.php");

      exit();
    }
  }


  ?>


  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </head>
  <body>

  <div class="register-container">
      <form class="form-horizontal" id="validateForm" action="register.php?void=successregister" method="POST">
        <h1>Register</h1>
        <?php 



        if($error == "1") {

          echo '<div class="alert alert-danger" role="alert">Invaild Email! Please check again.</div>';

        } else if ($error == "2") {
          echo '<div class="alert alert-danger" role="alert">Username length cannot be less than 8 characters or bigger than 16 characters.</div>';
        } else if ($error == "3") {
          echo '<div class="alert alert-danger" role="alert">This user already registered our website! Please login with signin button</div>';
        }

        ?>
        <fieldset>
          <div class="form-group">
            <label for="username" class="col-md-12 control-label">
              <span>Username</span>
            </label>
            <div class="col-md-12">
              <input type="text" id="username" class="form-control input-md" name="username" autocomplete="off" placeholder="UserName"></input>
            </div>
            <div class="form-group">
              <label for="email" class="col-md-12 control-label">
                <span>Email</span>
              </label>
              <div class="col-md-12">
                <input type="email" id="email" class="form-control input-md" name="email" placeholder="Email"></input>
              </div>
              <div class="form-group">
                <label for="password" class="col-md-12 control-label">
                  <span>Password</span>
                </label>
                <div class="col-md-12">
                  <input type="password" id="password" name="password" class="form-control input-md" placeholder="Password"></input>
                  <span class="show-pass" onclick="toggle();"> 
                    <i class="far fa-eye" onclick="myFunction(this);"></i>
                  </span>
                  <div class="popover-password">
                    <p><span id="result"></span></p>
                    <div class="progress">
                      <div id="password-strength" class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>

                    </div>
                  </div>
                  <ul class="list-unstyled">
                    <li>
                      <span class="low-upper-case">
                        <i class="fas fa-circle" aria-hidden="true"></i> Lowercase &amp; Uppercase
                      </span>
                    </li>
                    <li>
                      <span class="one-number">
                        <i class="fas fa-circle" aria-hidden="true"></i> Number (0-9)
                      </span>
                    </li>
                    <li>
                      <span class="one-special-char">
                        <i class="fas fa-circle" aria-hidden="true"></i> Special character (!@#$^&*)
                      </span>
                    </li>
                    <li>
                      <span class="eight-character">
                        <i class="fas fa-circle" aria-hidden="true"></i> Atleast 8 character
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="form-group">
              <input disabled="true" type="submit" name="register" class="uncomp-login-btn" id="registerbtnn" value="Register" title="Please create your password in accordance with the rules.">
            </div>
            <div class="ex-account text-center">
              <p>Already have an account? Signin <a href="login">here</a></p>
            </div>
          </fieldset>
        </form>
    </div>
    

  </body>




  <script type="text/javascript">
      let state = false;
      let password = document.getElementById('password');
      let passwordStrength = document.getElementById('password-strength');
      let lowerUpperCase = document.querySelector('.low-upper-case i');
      let number = document.querySelector('.one-number i');
      let specialChar = document.querySelector('.one-special-char i');
      let eightChar = document.querySelector('.eight-character i');
      let registerbtn = document.getElementById('registerbtnn');


      function myFunction(show) {
        show.classList.toggle('fa-eye-slash');
      }



      function toggle() {
        if(state) {
          password.setAttribute("type", "password");
          state = false;
        }
        else {
          password.setAttribute("type", "text");
          state = true;
        }
      }


      password.addEventListener('keyup', function() {
        let pass = password.value;
        checkStrength(pass);

      })

      function checkStrength(password) {
        let strength = 0;

        if(password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
          strength +=1;
          lowerUpperCase.classList.remove('fa-circle');
          lowerUpperCase.classList.add('fa-check');
        }
        else {
          lowerUpperCase.classList.add('fa-circle');
          lowerUpperCase.classList.remove('fa-check');
        }


        if(password.match(/([0-9])/)) {
          strength +=1;
          number.classList.remove('fa-circle');
          number.classList.add('fa-check');

        }
        else {
          number.classList.add('fa-circle');
          number.classList.remove('fa-check');
        }


        if(password.match(/([!,%,&,@,#,$,^,*,?,_,~,-,£,/,+])/)) {
          strength += 1;
          specialChar.classList.remove('fa-circle');
          specialChar.classList.add('fa-check');
        }
        else {
          specialChar.classList.add('fa-circle');
          specialChar.classList.remove('fa-check');
        }




        if(password.length > 7) {

          strength +=1;
          eightChar.classList.remove('fa-circle');
          eightChar.classList.add('fa-check');

        } else {
          eightChar.classList.add('fa-circle');
          eightChar.classList.remove('fa-check');
        }


        if(strength == 0) {
          passwordStrength.style = 'width: 0%';
          document.getElementById('registerbtnn').disabled = true;
          registerbtn.classList.add('uncomp-login-btn');
          registerbtn.classList.remove('comp-login-btn');

        }
        else if(strength == 2) {
          passwordStrength.classList.remove('progress-bar-warning');
          passwordStrength.classList.remove('progress-bar-success');
          passwordStrength.classList.add('progress-bar-danger');
          passwordStrength.style = 'width: 10%';
          document.getElementById('registerbtnn').disabled = true;
          registerbtn.classList.add('uncomp-login-btn');
          registerbtn.classList.remove('comp-login-btn');
        }
        else if(strength == 3) {
          passwordStrength.classList.remove('progress-bar-danger');
          passwordStrength.classList.remove('progress-bar-success');
          passwordStrength.classList.add('progress-bar-warning');
          passwordStrength.style = 'width: 60%';
          document.getElementById('registerbtnn').disabled = true;
          registerbtn.classList.add('uncomp-login-btn');
          registerbtn.classList.remove('comp-login-btn');
        }
        else if(strength == 4) {
          passwordStrength.classList.remove('progress-bar-danger');
          passwordStrength.classList.remove('progress-bar-warning');
          passwordStrength.classList.add('progress-bar-success');
          passwordStrength.style = 'width: 100%';
          document.getElementById('registerbtnn').disabled = false;
          registerbtn.classList.remove('uncomp-login-btn');
          registerbtn.classList.add('comp-login-btn');


        }

      }

    </script>
  






  </html>





  <?php 

  break;


case 'successregister':
if(isset($_POST['register'])) {
  $username = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_POST['username']))));
  $email = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_POST['email']))));
  $password = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_POST['password']))));
  $password = md5($password);


}

if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

  if($username == "" OR $username == " " OR $username == "   " OR $password == "" OR $password == " " OR $password == "   ") {

    header("Location: register.php?error=1");
    exit();

  } else {

    if(strlen($username) < 8 OR strlen($username) > 16) {
      header("Location: register.php?error=2");
      exit();
    
    } else {

      $emailquery = mysql_query("SELECT * FROM user WHERE email='$email'");
      $finduser = mysql_num_rows($emailquery);
      if($finduser > 0) {
        header("Location: register.php?error=3");
        exit();
      } else {

        $mail = new PHPMailer(true);
        try {
          $mail -> SMTPDebug = 0;
          $mail -> isSMTP();
          $mail -> Host = 'smtp.gmail.com';
          $mail ->SMTPAuth = true;
          $mail ->Username = 'ibrahimoglkc@gmail.com';
          $mail ->Password = '36280426674i';
          $mail ->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
          $mail ->Port = 587;
          $mail ->setFrom('ibrahimoglkc@gmail.com', 'VoidArt.com');
          $mail ->addAddress($email, $username);
          $mail ->isHTML(true);
          $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0,6);
          $mail ->Subject = 'Email verification';

          $mail ->Body = '<p>Your verification code is: <b style="font-size: 30px;">'.$verification_code.' </b></p>';
          $mail->send();



          mysql_query("INSERT INTO user (email,password,username,role,token,verification_code,email_verified_at) VALUES ('".$email."','".$password."','".$username."','User', '0', '". $verification_code ."',NULL)");
          $_SESSION['verifyreq'] = true;

          go("verification.php?email=" . $email,0);
          exit();
        }catch(Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        

      }

    }




  }


}
break;


}


?>

<?php 

function go($url,$time=0) {
  if($time != 0) {
    header("Refresh:$time;url=$url");
  }else {
    header("Location: $url");
  } 
}


function sendMail($email, $username, $password) {
  $mail = new PHPMailer(true);
  try {
    $mail -> SMTPDebug = 0;
    $mail -> isSMTP();
    $mail -> Host = 'smtp.gmail.com';
    $mail ->SMTPAuth = true;
    $mail ->Username = 'ibrahimoglkc@gmail.com';
    $mail ->Password = '36280426674i';
    $mail ->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail ->Port = 587;
    $mail ->setFrom('ibrahimoglkc@gmail.com', 'VoidArt.com');
    $mail ->addAddress($email, $username);
    $mail ->isHTML(true);
    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0,6);
    $mail ->Subject = 'Email verification';

    $mail ->Body = '<p>Your verification code is: <b style="font-size: 30px;">'.$verification_code.' </b></p>';
    $mail->send();



    mysql_query("UPDATE user SET verification_code ='". $verification_code ."' WHERE email ='" .$email ."'");

    if($_SESSION['verifyreq'] == false) {
      $_SESSION['verifyreq'] = true;
    }else {
      return;
    }
    

  }catch(Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}





?>


