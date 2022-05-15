
<?php session_start();?>
<?php

if (!$_SESSION["UserID"]){  

	  Header("Location: index.php"); 

}else{?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin page</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<pre>
    <script LANGUAGE='JavaScript'>
    //window.alert('เข้าสู่ระบบ');
     session_destroy();
    </script>
    <?php   //print_r($_SESSION);
    echo '<script type="text/javascript">

    swal("เข้าสู่ระแบบแล้ว", " '.$_SESSION['HR_USERNAME'];?>", "success");
    </script>

    </pre>
<script>
  var delayInMilliseconds = 1500; //1 second =1000;

setTimeout(function() {
  //your code to be executed after 1 second
  window.location.href='home_user.php';
}, delayInMilliseconds);
</script>
</body>
</html>
<?php }?>

