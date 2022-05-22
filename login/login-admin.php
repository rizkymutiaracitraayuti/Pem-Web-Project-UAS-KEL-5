<!doctype html>
<html lang="en">
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
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">

	<title>Sistem Informasi Tabungan - Login Admin</title>
</head>
<body>
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "<script>alert('Login gagal! Username atau password salah!');</script>";
		}else if($_GET['pesan'] == "logout"){
			echo "<script>alert('Berhasil Logout!');</script>";
		}else if($_GET['pesan'] == "belum_login"){
			echo "<script>alert('Anda harus login untuk mengakses halaman Admin');</script>";
		}
	}
	?>
	<div class="container-fluid">
		<div class="maincontent">
			<div class="container" id="container">
				<div class="row">
					<div class="bg-putih col-sm-7">
						<h3 class="judul">Masuk admin</h3>
						<form action="login-admin-proses.php" method="post">
							<div class="form-group">
								<input type="text" class="fc form-control" name="uadmin" id="uadmin" placeholder="Username" autocomplete="off">
							</div>
							<div class="form-group">
								<input type="password" class="fc form-control" name="padmin" id="padmin" placeholder="Kata Sandi" autocomplete="off">
							</div>
							<button href="../paneladmin/index.php"  class="btn btn-primary btn-user btn-block" type="submit" value="LOGIN">Masuk</button>
						</form><br>
						<div class="text-center">
							<a href="#" data-toggle="modal" data-target="#lupa">Lupa Password?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>&copy; Copyright Kelompok 5</footer>

	<!--Modal Lupa-->
	<div id="lupa" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<center>
						<?php
						include '../koneksi/koneksi.php';
						$data = mysqli_query($koneksi,"SELECT * FROM admin");
						$query = mysqli_fetch_array($data);
						?>
						<h4 class="modal-title">Hubungi <?php echo $query['level']; ?></h4> 
					</center>
				</div>
				<div class="modal-body">
					<p><span><b>Email : </b><?php echo $query['email']; ?></span></p>
					<p><span><b>Telp : </b><?php echo $query['telepon']; ?></span></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<!--Akhir Modal Lupa-->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script type="text/javascript" src="../assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>