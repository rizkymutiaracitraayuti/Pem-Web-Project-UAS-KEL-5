<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include '../koneksi/koneksi.php';
 
// menangkap data yang dikirim dari form
$user_siswa = $_POST['usiswa'];
$pass = $_POST['pssiswa'];
 
// menyeleksi data siswa dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from siswa where user_siswa='$user_siswa' and pass=MD5('$pass')");
 
// menghitung jumlah data yang ditemukan
if(mysqli_num_rows($data)>0){
	$row = mysqli_fetch_array($data);
	$_SESSION['user_siswa'] = $row['user_siswa'];
	$_SESSION['nama_siswa'] = $row['nama_siswa'];
	$_SESSION['nis'] = $row['nis'];
	$_SESSION['level'] = $row['level']=="Siswa";
	$_SESSION['status'] = "login";
	echo "<script>alert('Selamat Datang $_SESSION[nama_siswa]');</script>";
}else{
	header("location:login-siswa.php?pesan=gagal");
}
?>
<meta http-equiv="refresh" content="0; url=../siswa/index.php">