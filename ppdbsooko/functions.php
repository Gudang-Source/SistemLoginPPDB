<?php
// koneksi ke database
$conn=mysqli_connect("localhost","root","","ppdbsooko");

function query($query){
	global $conn;
	$result=mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[]= $row;
	}
	return $rows;

}

function registrasi($data){
	global $conn;
	$nama = htmlspecialchars($data["namalengkap"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
	$agama = htmlspecialchars($data["agama"]);
	$sekolahasal = htmlspecialchars($data["sekolahasal"]);
	$email = htmlspecialchars($data["email"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek usename sudah ada atau belum
	$result = mysqli_query($conn, "SELECT email FROM siswa_pendaftar WHERE email = '$email'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>alert('email telah terdaftar')</script>";
		return false;
	}

	// cek konfirmasi password
	if($password !== $password2){
		echo "<script>alert('konfirmasi password tidak sesuai');</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	$query= "INSERT INTO siswa_pendaftar VALUES ('','$nama','$alamat','$jeniskelamin','$agama','$sekolahasal','$email','$password','Diproses')";
	mysqli_query($conn, $query);
    echo "<script>
				alert('User baru berhasil ditambahkan');
          </script>";
	return mysqli_affected_rows($conn);
}

?>