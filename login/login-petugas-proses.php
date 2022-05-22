<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../koneksi/koneksi.php';
 
// menangkap data yang dikirim dari form
$user_petugas = $_POST['upetugas'];
$pass = $_POST['pspetugas'];
 
// menyeleksi data petugas dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"SELECT * FROM petugas WHERE user_petugas='$user_petugas' AND pass='$pass'");
 
// menghitung jumlah data yang ditemukan
if(mysqli_num_rows($data)>0){
	$row = mysqli_fetch_array($data);
	$_SESSION['user_petugas'] = $row['user_petugas'];
	$_SESSION['nama_petugas'] = $row['nama_petugas'];
	$_SESSION['idpetugas'] = $row['id_petugas'];
	$_SESSION['level'] = $row['level']=="Petugas";
	$_SESSION['idstatus'] = $row['id_status']=="1";
	$_SESSION['status'] = "login";
	echo "<script>alert('Selamat Datang $_SESSION[nama_petugas]');</script>";
}else{
	header("location:login-petugas.php?pesan=gagal");
}
?>
<meta http-equiv="refresh" content="0; url=../panelpetugas/index.php">