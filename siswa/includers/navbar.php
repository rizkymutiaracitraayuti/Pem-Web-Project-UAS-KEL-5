<?php  
include '../koneksi/koneksi.php';
$nis = $_SESSION['nis'];

$data = mysqli_query($koneksi,"SELECT A.nis, A.id_tabungan, A.saldo, B.nis, B.nama_siswa, B.foto_siswa FROM tabungan AS A INNER JOIN siswa AS B ON (A.nis = B.nis) where B.nis='$nis'");
$query = mysqli_fetch_array($data);
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a href="index.php" class="logo"><b>SINA<span>BUNG</span></b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Halaman Utama</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tabungan.php?id_tabungan=<?php echo $query['id_tabungan']; ?>">Profil & Riwayat Tabungan</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img style="width: 30px; height: 30px; border-radius: 50px;" src="../paneladmin/<?= $query['foto_siswa'];  ?>">&nbsp;<?php echo $query['nama_siswa']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" onClick='return confirmSubmit()'>Keluar</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Alert Keluar -->
<script>
  function confirmSubmit()
  {
    var ya=confirm("Yakin akan keluar?");
    if (ya)
      window.location.href = "../logout.php";
    else
      return false ;
  }
</script>
<!-- Akhir Alert Keluar -->

