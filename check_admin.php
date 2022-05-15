<?php
session_start();
if ($_SESSION['USER_TYPE'] == 'USER') {
	echo "<script>";
	echo "alert(\" This page for ADMIN only!\");";
	echo "window.history.go(-2);";
	echo "</script>";
	exit;
}
if ($_SESSION['USER_TYPE'] == 'SUPER') {
}
if ($_SESSION['USER_TYPE'] == 'ADMIN') {
} else {
	if ($_SESSION['USER_TYPE'] == '') {
		Header("Location: index.php");
		exit;
	}
}
