<?php 
// cek session
session_start();
if(!isset($_SESSION["loginadmin"])){
	header("Location: login.php");
	exit;
}
require 'functions.php';   

if(isset($_GET["idsiswa"])){
    $idsiswa = $_GET["idsiswa"];
    if(hapus_siswa($idsiswa)>0){
        echo "<script>
                alert('Data berhasil dihapus');
                document.location.href = 'index.php'
            </script>";
    }else{
        echo "<script>
                alert('Data gagal dihapus');
                document.location.href = 'index.php'
            </script>";
    }
}else if(isset($_GET["idadmin"])){
    $idadmin = $_GET["idadmin"];
    if(hapus_admin($idadmin)>0){
        echo "<script>
                alert('Data berhasil dihapus');
                document.location.href = 'index.php'
            </script>";
    }else{
        echo "<script>
                alert('Data gagal dihapus');
                document.location.href = 'index.php'
            </script>";
    }
}else{
    echo "<script>
            alert('Data gagal dihapus');
            document.location.href = 'index.php'
        </script>";
}

 ?>
