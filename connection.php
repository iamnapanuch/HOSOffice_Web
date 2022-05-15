<?php
$con= mysqli_connect("localhost","root","","hos") or die("Error: " . mysqli_error($con));
//$con= mysqli_connect("192.168.2.13","sa","sa","hosoffice") or die("Error: " . mysqli_error($con));
mysqli_query($con, "SET NAMES 'utf8' ");
