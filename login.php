<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.2/sweetalert2.all.min.js"></script></head>
<?php 
session_start();
        if(isset($_POST['Username'])){

                  include("connection.php");



	//รับค่า user & password mysqli_real_escape_string ช่วยป้องกันการ sql injection
        $Username = mysqli_real_escape_string($con, $_POST['Username']);
        $Password = mysqli_real_escape_string($con, md5($_POST['Password'])); 
		
		
		

                  $sql="SELECT * FROM hr_person Where HR_USERNAME='".$Username."' and HR_PASSWORD='".$Password."' ";

                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["UserID"] = $row["ID"];
                      $_SESSION["HR_USERNAME"] = $row["HR_FNAME"]." ".$row["HR_LNAME"];
                      $_SESSION["USER_TYPE"] = $row["USER_TYPE"];


                      if($_SESSION["USER_TYPE"]=="SUPER"){ 

                        Header("Location: admin_page.php");
                        

                      }

                      if($_SESSION["USER_TYPE"]=="ADMIN"){ 

                        Header("Location: admin_page.php");

                      }

                      if ($_SESSION["USER_TYPE"]=="USER"){ 

                        Header("Location: user_page.php");

                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
                    
                    

                  }

        }else{


             Header("Location: index.php"); 

        }
        
?>




