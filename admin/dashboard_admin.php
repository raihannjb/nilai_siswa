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
  <div class="row">
  <div class="col-sm-9">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Selamat Datang, <b><?= $_SESSION['nama_lengkap'] ?></b>!</h5><br>
        <p class="card-text">Anda berhasil login dan memasuki halaman dashboard.<br><br></p>
      </div>
    </div>
  </div>
  </div>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>