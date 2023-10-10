<?php 
	
	session_start();

	if(isset($_SESSION['loginredic']) && $_SESSION['loginredic'] == true) {
		$_SESSION['loginredic'] = false;
		go("/copy3",3);
	}else {

	}

	if(isset($_SESSION['verifyredic'] ) && $_SESSION['verifyredic'] == true) {
		$_SESSION['verifyredic'] = false;
		go("login",3);
	}if(isset($_SESSION['logoutred'] ) && $_SESSION['logoutred'] == true) {
		$_SESSION['logoutred'] = false;
		go("login",3);
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
	<title>Redirecting..</title>
</head>
<body>

	<div class="body">
		<span>

			<span></span>
			<span></span>
			<span></span>
			<span></span>

		</span>
		<div class="base">
			<span></span>
			<div class="face"></div>
		</div>

	</div>

	<div class="longfazers">
		<span></span>
		<span></span>
		<span></span>
		<span></span>
	</div>
	<h1>Redirecting...</h1>





	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Jomhuria&display=swap');



		body {
			background: linear-gradient(90deg, rgba(0,70,68,1) 0%, rgba(0,181,170,1) 53%, rgba(0,213,255,1) 100%);
			overflow: hidden;
		}

		h1 {
			position: absolute;
			font-family: 'Jomhuria';
			font-weight: 600;
			font-size: 30px;
			text-transform: uppercase;
			left: 50%;
			top: 55%;
			margin-left: -20px;
		}

		.body {
			position: absolute;
			top: 50%;
			margin-left: -50px;
			left: 50%;
			animation: speeder 1s linear infinite;

		}

		.body > span {
			height: 5px;
			width: 35px;
			background: #000;
			position: absolute;
			top: -19px;
			left: 60px;
			border-radius: 2px 10px 1px 0;

		}

		.base span {
			position: absolute;
			width: 0;
			height: 0;
			border-top: 6px solid transparent;
			border-right: 100px solid #000;
			border-bottom: 6px solid transparent;

		}

		.base span:before {
			content: '';
			height: 22px;
			width: 22px;
			border-radius: 50%;
			background: #000;
			position: absolute;
			right: -111px;
			top: -16px;
		}

		.base span:after {
			content: '';
			position: absolute;
			width: 0;
			height: 0;
			border-top: 0 solid transparent;
			border-right: 55px solid #000;
			border-bottom: 16px solid transparent;
			top: -16px;
			right: -98px;

		}

		.face {
			position: absolute;
			height: 12px;
			width: 20px;
			background: #000;
			border-radius: 20px 20px 0 0;
			transform: rotate(-40deg);
			right: -125px;
			top: -15px;
		}

		.face:after {
			content: '';
			height: 12px;
			width: 12px;
			background: #000;
			right: 4px;
			top: 7px;
			position: absolute;
			transform: rotate(40deg);
			transform-origin: 50% 50%;
			border-radius: 0 0 0 2px;

		}

		.body > span > span:nth-child(1),
		.body > span > span:nth-child(2),
		.body > span > span:nth-child(3),
		.body > span > span:nth-child(4), {
			width: 30px;
			height: 1px;
			background: #000;
			position: absolute;
			animation: fazer1 0.5s linear infinite;
		}

		.body > span > span:nth-child(2) {
			top: 3px;
			animation: fazer2 0.8s linear infinite;
		}

		.body > span > span:nth-child(3) {
			top: 1px;
			animation: fazer3 0.8s linear infinite;
			animation-delay: -2s;
		}

		.body > span > span:nth-child(4) {
			top: 4px;
			animation: fazer4 3s linear infinite;
			animation-delay: -2s;
		}


		@keyframes fazer1{
			0% {
				left: 0;
			}
			100% {
				left: -80px;
				opacity: 0;
			}
		}

		@keyframes fazer2{
			0% {
				left: 0;
			}
			100% {
				left: -100px;
				opacity: 0;
			}
		}

		@keyframes fazer3{
			0% {
				left: 0;
			}
			100% {
				left: -50px;
				opacity: 0;
			}
		}

		@keyframes fazer4{
			0% {
				left: 0;
			}
			100% {
				left: -150px;
				opacity: 0;
			}
		}

		@keyframes speeder{
			0% {
				transform: translate(2px, 1px) rotate(0deg);
			}10% {
				transform: translate(-1px, -3px) rotate(-1deg);
			}20% {
				transform: translate(-2px, 0px) rotate(1deg);
			}30% {
				transform: translate(1px, 2px) rotate(0deg);
			}40% {
				transform: translate(1px, -1px) rotate(1deg);
			}50% {
				transform: translate(-1px, 3px) rotate(-1deg);
			}60% {
				transform: translate(-1px, 1px) rotate(0deg);
			}70% {
				transform: translate(3px, 1px) rotate(-1deg);
			}80% {
				transform: translate(-2px, -1px) rotate(1deg);
			}90% {
				transform: translate(2px, 1px) rotate(0deg);
			}100% {
				transform: translate(1px, -2px) rotate(-1deg);
			}
		}

		.longfazers {
			position: absolute;
			width: 100%;
			height: 100%;

		}

		.longfazers span {
			position: absolute;
			height: 2px;
			width: 20%;
			background: #000;

		}

		.longfazers span:nth-child(1) {
			top: 20%;
			animation: longfazer1 1.5s linear infinite;
			animation-delay: -10s;
		}

		.longfazers span:nth-child(2) {
			top: 40%;
			animation: longfazer2 2.5s linear infinite;
			animation-delay: -2.5s;
		}

		.longfazers span:nth-child(3) {
			top: 60%;
			animation: longfazer3 1.5s linear infinite;
			
		}
		.longfazers span:nth-child(4) {
			top: 80%;
			animation: longfazer4 1.2s linear infinite;
			animation-delay: -6s;

			
		}

		@keyframes longfazer1{
			0% {
				left: 200%;
			}
			100% {
				left: -200%;
				opacity: 0;
			}
		}

		@keyframes longfazer2{
			0% {
				left: 200%;
			}
			100% {
				left: -200%;
				opacity: 0;
			}
		}


		@keyframes longfazer3{
				0% {
					left: 200%;
				}
				100% {
					left: -100%;
					opacity: 0;
				}
		}


		@keyframes longfazer4{
				0% {
					left: 200%;
				}
				100% {
					left: -100%;
					opacity: 0;
				}
		}


	</style>

</body>

</html>