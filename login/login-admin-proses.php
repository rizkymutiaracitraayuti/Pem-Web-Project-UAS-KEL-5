<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../koneksi/koneksi.php';
 
// menangkap data yang dikirim dari form
$user_admin = $_POST['uadmin'];
$pass = md5($_POST['padmin']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where user_admin='$user_admin' and pass='$pass'");
 
// menghitung jumlah data yang ditemukan
if(mysqli_num_rows($data)>0){
	$row = mysqli_fetch_array($data);
	$_SESSION['user_admin'] = $row['user_admin'];
	$_SESSION['nama_admin'] = $row['nama_admin'];
	$_SESSION['idadmin'] = $row['id_admin'];
	$_SESSION['level'] = $row['level']=="Admin";
	$_SESSION['status'] = "login";
	echo "<script>alert('Selamat Datang $_SESSION[nama_admin]');</script>";
}else{
	header("location:login-admin.php?pesan=gagal");
}
?>
<meta http-equiv="refresh" content="0; url=../paneladmin/index.php">