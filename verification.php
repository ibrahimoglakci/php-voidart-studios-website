<?php 
session_start();


if(isset($_GET['error'])) {
  $error = mysql_real_escape_string(trim($_GET['error']));
}else {
  $error = "";
}

if(isset($_POST["verify_email"])) {
  if($_SESSION['verifyreq'] == true) {
    $email = $_POST['email'];
    $verification_code = $_POST['verification_code'];
    $conn = mysqli_connect('localhost','root','','voidart');

    $sql = "UPDATE user SET email_verified_at = NOW() WHERE email='".$email."' AND verification_code='".$verification_code."'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) == 0) {
      header("Location: verification.php?email=" . $email."");
      exit();
    }

    $_SESSION['verifyredic'] = true;
    $_SESSION['verifyreq'] = false;
    $_SESSION['email'] = $email;
    go("redirect",0);
    exit();
  }
  

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


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Verification Account</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
  crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
  crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>


  <div class="container">
    <form method="POST">

      <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
      <?php 

      if ($error == "1") {
        echo '<div class="alert alert-danger" role="alert">Incorrect verification Code!</div>';
      }else {

        

       ?>

       <?php 

       echo '<div class="alert alert-success" role="alert">A verification code has been sent to your email account.</div>';

     }


     ?>
     

     <div class="title">Verification Code</div>

     

     <div class="input-verifytext">
      <input type="text" placeholder="Enter Verification Code" name="verification_code" autocomplete="off" required>
    </div>
    <div class="input-box button">
      <input type="submit" name="verify_email" value="Verify">
    </div>


  </form>
</div>






<style type="text/css">

body {
  background: linear-gradient(90deg, rgba(0,70,68,1) 0%, rgba(0,181,170,1) 53%, rgba(0,213,255,1) 100%);
}

.container {
  background: #dddd;
  max-width: 350px;
  width: 100%;
  padding: 25px 30px;
  border-radius: 5px;
  position: relative;
  top: 150px;
  left: 0;
  border: rgba(26, 26, 26);
  border-style: solid;
  border-color: #f1f2f6;
  border-width: thin;

}


.container form .title {
  font-size: 30px;
  font-weight: 600;
  margin: 20px 0 10px 0;
  text-align: center;
}



.container form .title::before {
  content: '';
  position: absolute;
  height: 4px;
  width: 33px;
  bottom: 2px;
  left: 0;
  border-radius: 5px;
  background: #1da1f2;
}


.container form .input-verifytext {
  width: 100%;
  height: 45px;
  margin-top: 25px;
  position: relative;
}

.container form .input-verifytext input {
  height: 100%;
  width: 100%;
  outline: none;
  font-size: 16px;
  border: none;
  border-radius: 3px;
  background-color: #ecf0f1;

}

::placeholder {
  color: #7f8c8d;
}

.container form .button {
  margin: 40px 0 20px 0;

}

.container form .input-box input[type="submit"] {
  font-size: 20px;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  background: green;
  transition: all 0.3s ease;
  width: 100%;
  height: 50px;
}

.container form .input-box input[type="submit"]:hover {
 
  background: rgba(0, 0, 0, 0.15);
  
}

</style>

</body>


</html>



