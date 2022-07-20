<?php
	$con = mysqli_connect("localhost","root","","arkatama");
	session_start();
	echo (mysqli_connect_errno())?"Koneksi database gagal : " . mysqli_connect_error():'';
?>