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
	$nama = htmlspecialchars($data["nama"]);
	$jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
	$username = strtolower(stripslashes($data["username"]));
	$email = htmlspecialchars($data["email"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek usename sudah ada atau belum
	$result = mysqli_query($conn, "SELECT email FROM useradmin WHERE email = '$email'");
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
	$query= "INSERT INTO useradmin VALUES ('','$nama','$jeniskelamin','$username','$email','$password')";
	mysqli_query($conn, $query);
    echo "<script>
				alert('User baru berhasil ditambahkan');
          </script>";
	return mysqli_affected_rows($conn);
}

function regis_siswa($data){
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
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

function ubah_admin($data){
	global $conn;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
	$username = htmlspecialchars($data["username"]);
	$email = htmlspecialchars($data["email"]);
	// query insert data
	$query = "UPDATE useradmin SET
				nama = '$nama',
				jeniskelamin = '$jeniskelamin',
				username = '$username',
				email = '$email'
				WHERE id=$id
				";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);

}


function ubah_siswa($data){
	global $conn;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
	$agama = htmlspecialchars($data["agama"]);
	$sekolahasal = htmlspecialchars($data["sekolahasal"]);
	$status = htmlspecialchars($data["status"]);
	// query insert data
	$query = "UPDATE siswa_pendaftar SET
				nama = '$nama',
				alamat = '$alamat',
				jeniskelamin = '$jeniskelamin',
				agama = '$agama',
				sekolahasal = '$sekolahasal',
				statusdaftar = '$status'
				WHERE id=$id
				";

	mysqli_query($conn,$query);
	return mysqli_affected_rows($conn);

}

function hapus_siswa($id){
	global $conn;
	$hd="DELETE FROM siswa_pendaftar WHERE id = $id";
	mysqli_query($conn, $hd);
	return mysqli_affected_rows($conn);
}

function hapus_admin($id){
	global $conn;
	$hd="DELETE FROM useradmin WHERE id = $id";
	mysqli_query($conn, $hd);
	return mysqli_affected_rows($conn);
}

?>