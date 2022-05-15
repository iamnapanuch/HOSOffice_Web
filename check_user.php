<?php
session_start() ;
if($_SESSION['USER_TYPE'] == 'USER')
{
 
}
if($_SESSION['USER_TYPE'] == 'SUPER') 

{

}
if($_SESSION['USER_TYPE'] == 'ADMIN') 

{

}
else{
  if($_SESSION['USER_TYPE'] == '')  
 	{
    Header("Location: index.php");
	  exit ;
 	}
}


?>


