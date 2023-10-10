<?php 
include_once("class/DB.php");
$DB = new DB();

session_start();


if(isset($_SESSION['login'])) {
	if($_SESSION['login'] == 5) {
		$id = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($_SESSION['ID']))));
		$userquery = $db->CallData("user","WHERE ID=? ",array($id));
		
		
		while($uyesonuc = $userquery) {
			$u_email = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['email']))));
			$u_role = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['role']))));
			$u_username = addslashes(strip_tags(mysql_real_escape_string(htmlspecialchars($uyesonuc['username']))));
			$girissorgu = 1;

		}
		

	} else {
		$girissorgu = 0;
	}
} else {
	$girissorgu = 0;
}

?>