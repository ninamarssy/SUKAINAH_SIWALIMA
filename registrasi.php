<?php
session_start();
require "private/conn.php";

if (isset($_POST['daftar'])) {
  $id = $_POST['id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm-password'];

  // Periksa apakah password dan konfirmasi password sama
  if ($password != $confirmPassword) {
    echo "Password tidak sama";
    exit();
  }


  $query = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
  $result = mysqli_query($koneksi, $query);

  if ($result) {
    header("Location: login.php");
  } else {
    echo "Error: " . mysqli_error($koneksi);
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi</title>
  <link rel="stylesheet" href="css/mdb.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container-xs">
    <div class="login-form px-5">
      <form action="" method="POST">
        <div class="text-center mb-4">
          <h5>Daftar</h5>
        </div>
        <!-- Name input -->
        <div class="form-outline mb-4">
          <input type="text" id="form5Example1" class="form-control" name="username" required />
          <label class="form-label" for="form5Example1">Username</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="form5Example2" class="form-control" name="password" required />
          <label class="form-label" for="form5Example2">Password</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="form5Example3" class="form-control" name="confirm-password" required />
          <label class="form-label" for="form5Example3">Confirm Password</label>
        </div>

        <!-- Checkbox -->
        <div class="form-check d-flex justify-content-center mb-4">
          <input class="form-check-input me-2" type="checkbox" value="" id="form5Example3" checked required />
          <label class="form-check-label" for="form5Example3">
            I have read and agree to the terms
          </label>
        </div>



        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4" name="daftar">Daftar</button>
      </form>

      <!-- Register -->
      <div class="text-center">
        <p>Sudah punya akun? <a href="login.php">Login</a></p>

      </div>
    </div>
  </div>

  <script src="js/mdb.min.js"></script>
</body>

</html>