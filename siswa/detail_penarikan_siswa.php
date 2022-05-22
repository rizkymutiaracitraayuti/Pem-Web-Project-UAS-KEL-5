<?php  
include("includers/header.php");
include("includers/navbar.php");
include ("../koneksi/koneksi.php");
?>

<div class="profil-page container-fluid">
	<div class="maincontent">
		<div class="container">
			<!-- Profil Siswa -->
			<?php
			$idtab = $_GET['id_tabungan'];  
			echo "<p style='margin-bottom:10px;'><a href='tabungan.php?id_tabungan=".$idtab."'>
			<svg class='bi bi-arrow-left' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
			<path fill-rule='evenodd' d='M5.854 4.646a.5.5 0 010 .708L3.207 8l2.647 2.646a.5.5 0 01-.708.708l-3-3a.5.5 0 010-.708l3-3a.5.5 0 01.708 0z' clip-rule='evenodd'/>
			<path fill-rule='evenodd' d='M2.5 8a.5.5 0 01.5-.5h10.5a.5.5 0 010 1H3a.5.5 0 01-.5-.5z' clip-rule='evenodd'/>
			</svg> Kembali</a></p>";
			?>
			
			<h4>Profil Siswa</h4><hr><br>
			<div class="row">
				<div class="container-fluid">
					<div class="table-responsive">
						<table class="table table-striped" style="background-color: #fff">
							<?php
							$idtab = $_GET['id_tabungan'];
							$sql = "SELECT A.nis, A.id_tabungan, A.saldo, B.nama_siswa FROM tabungan AS A INNER JOIN siswa AS B ON (A.nis = B.nis) WHERE A.id_tabungan = '$idtab'";
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
				</div>
			</div><br>
			<!-- Akhir Profil Siswa -->

			<!-- Riwayat Tabungan -->
			<h4>Riwayat Tabungan Siswa</h4><hr><br>

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
						$tab = mysqli_query($koneksi, "SELECT A.nis, A.saldo, B.nama_siswa FROM tabungan AS A INNER JOIN siswa AS B ON (A.nis = B.nis) WHERE A.id_tabungan = '$idtab'");
						$set = mysqli_query($koneksi, "SELECT * FROM penarikan WHERE id_tabungan = '$idtab'");
						for ($i=1; $i <= $page; $i++) { 
							echo '<a class="btn btn-info btn-md"  href="?id_tabungan='.$idtab.'&halaman='.$i.'">'.$i.'</a>';
							echo "&nbsp";
						}
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