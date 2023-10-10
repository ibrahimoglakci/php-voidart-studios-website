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
		<title>Login</title>
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
	    <form class="form-horizontal" id="validateForm" action="login.php?void=successlogin" method="POST">
	      <h1>Login</h1>
	      <?php 



				if($error == "1") {

					echo '<div class="alert alert-danger" role="alert">Invaild Email! Please check again.</div>';

				} else if ($error == "2") {
					echo '<div class="alert alert-danger" role="alert">Invaild Email or Password! Please check again.</div>';
				} else if ($error == "3") {
					echo '<div class="alert alert-danger" role="alert">Invaild email! Please check again</div>';
				} else if ($error == "4") {
					echo '<div class="alert alert-danger" role="alert">Invaild password! Please check again</div>';
				} 

				?>
	      <fieldset>
	          <div class="form-group">
	            <label for="email" class="col-md-12 control-label">
	              <span>Email</span>
	            </label>
	            <div class="col-md-12">
	              <input type="email" id="email" class="form-control input-md" name="email" placeholder="Email" required></input>
	            </div>
	            <div class="form-group">
	              <label for="password" class="col-md-12 control-label">
	                <span>Password</span>
	              </label>
	              <div class="col-md-12">
	                <input type="password" id="password" name="password" class="form-control input-md" placeholder="Password" required></input>
	                <span class="show-passl" onclick="toggle();"> 
	                  <i class="far fa-eye" onclick="myFunction(this);"></i>
	                </span>
	                
	            </div>
	          </div>

	          <div class="form-group">
	          	<input type="submit" name="login" class="login-btn" id="loginbtn" value="Login">
	          </div>
	          <div class="ex-account text-center">
	            <p>Do u not have an account? Signup <a href="register">here</a></p>
	          </div>
	        </fieldset>
	      </form>
    </div>
		

	</body>




	<script type="text/javascript">
      let state = false;
      let password = document.getElementById('password');



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



    </script>
	






	</html>





	<?php 

	break;





	case "successlogin":
	if(isset($_POST['login'])) {
		$email = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_POST['email']))));
		$password = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_POST['password']))));
		$password = md5($password);
		$username = mysql_query("SELECT `username` FROM `user` WHERE email = '.$email.'");
		$memail = mysql_query("SELECT `email` FROM `user` WHERE email = '.$email.'");
		$mpassword = mysql_query("SELECT `password` FROM `user` WHERE email = '.$email.'");


		if ($email == "" OR $password == "" OR $email == "	" OR $password == "	" OR $email == " " OR $password == " ") {

			header("Location: login.php?error=1");

			exit();

		} 


		else {
		/*$conn = mysqli_connect('localhost','root','','voidart');

		$sql = "UPDATE user SET email_verified_at = NOW() WHERE email='".$email."' AND verification_code='".$verification_code."'";

		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_object($result);*/


			if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$users = mysql_query("SELECT * FROM user WHERE email='$email' AND password='$password'");
				$finduser = mysql_num_rows($users);
				if($finduser > 0) {
					if($_SESSION['verifyreq'] == true) {
						echo '<script type="text/javascript">alert("Please verify your account");</script>';
						sendMail($email, $username, $password);
						go("verification.php?email=" . $email,2);
						
						
					}
					else {
						$query = mysql_query("SELECT * FROM user WHERE email='".$email."' AND password='$password'");
						while ($sonuc = mysql_fetch_array($query)) {
							session_regenerate_id(true);
							$_SESSION['ID'] = $sonuc['ID'];
							$_SESSION['login'] = 5;
							$_SESSION['LoginIP'] = $_SERVER['REMOTE_ADDR'];
							$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
							$_SESSION['loginredic'] = true;
							go("redirect",0);
							
							exit();

						}
					}
					

					

					

				} else {
					header("Location: login.php?error=2");
					exit();

				}

			} else {
				header("Location: login.php?error=1");
				exit();
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


