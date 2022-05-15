<?php session_start(); ?>
<?php include 'connection.php';

?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Hosoffice_Web</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <style>
    @import 'https://fonts.googleapis.com/css?family=Kanit|Noto Serif Thai|Pridi|Taviraj|Maitree|Noto Serif Thai';

    body {
      background: url(images/A.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      font-family: 'Kanit', sans-serif;

    }

    * {
      box-sizing: border-box;
    }

    div.card-body {
      color: #FFE5CC;
      text-align: center;
      font-family: 'Kanit', sans-serif;

    }


    .gradient-custom {
      /* fallback for old browsers */
      background: #6a11cb;
      font-family: 'Kanit', sans-serif;

      /* Chrome 10-25, Safari 5.1-6 */
      /* background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)); */

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(18, 38, 59, 0.5), rgba(18, 38, 59, 1))
    }
  </style>
</head>

<body>


  <form name="frmlogin" method="post" action="login.php">
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body">

                <div class="mb-md-5 mt-md-4 pb-5 ">

                  <i class='fa fa-lock' style='font-size:50px'></i>
                  <h4 class="fw-Courier New mb-2 text-uppercase">ระบบบริหารโรงพยาบาล</h4><br>
                  <h6 class="fw-Courier New mb-2 text-uppercase">เข้าสู่ระบบ</h6>
                  <br>
                  <div class="form-outline form-white mb-2">
                    <input type="username" id="Username" required name="Username" class="form-control form-control-lg" />

                    <label class="form-label" for="typeusernameX">Username</label>

                  </div>
                  <div class="form-outline form-white mb-2">
                    <input type="password" id="Password" required name="Password" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX">Password</label>
                  </div>

                  <button class="btn btn-outline-success btn-lg px-5" type="submit">Login</button>
                  &nbsp;&nbsp;
                  <button class="btn btn-outline-danger btn-lg px-5" type="reset">Cancel</button>
                </div>



              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>