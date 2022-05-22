<!DOCTYPE>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Selamat Datang di SINABUNG</title>

	<!-- Favicons -->
 	<link href="assets/img/icon/1.png" rel="icon">
 	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="swiper-4.4.1/dist/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/css.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<img src="assets/img/icon/1.png" style="width: 60px;"><a href="" class="logo"><b>SINA<span>BUNG</span></b></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<img src="assets/img/icon/logout.png" style="width: 20px;"><a class="nav-link" href="login.php" style="color: white; font-size: 20px; margin-left: 20px; margin-top: -35px;">Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- akhir navbar -->

	<!-- isi -->	
	<div class="landing container-fluid">
		<!-- header -->
		<div id="container">
			<div class="row">
				<div class="col-sm text">
					<h1>Website Tabungan</h1>
					<h1>Sederhana Untuk</h1>
					<h1>Siswa</h1>

					<div class="popup">
						<button type="button" class="btn-primary" onclick="contoh()">Selengkapnya</button>
					</div>

					<script type="text/javascript">

						function contoh() {

							swal({

								title: "Anda Harus Login Dulu!",


								icon: "error",

								button: true

							});

						}

					</script>
				</div>
				<div class="col-sm">
					<img class="sv" src="assets/img/icon/bg.png">
				</div>
			</div>
		</div>
		<!-- akhir header -->

		<!-- keunggulan -->
		<div class="container" style="margin-top: -50px;">
			<h3><b>Apa Keunggulan dari Website Ini?</b></h3>
			<p>Website ini punya beberapa keunggulan yang mungkin belum dimiliki website tabungan lainya.</p>
			<p>Apa saja keunggulan dari website ini? Diantaranya adalah sebagai berikut</p>
			<div class="row">
				<div class="col-sm-3">
					<img src="assets/img/icon/uang.png">
					<h5>Kemudahan Dalam </h5>
					<h5>Penarikan & Setoran</h5>
					<p>....</p>
				</div>
				<div class="col-sm-3">
					<img src="assets/img/icon/love.png" >
					<h5>Tampilan Yang</h5>
					<h5>Menarik</h5>
					<p>....</p>
				</div>
				<div class="col-sm-3">
					<img src="assets/img/icon/akun.png" >
					<h5>Kemudahan Dalam</h5>
					<h5>Mengakses Website</h5>
					<p>....</p>
				</div>
				<div class="col-sm-3">
					<img src="assets/img/icon/search.png" >
					<h5>Detail Informasi</h5>
					<h5>Tentang Tabungan</h5>
					<p>....</p>
				</div>
				<div class="popup">
					<button type="button" class="btn-primary" onclick="contoh()" style="margin-left: 450px;">Coba Fitur</button>
				</div>

				<script type="text/javascript">

					function contoh() {

						swal({

							title: "Anda Harus Login Dulu!",


							icon: "error",

							button: true

						});

					}

				</script>
			</div>
		</div>
		<!-- akhir kwunggulan -->

		<!-- contact -->
		<div id="container">
			<div class="row">
				<div class="col-sm text-2">
					<h5>Ajukan Pertanyaan</h5>
					<p>Apakah anda punya pertanyaan</p>
					<p>seputar website tabungan untuk siswa ini?</p>
					<input type="text" name="" id="nama" placeholder="Masukkan Nama">
					<input type="text" name="" id="email" placeholder="E-Mail"><br>
					<input type="text" name="" id="deskripsi" placeholder="Tulis Pertanyaan"><br>
					<div class="popup">
						<button type="button" class="btn-primary" onclick="contoh()">Ajukan Pertanyaan</button>
					</div>

					<script type="text/javascript">

						function contoh() {

							swal({

								title: "Anda Harus Login Dulu!",


								icon: "error",

								button: true

							});

						}

					</script>
				</div>
				<div class="col-sm">
					<img class="cnt" src="assets/img/icon/kontak.png">
				</div>
			</div>
		</div>
		<!-- akhir contact -->
	</div>
	<!-- akhir isi -->

	<!-- footer -->
	<footer>&copy; Copyright Kelompok 5</footer>
	<!-- akhir footer -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"

	integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"

	crossorigin="anonymous"></script>

</body>
</html>