<?php

$halaman = "";
if (!isset($_GET['halaman'])) {
	// code...
	$halaman = 'dashboard.php';
	$title = "Dashboard";
} else {
	// code...
	switch ($_GET['halaman']) {
		case 'akun-info':
			// code...
			$halaman = 'akun-info.php';
			$title = "Informasi Akun";
			break;

		case 'course-info':
			// code...
			$halaman = 'course-info.php';
			$title = "Informasi Training";
			break;

		case 'user-manage':
			// code...
			$halaman = 'user-manage.php';
			$title = "Tambah, Edit, Delete User";
			break;

		case 'akun-info':
			// code...
			$halaman = 'akun-info.php';
			$title = "My Account";
			break;

		case 'logout':
			// code...
			$halaman = 'logout.php';
			break;

		default:
			// code...
			$halaman = 'error.php';
			$title = "Error 404";
			break;
	}
}

session_start();
if ($_SESSION['status']!="admin") {
	header("location:../../login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta name="description" content="Form Registrasi Pendaftaran Training">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/fa_all.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/register.css">

    <!-- jQuery -->
    <script src="../../assets/js/jquery-3.3.1.min.js"></script>

    <!-- Java script -->
    <script src="../../assets/js/bootstrap.bundle.js"></script>
    <script src="../../assets/js/register.js"></script>

	</head>
	<body>

		<div class="sidenav text-center col-sm-2">
			<div class="text-center">
				<img class="img-fluid" src="../../assets/image/logo.png" alt="Ebiz Infotama">
			</div>
			<div class="list-side">
			<ul class="nav nav-pills nav-stacked text-right" style="display:block;">
				<li class="active"><a href="index.php">Dashboard</a></li>
				<li><a href="?halaman=user-manage">Manage User</a></li>
				<li><a href="?halaman=course-info">Data Registrasi</a></li>
				<li><a href="?halaman=akun-info">Pengaturan Akun</a></li>
				<li><a href="?halaman=logout">Logout</a></li>
			</ul>
			</div>
		</div>

		<div class="main col-sm-10">

			<?php
			if(isset($_GET['pesan'])){
			      if($_GET['pesan'] == "sukses"){
			        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>Aksi Berhasil!</strong></div>';
			    } else {
			    	// code...
						echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>Aksi Gagal!</strong></div>';
			    }
			}
			
			include($halaman);
			?>

		</div>

	</body>
</html>
