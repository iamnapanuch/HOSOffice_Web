<?php
include 'connection.php';
include 'check_user.php';
include 'menu.php';
include 'head.php';


?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="refresh" content="1800;url=logout.php" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CAROUSEL -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>
  <style>
    @import 'https://fonts.googleapis.com/css?family=Kanit|Noto Serif Thai|Pridi|Taviraj|Maitree|Noto Serif Thai';

    .a {
      font-family: 'Kanit', sans-serif;
      color: darkcyan;
      font-size: 25px;
      text-align: left;

    }

    @media (max-width: 979px) {
      .a {
        display: none;
      }
    }



    .a_m {
      font-family: 'Kanit', sans-serif;
      color: darkcyan;
      font-size: 15px;
    }

    @media screen and (min-width: 978px) {
      .a_m {
        visibility: hidden;


      }
    }

    p.text {
      font-family: 'Kanit', sans-serif;
      color: #1C5B59;

    }

    p.text2 {
      font-family: 'Kanit', sans-serif;
      color: #1C5B59;

    }

    a.text3 {
      font-family: 'Kanit', sans-serif;
      color: #1C5B59;

    }

    div.card {
      font-family: 'Kanit', sans-serif;
      background-color: #4DB1AD;
    }

    .bg-img {
      width: 100%;
      height: auto;
    }

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      /* this adds the "card" effect */
      padding: 16px;
      text-align: left;
      background-color: lightgreen;
    }

    /* Responsive columns - one column layout (vertical) on small screens */
    @media screen and (max-width: 600px) {
      .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
      }
    }

    div.card2 {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      /* this adds the "card" effect */
      padding: 16px;
      text-align: left;
      background-color: lightskyblue;
    }

    /* Responsive columns - one column layout (vertical) on small screens */
    @media screen and (max-width: 600px) {
      .column {
        width: 100%;
        display: block;
        margin-bottom: 20px;
      }
    }

    /* .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #474748;
   color: white;
   text-align: left;
} */

    .grid-container {
      display: grid;
      grid-template-columns: auto auto auto auto;
      gap: 5px;
      background-color: #474748;
      padding: 8px;
      color: #EFEEE5;
      font-family: 'Kanit', sans-serif;

      left: 0;
      bottom: 0;
      width: 100%;
    }

    @media (max-width: 979px) {
      .grid-container {
        display: none;
      }
    }

    .footer {
      display: grid;
      grid-template-columns: auto auto auto auto;
      gap: 5px;
      background-color: #474748;
      padding: 8px;
      color: #EFEEE5;
      font-family: 'Kanit', sans-serif;
      /* position: fixed; */
      left: 0;
      bottom: 0;
      width: 100%;
    }

    @media screen and (min-width: 978px) {
      .footer {
        visibility: hidden;


      }
    }

    .h6 {
      text-align: center;
    }

    .copyright {
      text-align: center;
      background-color: black;
      color: #EFEEE5;
      grid-template-columns: auto auto auto auto;
      gap: 5px;
      font-family: 'Kanit', sans-serif;
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
    }
  </style>
  <br>



</head>

<body>



  <p class="a">    ยินดีต้อนรับสู่ระบบบริหารโรงพยาบาล HOSOFFICE</p>

  <p class="a_m">    ยินดีต้อนรับสู่ระบบบริหารโรงพยาบาล HOSOFFICE</p>
  <div>
    <div class="container">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="images/hospital.jpg" alt="Los Angeles" style="width:100%;">
          </div>

          <div class="item">
            <img src="images/A.jpg" alt="Chicago" style="width:100%;">
          </div>


        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <br>
    <div class="card ">
      <div class="card-body">
        <p class="text">ระบบบริหารจัดการ HOSOFFICE</p>
        <p class="text2">
          Email : chumphonburi10915@gmail.com | Tell : 044-596-321, 044-596319 | Facebook Fanpage :
          <a class="text3" href="href=https://www.facebook.com/Helath2018"> โรงพยาบาลชุมพลบุรี</a>
        </p>
      </div>
    </div>

    <br>

    <div class="grid-container">

      <div>
        <p> Opening Hours</p>
        <h6><i class="fa fa-calendar-check-o"></i> Monday-Friday, 8.00-16.00 </h6>
        <h6><i class='fas fa-ambulance'></i></i> Emergency, 24 Hours, Tel.1669</h6>
      </div>
      <div>
        <p>Contact</p>
        <h6><i class="fas fa-envelope"></i> Email : chumphonburi10915@gmail.com</h6>
        <h6><i class="fas fa-phone"></i> Tel. : 044-596-321, 044-596319</h6>
        <h6><i class='fas fa-map-marker-alt'></i> Address : 175 ต.ชุมพลบุรี อ.ชุมพลบุรี จ.สุรินทร์ 32190</h6>
      </div>
      <div>
        <h6>© 2022 Copyright eiei</h6>
      </div>

    </div>
</body>

</html>