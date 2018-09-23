<!-- modal loop start -->
<?php if (mysqli_num_rows($queryInsEdit)>0) { ?>

  <?php $modalloop = 1; ?>
  <?php while ($data = mysqli_fetch_array($queryInsEdit)) {
    // code...
    $noregis = $data["reg_no"];
    $id = $data["id_peserta"];
    $jenis = $data["peserta_jenis"];
    $instansi = $data["peserta_instansi_nama"];
    $jadwal = $data["id_jadwal"];
    $email = $data["peserta_email"];
    $alamat = $data["peserta_alamat"];
    $telp = $data["peserta_telp"];
  ?>

  <!-- Modal view instansi End -->

  <div class="modal fade" id="editinstansi<?php echo $noregis;?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- modal header start -->
        <div class="modal-header form-horizontal">
          <h4>Data Registrasi NO.<?php echo $noregis; ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- modal header end -->
        <!-- modal body start -->
        <div class="modal-body">
          <input type="hidden" name="view_instansi_id" value="<?php echo $id;?>">
          <div class="form-row edit-form">
            <div class="col-sm-3">
              <label class="control-label">Peserta</label>
            </div>
            <div class="col-sm1">
              <label> : </label>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="" value="<?php echo $instansi; ?>">
            </div>
          </div>

          <div class="form-row edit-form">
            <div class="col-sm-3">
              <label class="control-label">Telepon PIC</label>
            </div>
            <div class="col-sm1">
              <label> : </label>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="" value="<?php echo $telp; ?>">
            </div>
          </div>

          <div class="form-row edit-form">
            <div class="col-sm-3">
              <label class="control-label">Email PIC</label>
            </div>
            <div class="col-sm1">
              <label> : </label>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="" value="<?php echo $email; ?>">
            </div>
          </div>

          <div class="form-row edit-form">
            <div class="col-sm-3">
              <label class="control-label">Alamat Instansi</label>
            </div>
            <div class="col-sm1">
              <label> : </label>
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="" value="<?php echo $alamat; ?>">
            </div>
          </div>



          <div class="form-row edit-form">
            <div class="col-sm-3">
              <br>
              <label class="control-label"> <h5>Daftar Peserta</h5> </label>
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
                <?php $qmtable = mysqli_query($koneksi, "SELECT p.peserta_nama, t.id_peserta, t.id_jns_pelatihan, jp.jns_pelatihan_nama FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jns_pelatihan jp ON t.id_jns_pelatihan=jp.jns_pelatihan_kode) ON p.peserta_id=t.id_peserta WHERE p.peserta_instansi_nama='$instansi' ORDER BY t.id_peserta ASC"); ?>
                <?php if (mysqli_num_rows($qmtable)>0) { ?>

                  <?php while ($data = mysqli_fetch_array($qmtable)) {
                    // code...
                    $mtable_pel = $data["jns_pelatihan_nama"];
                    $mtable_pel_kode = $data["id_jns_pelatihan"];
                    $mtable_id = $data["id_peserta"];
                    $mtable_nama = $data["peserta_nama"];
                  ?>
                  <tr>
                    <td class="align-middle"><?php echo $mtable_pel; ?></td>
                    <td class="align-middle"><?php echo $mtable_pel_kode; ?></td>
                    <td class="align-middle"><?php echo $mtable_id; ?></td>
                    <td class="align-middle"> <input type="text" id="" class="form-control" value="<?php echo $mtable_nama; ?>"> </td>
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
          <button type="submit" class="btn btn-primary" name="edit-<?php echo $jenis;?>">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
        <!-- modal footer end -->
      </div>
    </div>
  </div>

  <!-- Modal view instansi End -->

  <?php $modalloop++; } ?>


<?php } ?>
<!-- modal loop end -->
