<?php
$queryIns = mysqli_query($koneksi, "SELECT p.peserta_jenis, p.peserta_alamat, p.peserta_email, p.peserta_telp, p.peserta_instansi_nama, j.jadwal_sesi, t.id_peserta, t.id_jadwal FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jadwal j ON t.id_jadwal=j.jadwal_id) ON p.peserta_id=t.id_peserta ORDER BY p.peserta_id ASC");
?>
<!-- modal loop start -->
<?php if (mysqli_num_rows($queryIns)>0) { ?>

  <?php $modalloop = 1; ?>
  <?php while ($data = mysqli_fetch_array($queryIns)) {
    // code...
    $id = $data["id_peserta"];
    $jenis = $data["peserta_jenis"];
    $instansi = $data["peserta_instansi_nama"];
    $jadwal = $data["id_jadwal"];
    $email = $data["peserta_email"];
    $alamat = $data["peserta_alamat"];
    $telp = $data["peserta_telp"];
  ?>

  <!-- Modal view instansi End -->

  <div class="modal fade" id="viewinstansi<?php echo $modalloop;?>">
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
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
        <!-- modal footer end -->
      </div>
    </div>
  </div>

  <!-- Modal view instansi End -->

  <?php $modalloop++; } ?>


<?php } ?>
<!-- modal loop end -->
