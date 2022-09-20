<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "nilai_siswa";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
  die("Tidak bisa terhubung ke database");
}

$kode_kelas             = "";
$nama_kelas             = "";
$error                  = "";
$sukses                 = "";


if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}
if ($op == 'delete') {
  $id_kelas           = $_GET['id_kelas'];
  $sql1         = "delete from kelas where id_kelas = '$id_kelas'";
  $q1           = mysqli_query($koneksi, $sql1);
  if ($q1) {
    $sukses = "Berhasil menghapus data";
  } else {
    $error  = "Gagal menghapus data";
  }
}
if ($op == 'edit') {
  $id_kelas           = $_GET['id_kelas'];
  $sql1         = "select * from kelas where id_kelas = '$id_kelas'";
  $q1           = mysqli_query($koneksi, $sql1);
  $r1           = mysqli_fetch_array($q1);
  $kode_kelas   = $r1['kode_kelas'];
  $nama_kelas   = $r1['nama_kelas'];

  if ($kode_kelas == '') {
    $error = "Data tidak ditemukan";
  }
}


if (isset($_POST['simpan'])) { //create
  $kode_kelas             = $_POST['kode_kelas'];
  $nama_kelas             = $_POST['nama_kelas'];
  $data                   = $_POST['id_guru'];





  if ($kode_kelas && $nama_kelas) {
    if ($op == 'edit') { //update
      $sql1   = "update kelas set kode_kelas = '$kode_kelas',nama_kelas='$nama_kelas', id_guru='$data' where id_kelas = '$id_kelas'";
      $q1     = mysqli_query($koneksi, $sql1);
      if ($q1) {
        $sukses = "Data berhasil diperbarui";
      } else {
        $error  = "Data gagal diupdate";
      }
    } else { //insert
      $sql1 = "insert into kelas (kode_kelas,nama_kelas,id_guru) values ('$kode_kelas', '$nama_kelas', '$data')";
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
        Tambah Kelas
        <a style="margin-left:80%;" href="kelas.php" class="btn btn-secondary">Kembali</a>
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
            <label for="kode_kelas" class="col-sm-2 col-form-label">Kode Kelas</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kode_kelas" name="kode_kelas" value="<?php echo $kode_kelas ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="nama_kelas" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?php echo $nama_kelas ?>">
            </div>
          </div>


          <div class="mb-3 row">
            <label for="id_guru" class="col-sm-2 col-form-label">Wali Kelas</label>
            <div class="col-sm-10">
              <select class="form-control" name="id_guru" id="id_guru">
                <option value="">-- Pilih Guru --</option>
                <?php
                 include "koneksi.php";
                 $query = mysqli_query($koneksi,"SELECT * FROM guru") or die (mysqli_error($koneksi));
                 while ($data = mysqli_fetch_array($query)){
                  echo "<option value=$data[id_guru]> $data[nama]</option>";
                 }


                ?>
              </select>
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
        Data Kelas
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kode Kelas</th>
              <th scope="col">Nama Kelas</th>
              <th scope="col">Wali Kelas</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql2   = "select * from kelas order by id_kelas desc";
            $q2     = mysqli_query($koneksi, $sql2);
            $urut   = 1;
            while ($r2 = mysqli_fetch_array($q2)) {
              $id_kelas                 = $r2['id_kelas'];
              $kode_kelas         = $r2['kode_kelas'];
              $nama_kelas         = $r2['nama_kelas'];

            ?>
              <tr>
                <th scope="row"><?php echo $urut++ ?></th>
                <td scope="row"><?php echo $kode_kelas ?></td>
                <td scope="row"><?php echo $nama_kelas ?></td>
                <td><?php
                 $query = mysqli_query($koneksi,"SELECT * FROM guru") or die (mysqli_error($koneksi));
                 while ($data = mysqli_fetch_array($query)){
                  echo "
                       $data[nama]";
                 }


                ?></td>

                <td scope="row">
                  <a href="kelas.php?op=edit&id_kelas=<?php echo $id_kelas ?>"><button type="button" class="btn btn-danger">Edit</button></a>
                  <a href="kelas.php?op=delete&id_kelas=<?php echo $id_kelas ?>" onclick="return confirm('Yakin mau hapus data?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>

        </table>
      </div>
    </div>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>

</html>