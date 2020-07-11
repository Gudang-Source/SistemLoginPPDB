<?php
require 'functions.php';
if(isset($_POST["register"])){
	if(registrasi($_POST)>0){
        header("Location: index.php");
        exit;
	}else{
		echo "<script>
				alert('Registrasi user gagal');
			</script>";
		echo mysqli_error($conn);
	}
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
    <link rel="stylesheet" href="../assets/css/gate.css">
    <title>Register Admin</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-primary justify-content-center align-items-center">
      <p class="text-center text-white h4"><span class="font-weight-bold">PPDB</span> SMAN 1 Sooko Mojokerto</p>
    </nav>
    <div class="gate mt-3">
      <form class="form-gate p-4" action="" method="post">
        <div class="text-center">
          <img src="../assets/img/logosma.png" alt="logo" width="100px">
          <h2 class="mt-2 font-weight-normal">Register Admin</h2>
        </div>
        <div class="form-group">
          <label for="inputnama">Nama lengkap</label>
          <input type="text" class="form-control" id="inputnama" placeholder="Nama Lengkap" name="nama" required>
        </div>
        <div class="form-row">
          <div class="form-group col-md-8 mb-3">
            <label for="inputusername">Username</label>
            <input type="text" class="form-control" id="inputusername" placeholder="Username.." name="username" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="jeniskelamin">Jenis Kelamin</label>
            <select class="custom-select" id="jeniskelamin" name="jeniskelamin" required>
              <option selected disabled value="">Pilih..</option>
              <option value="Laki-Laki">Laki-Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputemail">Email address</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
            </div>
            <input type="email" class="form-control" id="inputemail" placeholder="example@xxx.com" name="email" required>
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
        <div class="form-group">
          <label for="inputpassword2">Repeat Password</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" id="inputpassword2" placeholder="repeat password.." name="password2" required>
          </div>
        </div>
        <a href="loginadmin.php" class="text-decoration-none">Login?</a>
        <button type="submit" class="btn btn-block btn-primary mt-3" name="register">Register</button>
      </form>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>