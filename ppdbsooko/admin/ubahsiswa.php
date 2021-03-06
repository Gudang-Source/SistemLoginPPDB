<?php
// cek session
session_start();
if(!isset($_SESSION["loginadmin"])){
	header("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di url
$id=$_GET["idsiswa"];
$query = mysqli_query($conn,"SELECT * FROM siswa_pendaftar WHERE id=$id");
$ada = mysqli_num_rows($query);

if($ada<1){
	header("Location: dbadmin_siswa.php?ada=-1");
	exit;
}

// query data siswa berdasarkan id
$siswa=query("SELECT * FROM siswa_pendaftar WHERE id=$id")[0];

// cek apakah tombol sudah ditekan atau belum
if (isset($_POST["ubah"])) {

	// cek apakah data berhasil diubah
	if(ubah_siswa($_POST)>0){
		echo "
			<script>
				alert('Data berhasil diubah');
				document.location.href = 'dbadmin_siswa.php'
			</script>
		";
	}else{
		echo "
			<script>
				alert('Data gagal diubah');
				document.location.href = 'dbadmin_siswa.php'
			</script>
		";
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
    <title>Ubah Data Siswa</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-primary justify-content-center align-items-center">
      <p class="text-center text-white h4"><span class="font-weight-bold">PPDB</span> SMAN 1 Sooko Mojokerto</p>
    </nav>
    <div class="gate mt-3">
        <form class="form-gate p-4" action="" method="post">
            <div class="text-center">
            <img src="../assets/img/logosma.png" alt="logo" width="100px">
            <h2 class="mt-4 font-weight-normal">Ubah data Siswa</h2>
            </div>
            <input type="hidden" name="id" value="<?= $siswa["id"];?>">
            <div class="form-group">
              <label for="namalengkap">Nama Lengkap</label>
              <input type="text" class="form-control" id="namalengkap" placeholder="Nama Lengkap" name="nama" required autofocus value="<?= $siswa["nama"];?>">
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required><?= $siswa["alamat"];?></textarea>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                  <label for="jeniskelamin">Jenis Kelamin</label>
                  <select class="custom-select" id="jeniskelamin" name="jeniskelamin" required>
                    <option selected disabled value="">Pilih..</option>
                    <option value="Laki-Laki" <?= ($siswa["jeniskelamin"]=='Laki-Laki')? "selected":"" ?>>Laki-Laki</option>
                    <option value="Perempuan" <?= ($siswa["jeniskelamin"]=='Perempuan')? "selected":"" ?>>Perempuan</option>
                  </select>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="agama">Agama</label>
                  <select class="custom-select" id="agama" name="agama" required>
                    <option selected disabled value="">Pilih..</option>
                    <option value="Islam" <?= ($siswa["agama"]=='Islam')? "selected":"" ?>>Islam</option>
                    <option value="Kristen" <?= ($siswa["agama"]=='Kristen')? "selected":"" ?>>Kristen</option>
                    <option value="Katolik" <?= ($siswa["agama"]=='Katolik')? "selected":"" ?>>Katolik</option>
                    <option value="Konghucu" <?= ($siswa["agama"]=='Konghucu')? "selected":"" ?>>Konghucu</option>
                    <option value="Hindu" <?= ($siswa["agama"]=='Hindu')? "selected":"" ?>>Hindu</option>
                    <option value="Budha" <?= ($siswa["agama"]=='Budha')? "selected":"" ?>>Budha</option>
                  </select>
                </div>
            </div>
            <div class="form-group">
                <label for="sekolahasal">Sekolah Asal</label>
                <input type="text" class="form-control" id="sekolahasal" placeholder="sekolah asal" name="sekolahasal" required value="<?= $siswa["sekolahasal"]?>">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" placeholder="Status" name="status" required value="<?= $siswa["statusdaftar"]?>">
            </div>
            <button type="submit" class="btn btn-block btn-primary mt-3" name="ubah">Ubah Data</button>
        </form>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>