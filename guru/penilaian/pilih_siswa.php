<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "nilai_siswa";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
  die("Tidak bisa terhubung ke database");
}

$nilai_kelas             = "";
$nilai_mapel             = "";
$tahun_ajaran            = "";
$semester                = "";
$error                   = "";
$sukses                  = "";


if (isset($_POST['simpan'])) {
  $nilai_kelas             = $_POST['nilai_kelas'];
  $nilai_mapel             = $_POST['nilai_mapel'];
  $tahun_ajaran            = $_POST['tahun_ajaran'];
  $semester                = $_POST['semester'];




  if ($kode && $nama && $alamat) {
    $sql1 = "insert into guru (kode,nama,alamat) values ('$kode', '$nama' ,'$alamat')";
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

  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">

  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">


  <title>Pengolah Nilai Smapul</title>
</head>

<body>
  <div class="shadow p-1 mb-3 bg-white rounded">
    <nav class="navbar bg-white fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="../../img/smapul.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
          SMK Sumatra 40
        </a>
        <a class="logout" style="margin-right:90px; text-decoration:none; color:black; font-size:20px; font-weight:300;" href="../../logout.php">
          LOGOUT
        </a>
      </div>
    </nav>
  </div>
  <div class="sidebar">
    <header><?= $_SESSION['nama_lengkap'] ?></header>
    <ul>
    <li><a href="../dashboard_guru.php">Dashboard</a></li>
    <li><a href="../penilaian.php">Penilaian</a></li>
    <li><a href="../riwayat_nilai.php">Riwayat Nilai</a></li>
    </ul>
  </div>
  <div class="content">
    <!-- untuk memasukkan dan mengedit data -->
    <div class="card">
      <div class="card-header">
        Tambah Nilai
        <a style="margin-left:80%;"href="../penilaian.php" class="btn btn-secondary">Kembali</a>
      </div>
      <div class="card-body">
      <table border="0" width="100%" style="padding-left: 2px; padding-right: 13px;">
          <tbody>
            <tr>
              <td width="45%" valign="top" class="textt">Nama Kelas</td>
                <td width="2%">:</td>
                <td></td>
            </tr>
          <tr>
              <td class="textt">Nama Mata Pelajaran</td>
                <td>:</td>
                <td></td>
            </tr>
          <tr>
              <td class="textt">Tahun Ajaran</td>
                <td>:</td>
                <td></td>
            </tr>
          <tr>
              <td class="textt">Semester</td>
                <td>:</td>
                <td></td>
            </tr>
          
        </tbody></table>
      </div>
    </div>

    <br><br>

    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>

</html>