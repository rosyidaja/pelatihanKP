<?php
include '../../config/koneksi.php';
$query = mysqli_query($koneksi, "SELECT p.peserta_jenis, p.peserta_instansi_nama, j.jadwal_sesi, t.id_peserta, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta GROUP BY p.peserta_instansi_nama ORDER BY p.peserta_id ASC");
$query2 = mysqli_query($koneksi, "SELECT p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, p.peserta_instansi_nama, j.jadwal_sesi, t.id_peserta, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta GROUP BY p.peserta_instansi_nama ORDER BY p.peserta_id ASC");
?>

<div class="header">
  <h1>Data Registrasi Training</h1>
</div>

<div class="tbcourse">
  <?php if (mysqli_num_rows($query)>0) { ?>
    <table id="tbmarket" class="table table-striped table-hover table-sm text-center">

      <thead>
        <tr>
          <th>NO. Regis</th>
          <th>Jenis</th>
          <th>Peserta</th>
          <th>Jadwal</th>
          <th>Lokasi</th>
          <th>Tools</th>
          <th><i class="fa fa-cog"></i></th>
          <th>Payment Term</th>
          <th>Konfirmasi</th>
        </tr>
      </thead>

      <tbody>

        <?php $no=1; ?>
        <?php while ($data = mysqli_fetch_array($query)) {
          // code...
          $id = $data["id_peserta"];
          $jenis = $data["peserta_jenis"];
          $instansi = $data["peserta_instansi_nama"];
          $jadwal = $data["id_jadwal"];
        ?>

        <tr>

          <td><?php echo $no; ?></td>
          <td><?php echo $jenis; ?></td>
          <td><?php echo $instansi; ?></td>
          <td>
            <select class="form-control apr-disabled" name="">
              <option value="">Pilih Jadwal</option>
            </select>
          </td>
          <td>
            <input type="text" class="form-control apr-disabled" name="" value="" placeholder="Masukkan Lokasi">
          </td>
          <td>
            <select class="form-control apr-disabled" name="">
              <option value="">Pilih Tools</option>
            </select>
          </td>
          <td>
            <div class="btn-group btn-group-sm">
              <button type="button" class="btn btn-warning" data-target="#view<?php echo $jenis;?><?php echo $no;?>" data-toggle="modal"><i class="fa fa-eye"></i> View</button>
              <button type="button" class="btn btn-danger apr-disabled" data-target="#edit<?php echo $no;?>" data-toggle="modal"><i class="fa fa-pen"></i> Edit</button>
            </div>
          </td>
          <td>
            <select class="form-control pterm apr-disabled" data-showbtn="btnCk<?php echo $no; ?>">
              <option selected>Pilih Pembayaran</option>
              <option value="cod">COD</option>
              <option value="kontrak">Kontrak</option>
              <option value="H - 1">H - 1</option>
            </select>
          </td>
          <td>
            <span class="button-checkbox" id="btnCk<?php echo $no; ?>" style="display:none">
              <button type="button" class="btn btn-sm" data-color="success">  Setujui</button>
              <input type="checkbox" style="display: none;" />
            </span>
          </td>

        </tr>

        <?php $no++; } ?>

      </tbody>

    </table>
  <?php } ?>
</div>

<?php if (mysqli_num_rows($query2)>0) { ?>
  <!-- modal loop start -->
  <?php $modalloop = 1; ?>
  <?php while ($data = mysqli_fetch_array($query2)) {
    // code...
    $id = $data["id_peserta"];
    $jenis = $data["peserta_jenis"];
    $instansi = $data["peserta_instansi_nama"];
    $jadwal = $data["id_jadwal"];
    $email = $data["peserta_email"];
    $alamat = $data["peserta_alamat"];
    $telp = $data["peserta_telp"];
  ?>

  <!-- Modal view view user End -->

  <div class="modal fade" id="viewinstansi<?php echo $modalloop;?>">
    <form class="form-horizontal" method="post" action="../../fungsi/admin_manage_user.php">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- modal header start -->
          <div class="modal-header">
            <h4>Data Registrasi NO.<?php echo $modalloop; ?></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- modal header end -->
          <!-- modal body start -->
          <div class="modal-body">
            <input type="hidden" name="view_instansi_id" value="<?php echo $id2;?>">
            <div class="form-row">
              <div class="col-sm-3">
                <label class="control-label">Peserta</label>
              </div>
              <div class="col-sm1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <label class="control-label"><?php echo $instansi; ?></label>
              </div>
            </div>

            <div class="form-row">
              <div class="col-sm-3">
                <label class="control-label">Telepon PIC</label>
              </div>
              <div class="col-sm1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <label class="control-label"><?php echo $telp; ?></label>
              </div>
            </div>

            <div class="form-row">
              <div class="col-sm-3">
                <label class="control-label">Email PIC</label>
              </div>
              <div class="col-sm1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <label class="control-label"><?php echo $email; ?></label>
              </div>
            </div>

            <div class="form-row">
              <div class="col-sm-3">
                <label class="control-label">Alamat Instansi</label>
              </div>
              <div class="col-sm1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <label class="control-label"><?php echo $alamat; ?></label>
              </div>
            </div>

            <div class="tbdtlpsrta table-responsive">

              <table class="table table-striped table-hover table-sm text-center">
                <thead>
                  <tr>
                    <th>Jenis Pelatihan</th>
                    <th>Kode Pelatihan</th>
                    <th>ID</th>
                    <th>Nama Peserta</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $qmtable = mysqli_query($koneksi, "SELECT p.peserta_nama, t.id_peserta, t.id_jns_pelatihan, jp.jns_pelatihan_nama FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jns_pelatihan jp ON t.id_jns_pelatihan=jp.jns_pelatihan_kode) ON p.peserta_id=t.id_peserta WHERE p.peserta_instansi_nama='$instansi' ORDER BY jp.jns_pelatihan_kode ASC"); ?>
                  <?php if (mysqli_num_rows($qmtable)>0) { ?>

                    <?php while ($data = mysqli_fetch_array($qmtable)) {
                      // code...
                      $mtable_pel = $data["jns_pelatihan_nama"];
                      $mtable_pel_kode = $data["id_jns_pelatihan"];
                      $mtable_id = $data["id_peserta"];
                      $mtable_nama = $data["peserta_nama"];
                    ?>
                    <tr>
                      <td><?php echo $mtable_pel; ?></td>
                      <td><?php echo $mtable_pel_kode; ?></td>
                      <td><?php echo $mtable_id; ?></td>
                      <td><?php echo $mtable_nama; ?></td>
                    </tr>
                    <?php } ?>

                  <?php } ?>
                </tbody>
              </table>

            </div>

          </div>
          <!-- modal body end -->
          <!-- modal footer start -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="update-user">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
          <!-- modal footer end -->
        </div>
      </div>
    </form>
  </div>

  <!-- Modal view data user End -->

  <?php $modalloop++; } ?>

  <!-- modal loop end -->
<?php } ?>
