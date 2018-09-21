<!DOCTYPE html>
<html lang="en">
<?php
include '../../config/koneksi.php';
$sql_noregis = mysqli_query($koneksi, "SELECT COALESCE(MAX(reg_no), 0) + 1 AS noReg_baru FROM t_sertifikasi");
$noregBaru = mysqli_fetch_assoc($sql_noregis);
?>
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
    <script>
      $(document).ready(function() {
        <?php

          //query dropdown
          $drDown1 = mysqli_query($koneksi,"select * from m_jns_pelatihan order by jns_pelatihan_nama ASC");
          $drDown2 = mysqli_query($koneksi,"select * from m_jadwal");
          $drDown3 = mysqli_query($koneksi,"SELECT user_id, user_nama FROM m_user WHERE user_level='2'");

          $value_drowdown = '';
          if(mysqli_num_rows($drDown1) > 0){
            while ($testing = mysqli_fetch_assoc($drDown1)) {
              // code...
              $value_drowdown .= '<option value="'.$testing['jns_pelatihan_kode'].'">'.$testing['jns_pelatihan_nama'].'</option>';
            }
          }
          $jadwal_dropdown = '';
          if (mysqli_num_rows($drDown2) > 0) {
            // code...
            while ($rowJadwal = mysqli_fetch_assoc($drDown2)) {
              // code...
              $jadwal_dropdown .= '<option value="'.$rowJadwal['jadwal_id'].'">'.$rowJadwal['jadwal_sesi'].' : '.$rowJadwal['jadwal_mulai'].' - '.$rowJadwal['jadwal_selesai'].'</option>';
            }
          }

          $marketing_dropdown = '';
          if (mysqli_num_rows($drDown3) > 0) {
            // code...
            while ($rowC = mysqli_fetch_assoc($drDown3)) {
              // code...
              $marketing_dropdown .= '<option value="'.$rowC['user_id'].'">'.$rowC['user_nama'].'</option>';
            }
          }

        ?>
        var res = '<?php echo $value_drowdown; ?>';
        var res_jadwal = '<?php echo $jadwal_dropdown; ?>';
        // add tabel
        $("#tambah").on("click",function(){
          var barisbaru = $("<tr>");
          var kolom = "";
          var counter = $("#tbpeserta tbody>tr").length + 1;
          kolom += '<td><select class="form-control" id="pel' + counter + '">'+ res +'</select> </td>';
          kolom += '<td>KODE_PEL</td>';
          kolom += '<td><input type="text" class="form-control" id="nama' + counter + '" placeholder="Nama Peserta"></td>';
          kolom += '<td><select class="form-control" id="jadwal' + counter + '">'+ res_jadwal +'</select></td>';
          kolom += '<td><input type="text" class="form-control" id="cat' + counter + '" placeholder="Masukkan Catatan"></td>';
          kolom += '<td><button type="button" class="hapus btn btn-danger btn-sm"><i class="fa fa-minus"></i></button></td>';

          barisbaru.append(kolom);
          $("#tbpeserta tbody").append(barisbaru);

        });

        $("table.order-list").on("click", ".hapus", function(event){
          $(this).closest("tr").remove();
        });
      });
    </script>
    <script src="../../assets/js/register.js"></script>

    <title>Form Registrasi Training</title>
  </head>

  <body>

    <?php

    if(isset($_GET['pesan'])){
      if($_GET['pesan'] == "sukses"){
        echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" name="button">&times</button><strong>Pendaftaran Berhasil!</strong> Silahkan tunggu follow up dari kami terimakasih.</div>';
      }
    }


    ?>

    <div class="container" id="start">
      <div class="row justify-content-center">
      <div class="col-sm-12">
        <div class="card">

          <header class="card-header">
            <a href="../../login.php" class="float-right btn btn-outline-primary mt-1">Admin Login <i class="fa fa-user"></i></a>
            <h4 class="card-title mt-2">Form Registrasi Pelatihan</h4>
          </header>

          <article class="card-body">

            <div class="form-row">
              <div class="col-sm-3 form-group">
                <label class="control-label">Jenis Form</label>
              </div>
              <div class="col-sm-8 form-group">
                <label class="form-check form-check-inline"> <input id="form-individu" name="rdbtn" class="form-check-input" type="radio" checked> <span class="form-check-label"> Individu </span> </label>
                <label class="form-check form-check-inline"> <input id="form-instansi" name="rdbtn" class="form-check-input" type="radio"> <span class="form-check-label"> Instansi </span> </label>
              </div>
            </div>

            <!-- start form individu -->

            <form class="form-horizontal" action="../../fungsi/tambah_ind.php" method="post">

              <input type="hidden" name="noregis" value="<?php echo $noregBaru['noReg_baru']; ?>">

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
                    <option value="0">Pilih Jenis Pelatihan</option>
                    <?php
                    echo $value_drowdown;
                    ?>
                  </select>
                </div>
                <div class="col-sm-3 form-group text-center">
                  <label class="control-label alert alert-info" id="lblinfo" style="margin-bottom: 0px; padding-bottom: 6px;padding-top: 6px;">Kode Pelatihan: </label>
                </div>
                <div class="col-sm-2 form-group">
                  <select class="form-control" name="schedule">
                    <option value="0">Pilih Jadwal</option>
                    <?php
                      echo $jadwal_dropdown;
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Nama Marketing</label>
                </div>
                <div class="col-sm-3 form-group">
                  <select class="form-control" name="marketing">
                    <option value="0">Pilih Marketing</option>
                    <?php
                      echo $marketing_dropdown;
                    ?>
                    <option value="internet">Internet</option>
                  </select>
                </div>
              </div>

              <!-- <div class="form-row">
                <div class="col-sm-3 form-group">
                  <button type="submit" value="submit-individu" class="btn btn-primary btn-md"><i class="glyphicon glyphicon-user"></i>Submit Data</button>
                </div>
              </div> -->

              <div class="form-row card-footer">
                <div class="col-sm-12 form-group">
                  <h5>Syarat & Ketentuan</h5>
                  <div class="content-agr" style="width:100%; height:200px; overflow:scroll; ">

                    <table>
                      <tr>
                        <td style="vertical-align:top">1. </td>
                        <td>Untuk pengambilan sistem paket, schedule kelas yang tertulis diatas tidak dapat dirubah oleh peserta.
                        Pihak EBIZ INFOTAMA INTERINDO dapat mengganti jadwal kelas yang telah ditentukan apabila jumlah peserta tidak terpenuhi batas minimal</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">2. </td>
                        <td>Pembayaran paling lambat 1 minggu sebelum training.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">3. </td>
                        <td>Setiap peserta diharapkan hadir tepat pada waktunya.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">4. </td>
                        <td>Apabila peserta mengalami keterlambatan dalam proses belajar mengajar karena kesalahannya sendiri,
                        maka keterlambatan tersebut menjadi tanggungjawab peserta.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">5. </td>
                        <td>Apabila karena sesuatu hal, pengajar terlambat datang, peserta akan memperoleh wktu belajar sesuai dengan jadwal yang sudah ditentukan</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">6. </td>
                        <td>Setiap peserta tidak diijinkan mengikuti kelas training / ujian sebelum melunasi biaya yang di tetapkan.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">7. </td>
                        <td>Bagi peserta yang tidak mengikuti kursus tanpa pemberitahuan terlebih dahulu dianggap mengundurkan diri dan tidak ada pengembalian uang kursus.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">8. </td>
                        <td>Pemberitahuan harap dilakukan maksimal 1 minggu sebelum pelaksanaan kursus.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">9. </td>
                        <td>Setiap peserta diharapkan menjaga peralatan komputer muapun barang barang lainnya selama pelakasanaan kursus.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">10. </td>
                        <td>Setiap peserta yang mengikuti kursus hingga selesai atau lebih dari sama dengan 75% durasi training akan memperoleh sertifikat.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">11. </td>
                        <td>Apabila peserta berniat membatalkan schedule kelas yang telah disepakati, maka pembayaran yang telah diterima tidak dapat di kembalikan.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">12. </td>
                        <td>Penerima tugas memberikan materi dan bimbingan teknis atas studi kasus permasalahan yang dihadapi peserta yang sudah disepakati baik materi dan kuantitasnya namun tidak menyelesaikan permasalahan
                        studi kasus tersebut secara menyeluruh (Penyesuaian Skala Proyek)</td>
                      </tr>

                    </table>

                </div>
                  <input type="checkbox" name="checkbox" value="check" id="agree" required /> I have read and agree to the Terms and Conditions and Privacy Policy
                </div>
                <div class="col-sm-12 form-group">
                  <button type="submit" value="submit-individu" class="btn btn-primary btn-md"><i class="fa fa-paper-plane"></i> Submit Data</button>
                </div>
              </div>

              </div>

            </form>

            <!-- end form individu -->

            <!-- start form instansi -->

            <form class="form-horizontal" id="FormComp" action="../../fungsi/tambah_comp.php" method="post">



              <input type="hidden" id="noregis" value="<?php echo $noregBaru['noReg_baru']; ?>">

              <div id="instansi" style="display:none">
                <input type="hidden" id="form_jenis" name="" value="instansi">
              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Nama Instansi</label>
                </div>
                <div class="col-sm-8 form-group">
                  <input type="text" id="nama_instansi" class="form-control" name="" value="" placeholder="Nama instansi" >
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Nama PIC</label>
                </div>
                <div class="col-sm-8 form-group">
                  <input type="text" id="nama_pic" class="form-control" name="" value="" placeholder="Nama pic" >
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Email PIC</label>
                </div>
                <div class="col-sm-8 form-group">
                  <input type="email" id="email_instansi" class="form-control" name="" value="" placeholder="Email PIC" >
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Alamat Instansi</label>
                </div>
                <div class="col-sm-8 form-group">
                  <input type="text" id="alamat_instansi" class="form-control" name="" value="" placeholder="Alamat Instansi" >
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Nomor Telepon PIC</label>
                </div>
                <div class="col-sm-8 form-group">
                  <input type="text" id="nomer_instansi"class="form-control" name="" value="" placeholder="Nomor Telepon PIC" >
                </div>
              </div>

              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label">Nama Marketing</label>
                </div>
                <div class="col-sm-8 form-group">
                  <select id="nama_marketing" class="form-control" name="nama_marketing">
                    <option value="0">Pilih Marketing</option>
                    <?php
                      echo $marketing_dropdown;
                    ?>
                    <option value="internet">Internet</option>
                  </select>
                </div>
              </div>



              <div class="form-row">
                <div class="col-sm-3 form-group">
                  <label class="control-label"><h5>Daftar Peserta Pelatihan</h5></label>
                </div>
                <div class="col-sm-8 form-group">
                  <button type="button" id="tambah" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data Peserta</button>
                </div>
              </div>

              <!-- table start -->
              <div id="divtb" class="table-responsive form-row" style="margin-bottom: 20px;">

              <table id="tbpeserta" class="order-list table table-hover table-striped table-sm table-bordered">
                  <thead class="text-center">
                    <tr>
                      <th>Jenis Pelatihan</th>
                      <th>Kode Pelatihan</th>
                      <th>Nama Peserta</th>
                      <th>Jadwal Pelatihan</th>
                      <th>Catatan</th>
                      <th><i class="fa fa-cog"></i></th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    <!-- <tr>
                      <td><select class="form-control" name="pel">
                        <option value="">Java SE Fundamental (OCA)</option>
                        <option value="">Zend PHP</option>
                        <option value="">Mikrotik Basic Essential</option>
                      </select></td>
                      <td>Zend PHP</td>
                      <td><input type="text" class="form-control" name="nama" value="" placeholder="Nama Peserta"></td>
                      <td>21 Oct 2018 - 23 Oct 2018</td>
                      <td><input type="text" class="form-control" name="cat" value="" placeholder="Masukkan Catatan"></td>
                      <td></td>
                    </tr> -->
                  </tbody>
                  <tfoot>

                  </tfoot>
              </table>

              </div>
              <!-- table end -->

              <div class="form-row card-footer">
                <div class="col-sm-12 form-group">
                  <h5>Syarat & Ketentuan</h5>
                  <div class="content-agr" style="width:100%; height:200px; overflow:scroll; ">

                    <table>
                      <tr>
                        <td style="vertical-align:top">1. </td>
                        <td>Untuk pengambilan sistem paket, schedule kelas yang tertulis diatas tidak dapat dirubah oleh peserta.
                        Pihak EBIZ INFOTAMA INTERINDO dapat mengganti jadwal kelas yang telah ditentukan apabila jumlah peserta tidak terpenuhi batas minimal</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">2. </td>
                        <td>Pembayaran paling lambat 1 minggu sebelum training.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">3. </td>
                        <td>Setiap peserta diharapkan hadir tepat pada waktunya.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">4. </td>
                        <td>Apabila peserta mengalami keterlambatan dalam proses belajar mengajar karena kesalahannya sendiri,
                        maka keterlambatan tersebut menjadi tanggung jawab peserta.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">5. </td>
                        <td>Apabila karena sesuatu hal, pengajar terlambat datang, peserta akan memperoleh wktu belajar sesuai dengan jadwal yang sudah ditentukan</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">6. </td>
                        <td>Setiap peserta tidak diijinkan mengikuti kelas training / ujian sebelum melunasi biaya yang di tetapkan.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">7. </td>
                        <td>Bagi peserta yang tidak mengikuti kursus tanpa pemberitahuan terlebih dahulu dianggap mengundurkan diri dan tidak ada pengembalian uang kursus.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">8. </td>
                        <td>Pemberitahuan harap dilakukan maksimal 1 minggu sebelum pelaksanaan kursus.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">9. </td>
                        <td>Setiap peserta diharapkan menjaga peralatan komputer muapun barang barang lainnya selama pelakasanaan kursus.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">10. </td>
                        <td>Setiap peserta yang mengikuti kursus hingga selesai atau lebih dari sama dengan 75% durasi training akan memperoleh sertifikat.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">11. </td>
                        <td>Apabila peserta berniat membatalkan schedule kelas yang telah disepakati, maka pembayaran yang telah diterima tidak dapat di kembalikan.</td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top">12. </td>
                        <td>Penerima tugas memberikan materi dan bimbingan teknis atas studi kasus permasalahan yang dihadapi peserta yang sudah disepakati baik materi dan kuantitasnya namun tidak menyelesaikan permasalahan
                        studi kasus tersebut secara menyeluruh (Penyesuaian Skala Proyek)</td>
                      </tr>

                    </table>

                </div>
                  <input type="checkbox" name="checkbox" value="check" id="agree" required /> I have read and agree to the Terms and Conditions and Privacy Policy
                </div>
                <div class="col-sm-12 form-group">
                  <button type="button" id="btnFrmSubmit" class="btn btn-primary btn-md"><i class="fa fa-paper-plane"></i> Submit Data</button>
                </div>
              </div>

              </div>
            </form>

            <!-- end form instansi -->

          </article>
        </div>
      </div>
      </div>
    </div>
  </body>
</html>
