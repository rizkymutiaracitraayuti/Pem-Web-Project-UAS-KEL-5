<?php  
	$databaseHost = 'localhost';
	$databaseName = 'sinabung';
	$databaseUsername = 'root';
	$databasePassword = '';

	$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

	if (!$koneksi) {
		die("Gagal tersambung dengan database : ".mysql_connect_error());
	}
?>