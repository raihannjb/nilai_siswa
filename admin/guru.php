<?php
 $kode      ="";
 $nama      ="";
 $alamat    ="";
 $mapel     ="";

if(isset($_POST['submit'])){
  $kode     = $_POST['kode'];
  $nama     = $_POST['nama'];
  $alamat   = $_POST['alamat'];
  $mapel    = $_POST['mapel'];


}

?>





<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
  echo "<script>alert('Mff, untuk mengakses halaman ini anda harus login terlebih dahulu');document.location='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">


  <title>Pengolah Nilai Smapul</title>
</head>

<body>
  <div class="shadow p-1 mb-3 bg-white rounded">
    <nav class="navbar bg-white fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="../img/smapul.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
          SMK Sumatra 40
        </a>
        <a class="logout" style="margin-right:90px; text-decoration:none; color:black; font-size:20px; font-weight:300;" href="../logout.php">
          LOGOUT
        </a>
      </div>
    </nav>
  </div>
  <div class="sidebar">
    <header><?= $_SESSION['nama_lengkap'] ?></header>
    <ul>
      <li><a href="dashboard_admin.php">Dashboard</a></li>
      <li><a href="guru.php">Guru</a></li>
      <li><a href="siswa.php">Siswa</a></li>
      <li><a href="kelas.php">Kelas</a></li>
      <li><a href="mata_pelajaran.php">Mata Pelajaran</a></li>
    </ul>
  </div>
  <div class="content">
    <!-- untuk memasukkan dan mengedit data -->
    <div class="card">
      <div class="card-header">
        Tambah/Edit Guru
        <a style="margin-left:75%;" href="#" class="btn btn-danger">Edit Guru</a>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="mb-3 row">
            <label for="kode" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kode" nama="kode" value="<?php echo $kode ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
            </div>
          </div>

          <div class="mb-3 row">
            <label for="mapel" class="col-sm-2 col-form-label">Mapel</label>
            <div class="col-sm-10">
            <select class="form-control" id="mapel">
            <option value="">- Pilih Mapel -</option>
            <option value="ppl">PPL</option>
            <option value="pbo">PBO</option>
            </select>
            </div>
          </div>
          <div class="col-12">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-danger"/>
          </div>

        </form>
      </div>
    </div>

    <br><br>

    <!-- untuk mengeluarkan data -->
    <div class="card">
      <div class="card-header">
        Data Guru
      </div>
      <div class="card-body">
      
      </div>
    </div>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>

</html>