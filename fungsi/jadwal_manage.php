<?php
include '../config/koneksi.php';

//Fungsi Jadwal User Start
if (isset($_POST['add-jadwal'])) {
  // code...
  $sesi = $_POST['sesi'];
  $mulai = $_POST['mulai'];
  $selesai = $_POST['selesai'];

  $tambah = "INSERT INTO m_jadwal (jadwal_sesi, jadwal_mulai, jadwal_selesai) VALUES ('".$sesi."','".$mulai."','".$selesai."')";

  if (mysqli_query($koneksi, $tambah)) {
    // code...
    header("location:../user/admin/index.php?halaman=jadwal&pesan=sukses-aksi");
  } else {
    // code...
    header("location:../user/admin/index.php?halaman=jadwal&pesan=gagal-aksi");
  }
}

//Fungsi Tambah Jadwal End

//fungsi delete user start

if (isset($_POST['delete'])) {
  // code...
  $delete_id = $_POST['delete_id'];
  $delete ="DELETE FROM m_jadwal WHERE jadwal_id='$delete_id'";

  if (mysqli_query($koneksi, $delete)) {
    // code...
    header("location:../user/admin/index.php?halaman=jadwal&pesan=sukses-aksi");
  } else {
    // code...
    header("location:../user/admin/index.php?halaman=jadwal&pesan=gagal-aksi");
  }
}

//fungsi delete user end

//fungsi edit user end

if (isset($_POST['update-jadwal'])) {
  // code...

  $edit_jadwal_id = $_POST['edit_jadwal_id'];
  $sesi = $_POST['sesi'];
  $mulai = $_POST['mulai'];
  $selesai = $_POST['selesai'];

  $edit_user_id = $_POST['edit_user_id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  $tambah = "UPDATE m_jadwal SET jadwal_sesi='$sesi', jadwal_mulai='$mulai', jadwal_selesai='$selesai' WHERE jadwal_id='$edit_jadwal_id'";

  if (mysqli_query($koneksi, $tambah)) {
    // code...
    header("location:../user/admin/index.php?halaman=jadwal&pesan=sukses-aksi");
  } else {
    // code...
    header("location:../user/admin/index.php?halaman=jadwal&pesan=gagal-aksi");
  }
}

//fungsi edit user end

?>