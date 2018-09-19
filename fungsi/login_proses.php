<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include '../config/koneksi.php';

// $cek = mysqli_num_rows($data);
//
// if($cek > 0){
// 	$row_akun = mysqli_fetch_array($data);
// 	$_SESSION['username'] = $username;
// 	$_SESSION['status'] = "login";
// 	header("location:../user/admin/index.php");
// }else{
// 	header("location:../login.php?pesan=gagal");
// }

if (isset($_POST['login'])) {
	// code...
	// menangkap data yang dikirim dari form
	$username = $_POST['username'];
	$password = $_POST['password'];

	// menyeleksi data admin dengan username dan password yang sesuai
	$data = mysqli_query($koneksi,"select * from m_user where user_nama='$username' and user_pwd='$password'");

	if (mysqli_num_rows($data) == 0) {
		// code...
		header("location:../login.php?pesan=belum_login");

	} else {
		// code...
		$row = mysqli_fetch_assoc($data);
		if ($row['user_level'] == "1") {
			// code...
			$_SESSION['username']=$username;
			$_SESSION['status']="admin";
			echo '<script language="javascript">alert("Anda berhasil Login Admin!"); document.location="../user/admin/index.php";</script>';
		} else {
			// code...
			$_SESSION['username']=$username;
			$_SESSION['m-id']=$row['user_id'];
			$_SESSION['status']="marketing";
			echo '<script language="javascript">alert("Anda berhasil Login Marketing!"); document.location="../user/marketing/index.php";</script>';
		}
	}
}

?>
