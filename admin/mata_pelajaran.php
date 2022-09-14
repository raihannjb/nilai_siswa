<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "nilai_siswa";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
  die("Tidak bisa terhubung ke database");
}

$kode_mapel             = "";
$nama_mapel             = "";
$error                  = "";
$sukses                 = "";


if (isset($_POST['simpan'])) {
  $kode_mapel           = $_POST['kode_mapel'];
  $nama_mapel           = $_POST['nama_mapel'];




  if ($kode_mapel && $nama_mapel) {
    $sql1 = "insert into mapel (kode_mapel,nama_mapel) values ('$kode_mapel', '$nama_mapel')";
    $q1   = mysqli_query($koneksi, $sql1);
    if ($q1) {
      $sukses     = "Berhasil memasukkan data";
    } else {
      $error      = "Gagal memasukkan data";
    }
  } else {
    $error = "Silahkan masukkan semua data!!";
  }
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
        Tambah Mata Pelajaran
      </div>
      <div class="card-body">
        <?php
        if ($error) {
        ?>
          <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
          </div>
        <?php
        }
        ?>



        <?php
        if ($sukses) {
        ?>
          <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
          </div>
        <?php
        }
        ?>

        <form action="" method="POST">
          <div class="mb-3 row">
            <label for="kode_mapel" class="col-sm-2 col-form-label">Kode Mata Pelajaran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" value="<?php echo $kode_mapel ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="nama_mapel" class="col-sm-2 col-form-label">Nama Mata Pelajaran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="<?php echo $nama_mapel ?>">
            </div>
          </div>


          <div class="col-12">
            <input type="submit" name="simpan" value="Simpan" class="btn btn-danger" />
          </div>

        </form>
      </div>
    </div>

    <br><br>

    <!-- untuk mengeluarkan data -->
    <div class="card">
      <div class="card-header">
        Data Mata Pelajaran
      </div>
      <div class="card-body">

      </div>
    </div>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>

</html>