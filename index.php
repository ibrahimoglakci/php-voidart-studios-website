<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


require_once ('connection/connection.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>VoidArt Studios</title>
  <link rel="icon" href="assets/titleicon.png" type="image/x-icon"/>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
  crossorigin="anonymous" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
  crossorigin="anonymous">
  <link rel="stylesheet" href="./Style.css" />
  <link rel="stylesheet" href="./mobile-style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body> 

  <header>

    <div class="container-fluid p-0">


      <?php 

      if ($girissorgu == 1) {

        ?>
        <nav class="navbar navbar-expand-lg namobile" style="width: 100%; height: 13%; opacity: 0.8;">
          <a href="#" class="voidlogoa"><img src="assets/voidlogo.png" class="voidlogo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-align-right text-dark"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mr-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link" href="#">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#section-1">About</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#section-3">Downloads</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#pricing">Pricing</a>
            </li>
            <li class="nav-item">
             <a class="nav-link" href="#section-2">Projects</a>
           </li> 
           <li class="nav-item">
             <a class="nav-link" href="#faq">F.A.Q</a>
           </li> 
           <li class="nav-item dropdown">
            <div class="profile-content">
              <div class="dropdown">
                <a href="#" class="nav-link"><?php echo $u_username.''?> <i class="fas fa-sort-down downarrow"></i></a>
                <div class="dropdown-content">
                  <a href="#"><i class="fas fa-user" style="color: darkgray;"></i> Profile</a>
                  <a href="logout.php"><i class="fas fa-sign-out-alt" style="color: darkgray;"></i> Logout</a>
                </div>
              </div>

            </div>
          </li>
        </ul>
      </div>
    </nav>

    <?php

  } else {



    ?>

    <nav class="navbar navbar-expand-lg namobile" style="width: 100%; height: 11.6%; opacity: 0.8; ">

      <a href="#" class="voidlogoa"><img src="assets/voidlogo.png" class="voidlogo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
      aria-label="Toggle navigation">
      <i class="fas fa-align-right text-light"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="mr-auto"></div>
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" href="#">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#section-1">About</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#section-3">Downloads</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#pricing">Pricing</a>
        </li>
        <li class="nav-item">
         <a class="nav-link" href="#section-2">Projects</a>
       </li> 
       <li class="nav-item">
         <a class="nav-link" href="#faq">F.A.Q</a>
       </li> 
       <li class="nav-item">
         <a class="nav-link" href="login">Login</a>
       </li>
    </ul>
  </div>
</nav>

<?php 

}
?>
</div>




<div class="container text-center">
  <div class="row">
    <div class="col-md-7 col-sm-12  text-white">
      <h6>AUTHOR: VoidArt Studio</h6>
      <div class="typcont">
       <h1 class="typing"></h1>
     </div>
     <p>
      Try to collect the most points by putting the structures created in order on top of each other. At each high score, new structures will be waiting for you.
    </p>
    <a href="apps/towergame.txt" download="TowerGame.json"><button class="btn btn-light px-5 py-2 primary-btn">
      Download for free
    </button></a>
  </div>
  <div class="col-md-5 col-sm-12  h-25">
    <img src="assets/tower.png" class="towerb" alt="tower" />
  </div>
</div>
</div>
<!-- <div class="wrapper">
  <img src="assets/cookie.png" alt="">
  <div class="content">
    <header>Cookies Consent</header>
    <p>This website use cookies to ensure you get the best experience on our website.</p>
    <div class="buttons">
      <button class="item">I understand</button>
      <a href="#" class="item">Learn more</a>
    </div>
  </div>
</div> -->
</header>
<main>
  <section class="section-1" id="section-1">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="pray">
            <img src="assets/ss.jpg" alt="Pray" class="" />
          </div>
        </div>
        <div class="col-md-6 col-12">
          <div class="panel text-left">
            <h1>VoidArt Studio</h1>
            <p class="pt-4">
              Our founder has been successful in various businesses and pioneered many games. It provided all kinds of opportunities for the projects and supported the games and our other projects. One of the biggest reasons for our success is the success of our founder. We aim to step into bigger projects together.

            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi vitae, tenetur quidem eum aliquid vel labore sint placeat
              ad deserunt consectetur fugit ullam. Eius unde neque ducimus obcaecati ipsum quos vero totam recusandae hic
              expedita nemo sit, illum harum. Quisquam impedit ullam itaque facere et ad molestiae quod reprehenderit excepturi!
            </p>
          </div>
        </div>
      </div>
    </div>

  </section>

  <section class="section-3 container-fluid p-0 text-center" id="section-3">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <h1>Download Our App for all Platform</h1>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum exercitationem alias perspiciatis omnis quod possimus odit
          voluptatum! Sunt ea quasi praesentium, tenetur doloribus animi obcaecati, sint nemo quae laudantium iusto unde
          eaque nostrum nobis voluptatum
        </p>
      </div>
    </div>
    <div class="platform row">
      <div class="col-md-6 col-sm-12 text-right">
        <div class="desktop shadow-lg">
          <div class="d-flex flex-row justify-content-center">
            <i class="fas fa-desktop fa-3x py-2 pr-3"></i>
            <div class="text text-left">
              <h3 class="pt-1 m-0">Desktop</h3>
              <p class="p-0 m-0">For Windows/Linux/MacOS</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-12 text-left">
        <div class="desktop shadow-lg">
          <div class="d-flex flex-row justify-content-center">
            <i class="fas fa-mobile-alt fa-3x py-2 pr-3"></i>
            <div class="text text-left">
              <h3 class="pt-1 m-0">Mobile</h3>
              <p class="p-0 m-0">For Android/IOS</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="pricing" id="pricing">
    <h1 class="heading"> Our Pricing Plans </h1>
    <div class="box-container">


      <div class="box">
        <h3 class="title">Basic</h3>
        <div class="price">$20<span>/Monthly</span></div>
        <ul>
          <li><i class="fas fa-check"></i> 100+ downloads</li>
          <li><i class="fas fa-check"></i> No transaction fees</li>
          <li><i class="fas fa-times"></i> Unlimited storage</li>
          <li><i class="fas fa-times"></i> Live support</li>
        </ul>
        <a href="#pricing" class="btnn">Check out</a>
      </div>


      <div class="box">
        <h3 class="title">Standard</h3>
        <div class="price">$30<span>/Monthly</span></div>
        <ul>
          <li><i class="fas fa-check"></i> 100+ downloads</li>
          <li><i class="fas fa-check"></i> No transaction fees</li>
          <li><i class="fas fa-check"></i> Unlimited storage</li>
          <li><i class="fas fa-times"></i> Live support</li>
        </ul>
        <a href="#pricing" class="btnn">Check out</a>
      </div>

      <div class="box">
        <h3 class="title">Premium</h3>
        <div class="price">$50<span>/Monthly</span></div>
        <ul>
          <li><i class="fas fa-check"></i> 100+ downloads</li>
          <li><i class="fas fa-check"></i> No transaction fees</li>
          <li><i class="fas fa-check"></i> Unlimited storage</li>
          <li><i class="fas fa-check"></i> Live support</li>
        </ul>
        <a href="#pricing" class="btnn">Check out</a>
      </div>


    </div>
  </section>


  <section class="section-2 container-fluid p-0" id="section-2">
    <div class="cover">
      <div class="overlay"></div>
      <div class="content text-center">
        <h1>Some Features That Made Us Unique</h1>
        <p>
          All the projects we have done and succeeded so far and their statistics.
        </p>
      </div>
    </div>
    <div class="container-fluid text-center">
      <div class="numbers d-flex flex-md-row flex-wrap justify-content-center">
        <div class="rect">
          <h1>10</h1>
          <p>Total Projects</p>
        </div>
        <div class="rect">
          <h1>5</h1>
          <p>Award Projects</p>
        </div>
        <div class="rect">
          <h1>1056</h1>
          <p>Total Downloads</p>
        </div>
        <div class="rect">
          <h1>1000</h1>
          <p>New Projects</p>
        </div>
      </div>
    </div>



    <!-- Section 4 -->
    <section class="faq section-padding" id="faq">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title">
              <h2>FreQuently <span>Asked</span> Queries</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div id="accordion">
              <div class="accordion-item">
                <div class="accordion-header" data-toggle="collapse" data-target="#collapse-01">
                  <h3>Who are we?</h3>
                </div>
                <div class="collapse show" id="collapse-01" data-parent="#accordion">
                  <div class="accordion-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor</p>
                  </div>

                </div>
              </div>

              <div class="accordion-item">
                <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-02">
                  <h3>Why should you choose us?</h3>
                </div>
                <div class="collapse" id="collapse-02" data-parent="#accordion">
                  <div class="accordion-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor</p>
                  </div>

                </div>
              </div>


              <div class="accordion-item">
                <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-03">
                  <h3>Tired of ads in games. What should I do?</h3>
                </div>
                <div class="collapse" id="collapse-03" data-parent="#accordion">
                  <div class="accordion-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor</p>
                  </div>

                </div>
              </div>


              <div class="accordion-item">
                <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-04">
                  <h3>I want to be a sponsor. What should I do?</h3>
                </div>
                <div class="collapse" id="collapse-04" data-parent="#accordion">
                  <div class="accordion-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor</p>
                  </div>

                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <button id="topBtn"><i class="fas fa-chevron-up"></i></button>


  <footer class="footer-distributed">

    <div class="footer-left">
      <h3>VoidArt<span> Studios</span></h3>

      <p class="footer-links">
        <a href="#home">Home</a>
        |
        <a href="#section-1">About</a>
        |
        <a href="#section-2">Download</a>
        |
        <a href="#pricing">Pricing</a>
        |
        <a href="#section-2">Projects</a>
        |
        <a href="#faq">F.A.Q</a>
        
      </p>

      <p class="footer-company-name">Copyright © 2021 <strong>VoidArt Studios</strong> All rights reserved</p>
    </div>

    <div class="footer-center">
      <div>
        <i class="fa fa-map-marker"></i>
        <p><span>Bornova</span>
        Izmır</p>
      </div>

      <div>
        <i class="fa fa-phone"></i>
        <p>+850 9658745</p>
      </div>
      <div>
        <i class="fa fa-envelope"></i>
        <p><a href="https://mail.google.com/mail/u/0/#inbox?compose=GTvVlcSHwfGwDNPCKwJnLbsdwKKlfwLFBcFKglXLrkFDkBpZvBPgfDWkbrlMMFgtgBQpwhLdrzDGX" target="_blank">voidart@gmail.com</a></p>
      </div>
    </div>
    <div class="footer-right">
      <p class="footer-company-about">
        <span>About the company</span>
        <strong>Void Art</strong> is a Game Company where you can find more creative Game
        and
        Apps.
      </p>
      <div class="footer-icons">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-youtube"></i></a>
      </div>
    </div>
  </footer>



  <script>
    function myFunction() {
      var dropdownContent = document.querySelector('.dropdown-contentt');
      dropdownContent.classList.toggle('dropdown-toggle');
    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
  crossorigin="anonymous"></script>
  <script src="./main.js"></script>

</body>

</html>