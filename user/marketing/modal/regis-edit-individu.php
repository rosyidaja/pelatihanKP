<!-- modal loop start -->
<?php if (mysqli_num_rows($queryIndEdit)>0) { ?>

  <?php $modalloop = 1; ?>
  <?php while ($data = mysqli_fetch_array($queryIndEdit)) {
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

  <!-- Modal edit individu Start -->

  <div class="modal fade" id="editindividu<?php echo $noregis;?>">
    <form data-noreg="<?php echo $noregis;?>" class="edit-individu-marketing" method="post">
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
            <input type="hidden" id="id-ind-<?php echo $noregis;?>" value="<?php echo $id;?>">
            <div class="form-row edit-form">
              <div class="col-sm-3">
                <label class="control-label">Nama Peserta</label>
              </div>
              <div class="col-sm-1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <input type="text" id="nama-ind-<?php echo $noregis;?>" class="form-control" name="" value="<?php echo $nama; ?>">
              </div>
            </div>

            <div class="form-row edit-form">
              <div class="col-sm-3">
                <label class="control-label">Nomor Telepon</label>
              </div>
              <div class="col-sm-1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="telp-ind-<?php echo $noregis;?>" name="" value="<?php echo $telp; ?>">
              </div>
            </div>

            <div class="form-row edit-form">
              <div class="col-sm-3">
                <label class="control-label">Email</label>
              </div>
              <div class="col-sm-1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="email-ind-<?php echo $noregis;?>" name="" value="<?php echo $email; ?>">
              </div>
            </div>

            <div class="form-row edit-form">
              <div class="col-sm-3">
                <label class="control-label">Alamat</label>
              </div>
              <div class="col-sm-1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="alamat-ind-<?php echo $noregis;?>" name="" value="<?php echo $alamat; ?>">
              </div>
            </div>

          </div>
          <!-- modal body end -->
          <!-- modal footer start -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
          <!-- modal footer end -->
        </div>
      </div>
    </form>
  </div>

  <!-- Modal view individu End -->

  <?php $modalloop++; } ?>


<?php } ?>
<!-- modal loop end -->
