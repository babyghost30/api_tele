<?php
	$username = "root";
	$database = "masterbot";
	$password = "";
	$server = "localhost";

	$con = mysqli_connect($server,$username,$password,$database) or die ("could not connect to mysql");

	// if(mysqli_connect_errno()){
	// 	echo "gagal konek";
	// }else
	// 	echo "koneksi sukses";
?>