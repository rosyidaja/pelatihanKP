<?php

include '../config/koneksi.php';

if (isset($_POST['nama_instansi'])) {
  // code...
  $nama = $_POST['nama_instansi'];
  $email = $_POST['email_instansi'];
  $alamat = $_POST['alamat_instansi'];
  $telp = $_POST['nomer_instansi'];
  $course = $_POST['nama_marketing'];
  $detail = $_POST['detail'];

  echo "<span class='success'>Dengan <b>METODE POST</b></span><br/>";
  echo "user  	: ".$nama."
  <br/>email  	: ".$email."
  <br/>alamat 	: ".$alamat."
  <br/>telp	  	: ".$telp.""
  ;

  foreach($detail as $row){
    echo "Nama Peserta : ".$row->nama_peserta."
    <br/> jenis        : ".$row->jenis."
    <br/>              : ".$row->catatan."
    ";
  }

}

?>
