<?php
$host     ="localhost";
$user     ="root";
$pass     ="";
$db       ="nilai_siswa";

$koneksi  = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
  die("Koneksi ke database gagal!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="../css/bootstrap
    .css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

  <title>Admin</title>
</head>
<body>
<div class="shadow p-1 mb-3 bg-white rounded">
<nav class="navbar bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../img/smapul.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
      SMK Sumatra 40
    </a>
  </div>
</nav>
</div>
</body>
</html>