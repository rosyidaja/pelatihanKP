<?php 
define('HOST', 'localhost');
define('USERNAME','root');
define('PASSWORD','');
define('DATABASE','db_schebiz');
$koneksi = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>