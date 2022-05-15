<!doctype html>
<html lang="en">

<head>
  <div>
    <title>Menu</title>
    <meta charset="utf-8">
    <meta name="referrer" content="strict-origin" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">









    <style>
      @import 'https://fonts.googleapis.com/css?family=Kanit|Noto Serif Thai|Pridi|Taviraj|Maitree|Noto Serif Thai';
      /* @import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap'); */

      * {
        box-sizing: border-box;
      }


      /* width */
      ::-webkit-scrollbar {
        width: 10px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #888;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #555;
      }

      .wrapper .top_navbar .top_menu {
        width: 100%;
        height: 70px;
        background: linear-gradient(#1A3552, #405266);
        /*background: linear-gradient(-70deg, #fa7c30 50%, rgba(0, 0, 0, 0) 50%), url('images/A.jpg'); */
        /* background: linear-gradient(-70deg, #F79539  30%, rgba(0, 0, 0, 0) 70%), #52D2FB; */
        /* border-top-right-radius: 500px;
  border-top-left-radius: 500px; */
        display: flex;
        justify-content: space-between;
        align-items: left;
        font-family: 'Kanit', sans-serif;

      }

      @media screen and(max-width: 2160px) {
        .wrapper .top_navbar .top_menu {
          justify-content: center;
          flex-direction: column;
          width: 1000px;
          height: 20px;
          font-family: 'Kanit', sans-serif;


        }

      }

      .logo_t {
        color: #F9BC3A;
        /* margin: -11px;
    margin-top: 3px;
    margin-right: 890px;
    margin-left: -90px; */
        font-family: 'Kanit', sans-serif;
        position: -webkit-sticky;
        position: sticky;
        margin-top: 20px;
        margin-right: -650px;
        font-size: 65%;
        left: -80px;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;

      }

      @media (max-width: 979px) {
        .logo_t {
          display: none;
          font-family: 'Kanit', sans-serif;
        }
      }



      .user_m {
        color: #F9BC3A;
        position: relative;
        left: -20px;
        bottom: 5px;
        margin-top: 15px;
        font-size: 14px;
        font-family: 'Kanit', sans-serif;
      }

      .logo_m {
        font-size: 18px;
        color: #F9BC3A;
        font-family: 'Kanit', sans-serif;
      }

      @media screen and (min-width: 978px) {

        .user_m,
        .logo_m {
          visibility: hidden;
          font-family: 'Kanit', sans-serif;


        }
      }




      .buttonsil {
        color: #fff;
        position: relative;
        left: 0px;
        bottom: 6px;
        margin-top: 15px;
        font-family: 'Kanit', sans-serif;

      }

      @media screen and (min-width: 978px) {
        .buttonsil {
          visibility: hidden;
          font-family: 'Kanit', sans-serif;


        }
      }


      .wrapper .top_navbar .top_menu {
        color: #fff;
        font-weight: 500;
        font-size: 28px;
        font-family: 'Kanit', sans-serif;

      }




      .custom-toggler .navbar-toggler-icon {
        font-family: 'Kanit', sans-serif;
        border-color: rgb(58, 72, 31);
        margin-top: 10px;
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(58, 72, 31, 0.5)' stroke-width='3' stroke-linecap='round'  d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
      }



      #sidebar {
        font-family: 'Kanit', sans-serif;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 1020;
        height: 100vh;
        overflow: scroll;
        padding-top: 65px;

      }

      br {
        font-family: 'Kanit', sans-serif;
        display: block;
        content: "";
        margin-top: 44px;
      }

      .fa-edit {
        font-family: 'Kanit', sans-serif;
        color: white;
      }
    </style>
</head>
<?php

if (!$_SESSION["UserID"]) {
} else { ?>

  <body>
    <br>
    <div class="wrapper">
      <div class="top_navbar br">
        <div class="fixed-top">
          <div class="top_menu">
            <div>
              <div class="dropdown">
                <button type="button" class="buttonsil navbar-toggler" data-toggle="dropdown" style="font-size: 26px">☰




                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="home_user.php">หน้าหลัก</a>
                  <a class="dropdown-item" href="e_book_user.php">ระบบงานสารบรรณ</a>
                  <a class="dropdown-item" href="meeting_user.php">ระบบจองห้องประชุม</a>
                  <a class="dropdown-item" href="com_repair_user.php">แจ้งซ่อมคอมพิวเตอร์</a>
                  <a class="dropdown-item " style="color:red" href="index.php">ออกจากระบบ</a>
                </div>

              </div>



            </div>
            <div class="logo_t">HOSOFFICE | ระบบบริหารโรงพยาบาล</div>

            <div class="user_m">
              <a class="fas fa-user"> <?php echo $_SESSION['HR_USERNAME']; ?></a>
              <p class="logo_m">HOSOFFICE | ระบบบริหารโรงพยาบาล</p>

            </div>

            <div></div>



          </div>



        </div>


        <div class="d-flex align-items-stretch">
          <!-- <nav  id="sidebar" style="background-image: linear-gradient(#101748 , #101748)"> -->
          <nav id="sidebar" style="background-image:linear-gradient(#405266 ,#1A3552   )">
            <div class="custom-menu ">
            </div>
            <div class="img bg-wrap text-center py-4" style="background-image: url(images/n.png);">
              <div class="user-logo">
                <div class="img" style="background-image: url(images/admin.jpg);"></div>
                <?php echo $_SESSION['HR_USERNAME']; ?>
              </div>
            </div>
            <ul class="list-unstyled components mb-5">
              <li class="active">
                <a href="home_user.php"><span class="fa fa-home mr-3"></span>หน้าหลัก</a>
              </li>

              <li>
                <a href="e_book_user.php"><span class="fas fa-file mr-3"></span>ระบบสารบรรณ</a>
              </li>
              <li>
                <a href="meeting_user.php"><span class="fas fa-clipboard mr-3"></span>ระบบจองห้องประชุม</a>
              </li>
              <li>
                <a href="com_repair_user.php"><span class="fas fa-tools mr-3"></span>แจ้งซ่อมคอมพิวเตอร์</a>
              </li>
              <li>
                <a href="logout.php"><i class="fas fa-sign-out-alt  mr-3"></i>ออกจากระบบ</a>
              </li>

            </ul>
          </nav>


          <script src="js/jquery.min.js"></script>
          <script src="js/popper.js"></script>
          <script src="js/main.js"></script>
  </body>

</html>
<?php } ?>