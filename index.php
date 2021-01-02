<?php

  $nama = $_SESSION["nama"];

  if($_SESSION["status"] !== "login"){
    header("Location: login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Home</title>
</head>
<body>
  <h1>Selamat datang, <?= $nama ?></h1>
</body>
</html>