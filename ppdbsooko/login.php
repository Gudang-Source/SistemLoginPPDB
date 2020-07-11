<?php 
session_start();
require 'functions.php';

if (isset($_COOKIE['id'])&&isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil usename berdasarkan id
	$result = mysqli_query($conn, "SELECT email FROM siswa_pendaftar WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan email
	if($key === hash('sha256', $row['email'])){
		$_SESSION['login'] =true;
	}
}

if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}

if (isset($_POST["login"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM siswa_pendaftar WHERE email = '$email'");

	// cek email
	if (mysqli_num_rows($result)===1) {
		// cek password
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])){
			// set session
            $_SESSION["login"] = true;
            $_SESSION["email"] = $_POST["email"];
            
			// cek remember me
			if(isset($_POST['remember'])){
				// buat cookie
				setcookie('id',$row['id'],time()+60);
				setcookie('key', hash('sha256', $row['email']), time()+60);
			}
			header("Location: index.php");
			exit;
		}
	}
	$error = true;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/gate.css">
    <title>Login PPDB SMAN 1 Sooko</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-primary justify-content-center align-items-center">
      <p class="text-center text-white h4"><span class="font-weight-bold">PPDB</span> SMAN 1 Sooko Mojokerto</p>
    </nav>
    <div class="gate mt-3">
      <form class="form-gate p-4" action="" method="post">
        <div class="text-center">
          <img src="./assets/img/logosma.png" alt="logo" width="100px">
          <h2 class="mt-2 font-weight-normal">Please Signin</h2>
          <?php if(isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Email atau password salah !
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label for="inputemail">Email address</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
            </div>
            <input type="email" class="form-control" id="inputemail" placeholder="example@xxx.com" name="email" required autofocus>
          </div>
        </div>
        <div class="form-group">
          <label for="inputpassword">Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" id="inputpassword" placeholder="password.." name="password" required>
          </div>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="remember">
          <label class="custom-control-label" for="remember" name="remember" >Remember me</label>
        </div>
        <a href="register.php" class="text-decoration-none">Create Account?</a>
        <button type="submit" class="btn btn-block btn-primary mt-3" name="login">Sign in</button>
        <div class="footer mt-5 text-center">
        <small class="text-muted">Copyright &copy; 2020 | <a href="#" class="text-decoration-none">M. Auliya Mirzaq Romdloni</a></small>
        </div>
      </form>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>