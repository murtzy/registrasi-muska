<?php
include 'koneksi.php';

function testInput($data) {
  $data = htmlspecialchars($data);
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}
// Memeriksa apakah form sudah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") :
    // Mengambil data dari inputan form
    $nama = testInput($_POST['nama']);
    $nim = testInput($_POST['nim']);
    $prodi = testInput($_POST['prodi-selected']);
    $idProdi = testInput($_POST['prodiID']);
    $idDivisi = testInput($_POST['divisiID']);
    $divisi = testInput($_POST['divisi-selected']);
    $motto = testInput($_POST['motto']);

    mysqli_query($koneksi, "INSERT INTO muska.register (nama, nim, id_prodi, id_divisi, motivasi) VALUES ( '$nama', $nim, '$idProdi', '$idDivisi', '$motto')");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Selamat, Kamu Sudah Menjadi Anggota ✨</title>
  </head>
  <body>
    <!-- Menampilkan data dalam bentuk tabel -->
    <h1 class="title-hasil">Selamat, Kamu Sudah Menjadi Anggota ✨</h1>

    <div class="card">
      <div class="card-header">
        <h3>ukm muska</h3>
        <p>Lorem ipsum dolor</p>
      </div>

      <div class="card-body">
        <div class="nama-nim">
          <h4><?= $nama ?></h4>
          <h5><?= $nim ?></h5>
        </div>
        <div class="divisi-prodi">
          <h5><?= $prodi ?></h5>
          <h6><?= $divisi ?></h6>
          <!-- <p>
          Pengen jadi Ultramen
        </p> -->
        </div>
      </div>
    </div>

    <!-- motto -->

    <footer>
      <div class="motto-hasil">
        <p class="motto-teks"><?= $motto ?>.</p>
        <p class="motto-person">~ <?= $nama ?> ~</p>
      </div>

      <a href="register.php"><button class="back">Back</button></a>
    </footer>
  </body>
</html>
<?php
    else :
      echo "Tidak ada data yang diterima.";
endif;
?>
