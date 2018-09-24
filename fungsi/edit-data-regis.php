<?php
session_start();
$mUID = $_SESSION['m-id'];
include '../config/koneksi.php';

// code...
//delete edit marketing
if (isset($_POST['delete'])) {
  // code...
  $pID = $_POST['pID'];
  $delete = "DELETE p, t FROM t_sertifikasi t INNER JOIN m_peserta p ON p.peserta_id = t.id_peserta WHERE t.id_peserta = '$pID'";
  if (mysqli_query($koneksi, $delete)) {
    // code...

  } else {
    // code...
    echo "Error: " . $delete . "<br>" . $koneksi->error;
  }

  echo 1;

} else if (isset($_POST['editMarketInd'])) {
  // code...
  // Submit edit individu marketing
  extract($_POST['editMarketInd']);
  $submitEditM_ind = "UPDATE m_peserta SET peserta_nama='$nama', peserta_instansi_nama='$nama', peserta_alamat='$alamat', peserta_email='$email', peserta_telp='$telp' WHERE peserta_id='$id'";
  if (mysqli_query($koneksi, $submitEditM_ind)) {
    // code...
  } else {
    // code...
    echo "Error: " . $submitEditM_ind . "<br>" . $koneksi->error;
  }

  echo 1;

} else if (isset($_POST['editMarketIns'])) {
  // code...
  // Submit edit instansi marketing
  extract($_POST['editMarketIns']);
  $peserta = $_POST['task2'];

  foreach ($peserta as $r => $row) {
    // code...
    $submitEditM_ins = "UPDATE m_peserta SET peserta_nama='".$row['peserta_nama']."', peserta_pic_nama='".$namaPIC."', peserta_instansi_nama='".$nama."', peserta_alamat='".$alamat."', peserta_telp='".$telp."', peserta_email='".$email."' WHERE peserta_id='".$row['peserta_id']."'";
    if (mysqli_query($koneksi, $submitEditM_ins)) {
      // code...
    } else {
      // code...
    }
  }
  echo 1;
}

?>
