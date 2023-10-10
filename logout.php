<?php 

  ob_start();

  session_start();


  session_destroy();

  ob_end_flush();
  go("index.php",0)
  



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