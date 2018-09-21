<?php
$pesan = "";
if (!isset($_GET['pesan'])) {
  // code...

} else {
  // code...
  switch ($_GET['pesan']) {

    case 'sukses-aksi':
      // code...
      echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>Aksi Berhasil!</strong></div>';
      break;

    case 'gagal-aksi':
      // code...
      echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>Aksi Gagal!</strong></div>';
      break;

    case 'sukses-apr':
      // code...
      echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>Sukses!</strong> Data telah ditampilkan</div>';
      break;

    case 'sukses-noapr':
      // code...
      echo '<div class="alert alert-warning alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>Sukses!</strong> Data tidak ditampilkan</div>';
      break;

    case 'gagal-login':
      // code...
      echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>Login Gagal!</strong> Username dan password salah</div>';
      break;

    case 'belum-login':
      // code...
      echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>404 Forbiden</strong> Silahkan cek informasi login anda</div>';
      break;

    case 'gagal-logout':
      // code...
      echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>Logout Sukses!</strong> Selamat tinggal</div>';
      break;

    default:
      // code...
      echo "ERROR";
      break;
    }
  }
?>
