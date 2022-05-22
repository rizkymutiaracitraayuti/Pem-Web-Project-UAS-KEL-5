<?php  
include("includers/header.php");
include("includers/navbar.php");
include ("../koneksi/koneksi.php");
?>

<div class="profil-page container-fluid">
	<div class="maincontent">
		<div class="container">
			<!-- Profil Siswa -->
			<h4>Profil Siswa</h4><hr><br>
			<div class="row">
				<div class="table-responsive col">
					<table class="table table-striped" style="background-color: #fff">
						<?php
						$idtab = $_GET['id_tabungan'];
						$sql = "SELECT A.nis, A.saldo, B.nama_siswa FROM tabungan AS A INNER JOIN siswa AS B ON (A.nis = B.nis) WHERE A.id_tabungan = '$idtab'";
						$query = mysqli_query($koneksi, $sql);

						if(mysqli_num_rows($query) == 0){ //ini artinya jika data hasil query di atas kosong
							//jika data kosong, maka akan menampilkan row kosong
							echo '<tr><td colspan="2"><center>Tidak ada data!</center></td></tr>';
						}else{
							while ($data = mysqli_fetch_assoc($query)) {
								echo "<tr>";
								echo "<td><b>NIS</b></td>";
								echo "<td>".$data['nis']."</td>";
								echo "</tr>";
								echo "<tr>";
								echo "<td><b>Nama Siswa</b></td>";
								echo "<td>".$data['nama_siswa']."</td>";
								echo "</tr>";
								echo "<tr>";
								echo "<td><b>Saldo</b></td>";
								echo "<td>".$data['saldo']."</td>";
								echo "</tr>";
							}
						}
						?>
					</table>
				</div>
			</div><br>
			<!-- Akhir Profil Siswa -->

			<!-- Riwayat Tabungan -->
			<h4>Riwayat Tabungan Siswa</h4><hr><br>

			<!-- setoran -->
			<div class="row">
				<div class="container-fluid">
					<h5>Riwayat Setoran</h5>
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<tr>
								<th>No</th>
								<th>ID Tabungan</th>
								<th>ID Setoran</th>
								<th>Tanggal</th>
								<th>Setoran</th>
								<th>ID Petugas</th>
							</tr>
							<?php
							//Pagination
							$set = mysqli_query($koneksi,"SELECT * FROM setoran WHERE id_tabungan = '$idtab'");
							$banyak = mysqli_num_rows($set);

							$mulai = 0;
							$tujuan = 5;

							$page = ceil($banyak / $tujuan);

							if(isset($_GET['halaman'])) {
								$hal = $_GET['halaman'];
								$mulai = ($hal*$tujuan)-$tujuan;
							} else {
								$mulai = 0;
							}

							$idtab = $_GET['id_tabungan'];  
							$sql = "SELECT * FROM setoran WHERE id_tabungan = '$idtab' limit $mulai,$tujuan";
							$query = mysqli_query($koneksi, $sql);
							
							//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
							if(mysqli_num_rows($query) == 0){ //ini artinya jika data hasil query di atas kosong
								  //jika data kosong, maka akan menampilkan row kosong
								echo '<tr><td colspan="7"><center>Tidak ada data!</center></td></tr>';
							}else{
								$no = 1+$mulai;
								while ($data = mysqli_fetch_assoc($query)) {
									echo "<tr>";
									echo "<td>$no</td>";
									echo "<td>".$data['id_tabungan']."</td>";
									echo "<td>".$data['id_setoran']."</td>";
									echo "<td>".$data['tanggal']."</td>";
									echo "<td>".$data['setoran']."</td>";
									echo "<td>".$data['id_petugas']."</td>";
									echo "</tr>";
									$no++;
								}
							}
							?>
						</table>
					</div>

					<!-- Style Pagination -->
					<div style="float: right; margin-top: 20px; margin-bottom: 20px;">
						<?php
						$idtab = $_GET['id_tabungan'];
						echo '<a class="btn btn-primary btn-tambah"  href="detail_setoran_siswa.php?id_tabungan='.$idtab.'">Lihat Selengkapnya</a>';  
						?>
					</div>
					<!-- Akhir Style Pagination -->

				</div>

			</div><br>
			<!-- akhir setoran -->

			<!-- penarikan -->
			<div class="row">
				<div class="container-fluid">
					<h5>Riwayat Penarikan</h5>
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<tr>
								<th>No</th>
								<th>ID Tabungan</th>
								<th>ID Penarikan</th>
								<th>Tanggal</th>
								<th>Penarikan</th>
								<th>ID Petugas</th>
							</tr>
							<?php
							//Pagination
							$set = mysqli_query($koneksi,"SELECT * FROM penarikan WHERE id_tabungan = '$idtab'");
							$banyak = mysqli_num_rows($set);

							$mulai = 0;
							$tujuan = 5;

							$page = ceil($banyak / $tujuan);

							if(isset($_GET['halaman'])) {
								$hal = $_GET['halaman'];
								$mulai = ($hal*$tujuan)-$tujuan;
							} else {
								$mulai = 0;
							}

							$idtab = $_GET['id_tabungan'];  
							$sql = "SELECT * FROM penarikan WHERE id_tabungan = '$idtab' limit $mulai,$tujuan";
							$query = mysqli_query($koneksi, $sql);
							
							//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
							if(mysqli_num_rows($query) == 0){ //ini artinya jika data hasil query di atas kosong
								  //jika data kosong, maka akan menampilkan row kosong
								echo '<tr><td colspan="7"><center>Tidak ada data!</center></td></tr>';
							}else{
								$no = 1+$mulai;
								while ($data = mysqli_fetch_assoc($query)) {
									echo "<tr>";
									echo "<td>$no</td>";
									echo "<td>".$data['id_tabungan']."</td>";
									echo "<td>".$data['id_penarikan']."</td>";
									echo "<td>".$data['tanggal']."</td>";
									echo "<td>".$data['penarikan']."</td>";
									echo "<td>".$data['id_petugas']."</td>";
									echo "</tr>";
									$no++;
								}
							}
							?>
						</table>
					</div>

					<!-- Style Pagination -->
					<div style="float: right; margin-top: 20px; margin-bottom: 20px;">
						<?php
						$idtab = $_GET['id_tabungan'];
						echo '<a class="btn btn-primary btn-tambah"  href="detail_penarikan_siswa.php?id_tabungan='.$idtab.'">Lihat Selengkapnya</a>';  
						?>
					</div>
					<!-- Akhir Style Pagination -->
					
				</div>
			</div><br>
			<!-- akhir penarikan -->

			<!-- Akhir Riwayat Tabungan -->
		</div>
	</div>
</div>

<?php 
include("includers/script.php");
include("includers/footer.php");
?>