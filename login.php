<?php
  include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Login</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center"> 
      <h1 class="text-center mt-4">Form Login</h1>
      <form method="POST">
        <div class="mb-3">
          <label for="inputUsername" class="form-label">Username</label>
          <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Masukan Username">
        </div>
        <div class="mb-3">
          <label for="inputPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Masukan Password">
        </div>
        <input name="login" type="submit" class="btn btn-primary" value="Login">
        <a href="register.php" type="button" class="btn btn-info text-white">Register</a>
      </form>
    </div>
  </section>

  <?php
    
    // Buat kondisi jika tombol data di klik
    if(isset($_POST['login'])){
      // Membuat variable setiap field inputan agar kodingan lebih rapi.
      $username = $_POST['username'];
      $password = md5($_POST['password']);

      // Membuat Query
      $query = "SELECT * FROM tb_user WHERE username = '".$username."' AND password = '".$password."'";

      $result = mysqli_query($koneksi, $query);

      if(mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION["status"] = "login";
        header("Location: index.php");
      } else {
        echo "<script>alert('Login Gagal!')</script>";
      }

    }    

  ?>

</body>
</html>