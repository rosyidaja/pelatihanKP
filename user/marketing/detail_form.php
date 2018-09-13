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

    <title>Form Registrasi Training</title>
  </head>

  <div class="container">
<form class="form-horizontal" action="../../fungsi/tambah_ind.php" method="post">

              <div id="individu">
              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Nama Lengkap</label>
                </div>
                <div class="col-sm-8 form-group">
                  <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                  <input type="hidden" name="pilihan" value="individu">
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Email</label>
                </div>
                <div class="col-sm-8 form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Alamat</label>
                </div>
                <div class="col-sm-8 form-group">
                  <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Nomor Telepon</label>
                </div>
                <div class="col-sm-8 form-group">
                  <input type="number" class="form-control" name="telp" placeholder="Nomor Telepon" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Jenis Pelatihan</label>
                </div>
                <div class="col-sm-3 form-group">
                  <select class="form-control" name="course" onchange="getval(this);" id="jns_pelatihan">
                    <?php
                    if(mysqli_num_rows($drDown1) > 0){
                      while ($rowA = mysqli_fetch_assoc($drDown1)) {
                        // code...
                        echo '<option value="'.$rowA[jns_pelatihan_kode].'">'.$rowA[jns_pelatihan_nama].'</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="col-sm-3 form-group text-center">
                  <label class="control-label alert alert-info" id="lblinfo" style="margin-bottom: 0px; padding-bottom: 6px;padding-top: 6px;">Kode Pelatihan: </label>
                </div>
                <div class="col-sm-2 form-group">
                  <select class="form-control" name="schedule">
                    <?php
                    if (mysqli_num_rows($drDown2) > 0) {
                      // code...
                      while ($rowB = mysqli_fetch_assoc($drDown2)) {
                        // code...
                        echo '<option value="'.$rowB[jadwal_id].'">'.$rowB[jadwal_sesi].' : '.$rowB[jadwal_mulai].' - '.$rowB[jadwal_selesai].'</option>';
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Nama Marketing</label>
                </div>
                <div class="col-sm-8 form-group">
                  <input type="text" class="form-control" name="marketing" placeholder="Nama Marketing" required>
                </div>
              </div>
            </div>