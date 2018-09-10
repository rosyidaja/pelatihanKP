<?php
include '../config/koneksi.php';

//Fungsi Tambah User Start
if (isset($_POST['add-user'])) {
  // code...
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  $tambah = "INSERT INTO m_user (level_id, user_nama, user_pwd) VALUES ('".$level."', '".$username."', '".$password."')";

  if (mysqli_query($koneksi, $tambah)) {
    // code...
    header("location:../user/admin/index.php?halaman=user-manage&pesan=sukses");
  } else {
    // code...
    header("location:../user/admin/index.php?halaman=user-manage&pesan=gagal");
  }
}

//Fungsi Tambah User End

//fungsi delete user start

if (isset($_POST['delete'])) {
  // code...
  $delete_id = $_POST['delete_id'];
  $delete ="DELETE FROM m_user WHERE user_id='$delete_id'";

  if (mysqli_query($koneksi, $delete)) {
    // code...
    header("location:../user/admin/index.php?halaman=user-manage&pesan=sukses");
  } else {
    // code...
    header("location:../user/admin/index.php?halaman=user-manage&pesan=gagal");
  }
}

//fungsi delete user end

//fungsi edit user end

if (isset($_POST['update-user'])) {
  // code...
  $edit_user_id = $_POST['edit_user_id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  $tambah = "UPDATE m_user SET user_nama='$username', user_pwd='$password', user_level='$level' WHERE user_id='$edit_user_id'";

  if (mysqli_query($koneksi, $tambah)) {
    // code...
    header("location:../user/admin/index.php?halaman=user-manage&pesan=sukses");
  } else {
    // code...
    header("location:../user/admin/index.php?halaman=user-manage&pesan=gagal");
  }
}

//fungsi edit user end

?>
