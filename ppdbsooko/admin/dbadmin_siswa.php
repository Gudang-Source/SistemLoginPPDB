<?php
// cek session
session_start();
if(!isset($_SESSION["loginadmin"])){
	header("Location: login.php");
	exit;
}
require 'functions.php';

//query data
$pendaftar = query("SELECT * FROM siswa_pendaftar");

if(isset($_GET["ada"])){
	echo "<script>alert('Id yang diminta tidak ditemukan')</script>";
}

//data user
$email = $_SESSION["email"];
$result = mysqli_query($conn, "SELECT * FROM useradmin WHERE email = '$email'");
$dataadmin = mysqli_fetch_assoc($result);
$username = $dataadmin["username"];

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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
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
              <a class="nav-link" href="index.php" title="Dashboard"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a>
            </li>
            <li class="nav-item mb-1">
              <a class="nav-link active" href="#" title="Daftar Siswa"><i class="fas fa-graduation-cap"></i><span> Daftar Siswa</span></a>
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
    <div class="content mt-5 mb-5">
      <div class="container p-3">
        <h3><i class="fas fa-graduation-cap"></i> Daftar Siswa</h3>
        <hr>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pendaftar as $siswa): ?>
                <tr>
                    <td><?= $siswa["nama"];?></td>
                    <td><?= $siswa["alamat"];?></td>
                    <td><?= $siswa["jeniskelamin"];?></td>
                    <td><?= $siswa["agama"];?></td>
                    <td><?= $siswa["sekolahasal"];?></td>
                    <td><?= $siswa["statusdaftar"];?></td>
                    <td>
                      <a href="ubahsiswa.php?idsiswa=<?=$siswa["id"];?>" class="btn btn-warning">Ubah</a>
                      <a href="hapus.php?idsiswa=<?=$siswa["id"];?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ???')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollX": true
            });
        });
    </script>
  </body>
</html>