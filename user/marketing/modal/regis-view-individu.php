<!-- modal loop start -->
<?php if (mysqli_num_rows($queryInd)>0) { ?>

  <?php $modalloop = 1; ?>
  <?php while ($data = mysqli_fetch_array($queryInd)) {
    // code...
    $noregis = $data["reg_no"];
    $id = $data["id_peserta"];
    $nama = $data["peserta_nama"];
    $jenis = $data["peserta_jenis"];
    $jadwal = $data["id_jadwal"];
    $email = $data["peserta_email"];
    $alamat = $data["peserta_alamat"];
    $telp = $data["peserta_telp"];
  ?>

  <!-- Modal view individu Start -->

  <div class="modal fade" id="viewindividu<?php echo $noregis;?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- modal header start -->
        <div class="modal-header">
          <h4>Data Registrasi NO.<?php echo $noregis; ?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- modal header end -->
        <!-- modal body start -->
        <div class="modal-body">
          <input type="hidden" name="view_instansi_id" value="<?php echo $id;?>">
          <div class="form-row">
            <div class="col-sm-3">
              <label class="control-label">Nama Peserta</label>
            </div>
            <div class="col-sm1">
              <label> : </label>
            </div>
            <div class="col-sm-4">
              <label class="control-label"><?php echo $nama; ?></label>
            </div>
          </div>

          <div class="form-row">
            <div class="col-sm-3">
              <label class="control-label">Nomor Telepon</label>
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
              <label class="control-label">Email</label>
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
              <label class="control-label">Alamat</label>
            </div>
            <div class="col-sm1">
              <label> : </label>
            </div>
            <div class="col-sm-4">
              <label class="control-label"><?php echo $alamat; ?></label>
            </div>
          </div>

        </div>
        <!-- modal body end -->
        <!-- modal footer start -->
        <div class="modal-footer">
          <button type="button" data-print="<?php echo $noregis;?>" class="btn btn-success print-individu"><i class="fa fa-print"></i> Print</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        </div>
        <!-- modal footer end -->
      </div>
    </div>
  </div>

  <!-- Modal view individu End -->

  <?php $modalloop++; } ?>


<?php } ?>
<!-- modal loop end -->
