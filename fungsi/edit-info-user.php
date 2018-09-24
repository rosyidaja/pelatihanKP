<?php 
session_start();
include '../config/koneksi.php';
$user_id=$_SESSION['m-id'];

  if (isset($_POST['edit-info'])) {
    $fnama = $_POST['fnama'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "UPDATE m_user SET user_fnama='$fnama', user_email='$email', user_pwd='$password' WHERE user_id = '$user_id'";

    if (mysqli_query($koneksi, $sql)) {
    // code...
    header("location:../user/marketing/index.php?halaman=akun-info&pesan=sukses-edit-acc");
  } else {
    // code...
    header("location:../user/marketing/index.php?halaman=akun-info&pesan=gagal-edit-acc");
  }
}

 ?>