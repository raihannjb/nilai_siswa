<?php
session_start();
$host     = "localhost";
$user     = "root";
$pass     = "";
$db       = "nilai_siswa";

$koneksi  = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
  die("Koneksi ke database gagal!");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="css/bootstrap
    .css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">


  <title>Pengolah Nilai Smapul</title>
</head>

<body style="margin-top:40px;">
  <div class="shadow p-1 mb-3 bg-white rounded">
    <nav class="navbar bg-white fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="img/smapul.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
          SMK Sumatra 40
        </a>
      </div>
    </nav>
  </div>
  <div class="container">
    LOGIN <br>
    <img src="img/smapulbig.svg" alt="" width="253" height="255" class="logo">
  </div>
  <form action = "index.php" method = "post">
    <div class="form">
      <label style="font-weight:500;" for="exampleInputUsername1">Username:</label>
      <input type="text" class="form-control" name="Username" placeholder="Masukkan Username" required="">
    </div>
    <div style="margin-top:10px;" class="form">
      <label style="font-weight:500;" for="exampleInputPassword1">Password:</label>
      <input type="password" class="form-control" name="Pass" id="exampleInputPassword1" placeholder="Password" required="">
    </div>
    <label style="font-weight:500; margin-top:10px;" for="floatingSelectGrid">Pilih Role:</label>
    <div class="form-label-group">
    <select class="form-select" id="floatingSelectGrid" name="role">
        <option selected>--Pilih Role--</option>
        <option value="Admin">Admin</option>
        <option value="Pegawai">Pegawai</option>
      </select>
      </div>
    <div style="margin-top:10px; margin-left:18.3%;" class="position-absolute bottom-85 end-60">
      <button style="font-weight:500;" type="submit" name="login" value="Login" class="btn btn-danger">Log In</button>
    </div>
  </form>

  <?php
    if (isset($POST['login'])){
      $Username = $_POST['Username'];
    }
  
  
  ?>



  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>