<?php 
// cek session
session_start();
if(!isset($_SESSION["loginadmin"])){
    header("Location: login.php");
	exit;
}
require 'functions.php';

//data user
$email = $_SESSION["email"];
$result = mysqli_query($conn, "SELECT * FROM useradmin WHERE email = '$email'");
$dataadmin = mysqli_fetch_assoc($result);
$username = $dataadmin["username"];

//data dashboard
$jumlahsiswa = count(query("SELECT * FROM siswa_pendaftar"));
$jumlahadmin = count(query("SELECT * FROM useradmin"));


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
    <link rel="stylesheet" href="../assets/css/dbadmin.css">
    <title>Dashboard Admin</title>
  </head>
  <body>
    <!-- navbar area -->
    <input type="checkbox" id="checkside">
    <nav class="navbar navbar-dark bg-primary sticky-top">
      <div class="container">
        <div class="leftnav">
          <img src="../assets/img/logosma.png" alt="logosma" width="30px">
          <a class="navbar-brand ml-3 text-uppercase">Admin <strong>PPDB</strong> SMAN 1 Sooko</a>
          <label for="checkside" id="sidebutton"><i class="fas fa-bars "></i></label>
        </div>
        <form class="form-inline">
          <button class="btn btn-danger my-2 my-sm-0" type="button" data-toggle="modal" data-target="#modal-logout">Logout</button>
        </form>
      </div>
    </nav>
    <!-- navbar area end-->

    <!-- sidebar area -->
    <div class="sidebar shadow-lg pt-3 position-fixed bg-light">
      <ul class="nav flex-column nav-pills p-3">
        <div class="user text-center">
          <img src="../assets/img/user.jpg" alt="user" width="100px" class="rounded-circle">
          <h6 class="my-2">Hello, <?= $username;?></h6>
        </div>
        <li class="nav-item mb-1">
          <a class="nav-link active" href="#" title="Dashboard"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link" href="dbadmin_siswa.php" title="Daftar Siswa"><i class="fas fa-graduation-cap"></i><span> Daftar Siswa</span></a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link" href="dbadmin_tambah_siswa.php" title="Tambah Siswa"><i class="fas fa-plus"></i><span> Tambah Siswa</span></a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link" href="dbadmin_admin.php" title="Daftar Admin"><i class="fas fa-user-cog"></i><span> Daftar Admin</span></a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link" href="dbadmin_tambah_admin.php" title="Tambah Admin"><i class="fas fa-user-plus"></i><span> Tambah Admin</span></a>
        </li>
      </ul>
    </div>

    <!-- sidebar area end-->

    <!-- Content area -->
    <div class="content">
      <div class="container p-5 pt-5 position-relative">
        <h3><i class="fas fa-tachometer-alt"></i> Dashboard</h3>
        <hr>
        <h2>Selamat datang admin !</h2>
        <p>Berikut data yang telah masuk pada sistem :</p>
        <div class="row p-1">
          <div class="col-md-4 m-3 card bg-warning position-relative shadow">  
            <div class="card-body text-white">
              <h3 class="card-title">Jumlah Siswa</h3>
              <hr>
              <p class="card-text"><span class="h1"><?= $jumlahsiswa;?></span> Orang</p>
              <a href="dbadmin_siswa.php" class="btn btn-primary">Lebih Lanjut</a>
            </div>
            <div class="icon position-absolute">
              <i class="fas fa-graduation-cap text-white display-4"></i>
            </div>
          </div>
          <div class="col-md-4 m-3 card bg-secondary position-relative shadow">
            <div class="card-body text-white">
              <h3 class="card-title">Jumlah Admin</h3>
              <hr>
              <p class="card-text"><span class="h1"><?= $jumlahadmin;?></span> Orang</p>
              <a href="dbadmin_admin.php" class="btn btn-primary">Lebih Lanjut</a>
            </div>
            <div class="icon position-absolute">
              <i class="fas fa-user-cog text-white display-4"></i>
            </div>
          </div>
        </div>
        <div class="footer bg-light mt-5">
          <p class="text-secondary text-center">Copyright &copy; 2020 | <a href="#" class="text-decoration-none"> M. Auliya Mirzaq Romdloni</a></p>
        </div>
      </div>
    </div>
    <!-- Content area end-->
    
    <!-- Modal -->
    <div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">Konfirmasi Logout</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah anda yakin ingin keluar ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a href="logout.php" class="btn btn-primary">Yes</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  </body>
</html>