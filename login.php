<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Form Registrasi Pendaftaran Training">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fa_all.css">
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">

    <!-- jQuery -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- Java script -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script src="assets/js/register.js"></script>

    <title>Login | USER</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card" style="margin-top: 120px; background-color: #9dc0c3; border:2px solid rgb(130, 132, 203); border-radius: 0.75rem;">

  <article class="card-body">

  <header class="form" style="padding-bottom: 25px; text-align: center;">
    <h3><strong>ADMIN LOGIN</strong></h3>
  </header>

  <?php
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
      echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>Login Gagal!</strong> Username dan password salah</div>';
    }else if($_GET['pesan'] == "logout"){
      echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>Logout Sukses!</strong> Selamat tinggal</div>';
    }else if($_GET['pesan'] == "belum_login"){
      echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>404 Forbiden</strong> Silahkan cek informasi login anda</div>';
    }
  }
  ?>

  <form method="post" action="fungsi/login_proses.php">
    <div class="form-group">
      <label for="exampleDropdownFormEmail1">Username</label>
      <input name="username" type="text" class="form-control" placeholder="Masukkan Username" required>
    </div>
    <div class="form-group">
      <label for="exampleDropdownFormPassword1">Password</label>
      <input name="password" type="password" class="form-control" placeholder="Masukkan Password" required>
    </div>
    <div class="form-check" style="padding-bottom: 10px;">
      <input type="checkbox" class="form-check-input" id="dropdownCheck">
      <label class="form-check-label" for="dropdownCheck">Ingat saya</label>
    </div>
    <button type="submit" name="login" value="login" class="btn btn-primary">Masuk</button>
  </form>
  </article>
  <article class="card-footer">
    <label for=""><a href="user/public/form.php" style="color: #fdfeff;">Bukan admin? Klik untuk masuk ke form registrasi</a></label>
    <label for=""><a href="#" style="color: #fdfeff;">Atau klik untuk menuju dashboard umum</a></label>
  </article>
  </div>
  </div>
  </div>
  </div>
</body>
</html>
