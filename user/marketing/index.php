<?php
session_start();

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


if ($_SESSION['status']!="marketing") {
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

		<div class="sidenav text-center col-md-2">
			<div class="text-center">
				<img class="img-fluid" src="../../assets/image/logo.png" alt="Ebiz Infotama">
			</div>
			<div class="list-side">
			<ul class="nav nav-pills nav-stacked text-right" style="display:block;">
				<li><a href="index.php">Dashboard</a></li>
				<li><a href="?halaman=course-info">Data Registrasi</a></li>
				<li><a href="?halaman=akun-info">Pengaturan Akun</a></li>
				<li><a href="?halaman=logout">Logout</a></li>
			</ul>
			</div>
		</div>

		<div class="main col-sm-10">

			<?php

			include('../public/pesan.php');

			include($halaman); ?>

		</div>

	</body>
</html>
