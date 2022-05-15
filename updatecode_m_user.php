<?php
include ('connection.php');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['ID'];$HR_CID = $_POST['HR_CID'];$HR_PREFIX_ID = $_POST['HR_PREFIX_ID'];$HR_FNAME = $_POST['HR_FNAME'];$HR_LNAME = $_POST['HR_LNAME'];$HR_DEPARTMENT_ID = $_POST['HR_DEPARTMENT_ID'];


		
		
         $sql="UPDATE hr_person SET  HR_CID='$HR_CID',HR_PREFIX_ID='$HR_PREFIX_ID',HR_FNAME='$HR_FNAME', HR_LNAME='$HR_LNAME',HR_DEPARTMENT_ID='$HR_DEPARTMENT_ID'
         WHERE ID='$id'";
        //  $result = mysqli_query($con,$sql);
         $result = mysqli_query($con,$sql) or die("Error: " . mysqli_error($con));

        if($result)
        {
            // echo '<script> alert("Data Deleted"); </script>';
            //  header("Location:manager_user.php");

            // session_destroy();
              echo "<script>window.location='manager_user.php?act=success';</script>";

    



             
        }
        else
        {
            // echo '<script> alert("Data Not Updated"); </script>';
            //echo "<script>alert('แก้ไขไม่สำเร็จ');window.location='manager_user.php';</script>";
        }
    }
