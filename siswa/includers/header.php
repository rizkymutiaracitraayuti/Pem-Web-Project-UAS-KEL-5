<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons -->
<link href="../assets/img/icon/1.png" rel="icon">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/css/style_siswa.css">
<link rel="stylesheet" type="text/css" href="../assets/css/navbar.css">

<title>SINABUNG - Sistem Informasi Tabungan</title>
</head>
<body>
	<!-- cek apakah sudah login -->
    <?php
    include ("../koneksi/koneksi.php"); 
    session_start();
    if($_SESSION['status']!="login"){
      header("location:../login/login-siswa.php?pesan=belum_login");
    }
    if($_SESSION['level']!="Siswa"){
      header("location:../login/login-siswa.php?pesan=belum_login");
    }
    ?>
	
