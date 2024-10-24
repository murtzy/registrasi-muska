<?php 
include 'koneksi.php';

function testInput($data) {
  $data = htmlspecialchars($data);
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Mengambil data dari inputan form
  $nama = testInput($_POST['nama']);
  $nim = testInput($_POST['nim']);
  $prodi = testInput($_POST['prodi-selected']);
  $divisi = testInput($_POST['divisi-selected']);
  $motto = testInput($_POST['motto']);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Register</title>
    <style></style>
  </head>
  <body>
    <h1 id="main-title">Registrasi MUSKA</h1>

    <div class="container">
      <form
        id="formInput"
        action="hasil.php"
        method="post"
        autocomplete="off"
        spellcheck="false">

        <!-- nama dan nim -->
        <div class="nama">
          <label for="nama">Nama Lengkap</label>
          <input
            type="text"
            name="nama"
            id="nama"
            placeholder="Masukkan Nama" />
        </div>

        <div class="nim">
          <label for="nim">NIM</label>
          <input
            type="text"
            inputmode="numeric"
            name="nim"
            id="nim"
            placeholder="Masukkan NIM"
            maxlength="15" />
        </div>

        <!-- prodi -->
        <div class="prodi">
          <label for="prodi">Program Studi</label>
          <button class="select-prodi">
            <span class="prodi-dipilih" value="" name="prodi">Pilih Program Studi</span>
            <span class="down"></span>
            <ul class="list-prodi">
              <?php 
                $getDataProdi = mysqli_query($koneksi, "SELECT * FROM prodi");
                while ($row = mysqli_fetch_array($getDataProdi)) :
                  echo "<li class='li-prodi' data-id=$row[id_prodi]>$row[nama_prodi]</li>";
                endwhile;
              ?>
            </ul>
          </button>
          <input type="hidden" name="prodi-selected" id="prodi-selected" value="">
          <input type="hidden" name="prodiID" id="prodiID">
        </div>

        <!-- divisi -->
        <div class="divisi">
          <label for="divisi">Divisi</label>
          <button class="select-divisi">
            <span class="divisi-dipilih" value="" name="divisi">Pilih Divisi</span>
            <span class="down"></span>
            <ul class="list-divisi">
            <?php 
                $getDataDivisi = mysqli_query($koneksi, "SELECT * FROM divisi");
                while ($row = mysqli_fetch_array($getDataDivisi)) :
                  echo "<li class='li-divisi' data-id=$row[id_divisi]>$row[nama_divisi]</li>";
                endwhile;
              ?>
            </ul>
          </button>
          <input type="hidden" name="divisi-selected" id="divisi-selected">
          <input type="hidden" name="divisiID" id="divisiID">
        </div>

        <!-- motto -->
        <div class="motto">
          <label for="motto"
            >Motivasi <br />
            <textarea name="motto" id="motto" cols="20" rows="2" placeholder="Cth. Ingin menguasai benua eropa"></textarea>
          </label>
        </div>

        <input type="submit" name="daftar" value="Daftar" />
      </form>
    </div>

    <?php 

    ?>

    <script src="main.js"></script>
  </body>
</html>
