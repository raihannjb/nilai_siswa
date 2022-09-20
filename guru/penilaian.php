<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "nilai_siswa";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
  die("Tidak bisa terhubung ke database");
}

$kelas                   = "";
$mapel                   = "";
$tahun_ajaran            = "";
$semester                = "";
$error                   = "";
$sukses                  = "";



if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}

if (isset($_POST['selanjutnya'])) { // buat dan simpan data
  $kelas                   = $_POST['kelas'];
  $mapel                   = $_POST['mapel'];
  $tahun_ajaran            = $_POST['tahun_ajaran'];
  $semester                = $_POST['semester'];




  if ($kelas && $mapel && $tahun_ajaran && $semester) {
    if ($op == 'edit') { //update
      $sql1   = "update penilaian set kelas = '$kelas',mapel='$mapel',tahun_ajaran = '$tahun_ajaran',semester = '$semester' where id = '$id'";
      $q1     = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "Data berhasil diperbarui";
      } else {
        $error  = "Data gagal diupdate";
      }
    } else { //insert
      $sql1 = "insert into penilaian (kelas,mapel,tahun_ajaran,semester) values ('$kelas', '$mapel' ,'$tahun_ajaran', '$semester')";
      $q1   = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses     = "Berhasil memasukkan data";
      } else {
        $error      = "Gagal memasukkan data";
      }
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

$kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
$mapel = mysqli_query($koneksi, "SELECT * FROM mapel");
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
    <li><a href="dashboard_guru.php">Dashboard</a></li>
    <li><a href="penilaian.php">Penilaian</a></li>
    <li><a href="riwayat_nilai.php">Riwayat Nilai</a></li>
    </ul>
  </div>
  <div class="content">
    <!-- untuk memasukkan dan mengedit data -->
    <div class="card">
      <div class="card-header">
        Tambah Nilai
        <a style="margin-left:80%;"href="penilaian.php" class="btn btn-secondary">Kembali</a>
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
          <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
            <select class="form-control" name="kelas" id="kelas">
                <option value="">-- Pilih Kelas --</option>
                <?php
                while ($row = mysqli_fetch_array($kelas)) {
                ?>
                  <option value=""><?php echo $row["nama_kelas"] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>


          <div class="mb-3 row">
          <label for="mapel" class="col-sm-2 col-form-label">Pilih Mata Pelajaran</label>
            <div class="col-sm-10">
            <select class="form-control" name="mapel" id="mapel">
                <option value="">-- Pilih Mata Pelajaran --</option>
                <?php
                while ($row = mysqli_fetch_array($mapel)) {
                ?>
                  <option value=""><?php echo $row["nama_mapel"] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>


          <div class="mb-3 row">
            <label for="tahun_ajaran" class="col-sm-2 col-form-label">Tahun Ajaran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?php echo $tahun_ajaran ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="semester" name="semester" value="<?php echo $semester ?>">
            </div>
          </div>


          <div class="col-12">
          <input type="submit" name="selanjutnya" value="Selanjutnya" class="btn btn-danger" />
          </div>

        </form>
      </div>
    </div>

    <br><br>

    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>

</html>