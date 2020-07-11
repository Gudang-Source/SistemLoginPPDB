<?php 
// cek session
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
	exit;
}
require 'functions.php';

//data user
$email = $_SESSION["email"];
$result = mysqli_query($conn, "SELECT * FROM siswa_pendaftar WHERE email = '$email'");
$datauser = mysqli_fetch_assoc($result);
$nama = $datauser["nama"];
$alamat = $datauser["alamat"];
$jeniskelamin = $datauser["jeniskelamin"];
$agama = $datauser["agama"];
$sekolahasal = $datauser["sekolahasal"];
$statusdaftar = $datauser["statusdaftar"];


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
    <link rel="stylesheet" href="./assets/css/dbadmin.css">
    <title>Dashboard User | PPDB SMAN 1 SOOKO</title>
  </head>
  <body>
    <!-- navbar area -->
    <input type="checkbox" id="checkside">
    <nav class="navbar navbar-dark bg-primary sticky-top">
      <div class="container">
        <div class="leftnav">
          <img src="./assets/img/logosma.png" alt="logosma" width="30px">
          <a class="navbar-brand ml-3 text-uppercase"><strong>PPDB</strong> SMAN 1 Sooko</a>
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
          <img src="./assets/img/user.jpg" alt="user" width="100px" class="rounded-circle">
          <h6 class="my-2">Hello, <?=$nama;?></h6>
        </div>
        <li class="nav-item mb-1">
          <a class="nav-link active" href="index.php" title="Dashboard"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link" href="dbuser_siswa.php" title="Daftar Siswa"><i class="fas fa-graduation-cap"></i><span> Daftar Siswa</span></a>
        </li>
      </ul>
    </div>

    <!-- sidebar area end-->

    <!-- Content area -->
    <div class="content">
      <div class="container p-5 pt-5 position-relative">
        <h3><i class="fas fa-tachometer-alt"></i> Dashboard User</h3>
        <hr>
        <h4>Halo, Selamat datang di dashboard PPDB SMAN 1 Sooko</h4>
        <p>Berikut data yang telah kamu daftarkan :</p>
        <form class="form-gate p-4">
            <div class="text-center">
              <img src="./assets/img/logosma.png" alt="logo" width="100px">
              <h2 class="mt-2 font-weight-normal">Data Registrasi</h2>
            </div>
            <div class="form-group">
              <label for="namalengkap">Nama Lengkap</label>
              <input type="text" class="form-control" id="namalengkap" placeholder="Nama Lengkap" value="<?= $nama;?>" readonly>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea type="text" class="form-control" id="alamat" placeholder="Alamat"readonly><?= $alamat;?></textarea>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="jeniskelamin">Jenis Kelamin</label>
                  <input type="text" class="form-control" id="jeniskelamin" placeholder="Jenis Kelamin" value="<?= $jeniskelamin;?>" readonly>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="agama">Agama</label>
                  <input type="text" class="form-control" id="agama" placeholder="Nama Lengkap" value="<?= $agama;?>" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="sekolahasal">Sekolah Asal</label>
                <input type="text" class="form-control" id="sekolahasal" placeholder="sekolah asal" value="<?= $sekolahasal?>" readonly>
            </div>
            <div class="form-group">
                <label for="status">Status Daftar</label>
                <input type="text" class="form-control <?= ($statusdaftar=='Diterima')? "bg-success":"bg-warning" ?> text-white" id="status" placeholder="Status daftar" value="<?= $statusdaftar?>" readonly>
            </div>
        </form>
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