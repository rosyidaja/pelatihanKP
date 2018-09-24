<!-- modal loop start -->
<?php if (mysqli_num_rows($queryInsEdit)>0) { ?>

  <?php $modalloop = 1; ?>
  <?php while ($data = mysqli_fetch_array($queryInsEdit)) {
    // code...
    $noregis = $data["reg_no"];
    $namaPIC = $data["peserta_pic_nama"];
    $id = $data["id_peserta"];
    $pel = $data["jns_pelatihan_nama"];
    $pelkode = $data["id_jns_pelatihan"];
    $jenis = $data["peserta_jenis"];
    $instansi = $data["peserta_instansi_nama"];
    $jadwal = $data["id_jadwal"];
    $email = $data["peserta_email"];
    $alamat = $data["peserta_alamat"];
    $telp = $data["peserta_telp"];
  ?>

  <!-- Modal edit instansi start -->

  <div class="modal fade" id="editinstansi<?php echo $noregis;?>">
    <form data-noreg="<?php echo $noregis;?>" class="edit-instansi-marketing" method="post">

      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- modal header start -->
          <div class="modal-header form-horizontal">
            <h4>Data Registrasi NO.<?php echo $noregis; ?></h4>
            <button type="button" class="close" onClick="window.location.reload()" data-dismiss="modal">&times;</button>
          </div>
          <!-- modal header end -->
          <!-- modal body start -->
          <div class="modal-body">
            <input type="hidden" name="view_instansi_id" value="<?php echo $id;?>">
            <div class="form-row edit-form">
              <div class="col-sm-3">
                <label class="control-label">Nama Instansi</label>
              </div>
              <div class="col-sm-1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="nama-ins-<?php echo $noregis;?>" value="<?php echo $instansi; ?>">
              </div>
            </div>

            <div class="form-row edit-form">
              <div class="col-sm-3">
                <label class="control-label">Nama PIC</label>
              </div>
              <div class="col-sm-1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="nama_pic-ins-<?php echo $noregis;?>" value="<?php echo $namaPIC; ?>">
              </div>
            </div>

            <div class="form-row edit-form">
              <div class="col-sm-3">
                <label class="control-label">Telepon PIC</label>
              </div>
              <div class="col-sm-1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="telp-ins-<?php echo $noregis;?>" value="<?php echo $telp; ?>">
              </div>
            </div>

            <div class="form-row edit-form">
              <div class="col-sm-3">
                <label class="control-label">Email PIC</label>
              </div>
              <div class="col-sm-1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="email-ins-<?php echo $noregis;?>" value="<?php echo $email; ?>">
              </div>
            </div>

            <div class="form-row edit-form">
              <div class="col-sm-3">
                <label class="control-label">Alamat Instansi</label>
              </div>
              <div class="col-sm-1">
                <label> : </label>
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="alamat-ins-<?php echo $noregis;?>" value="<?php echo $alamat; ?>">
              </div>
            </div>

            <div class="form-row edit-form" style="margin-bottom: 0px;margin-top: 20px;">
              <div class="col-sm-3">
                <label class="control-label"> <h5>Daftar Peserta</h5> </label>
              </div>
              <!-- <div class="col-sm-9 form-group">
                <button type="button" data-tbl="" class="btn btn-primary btn-sm tambah-ps"><i class="fa fa-plus"></i> Tambah Data Peserta</button>
              </div> -->
            </div>
            <div class="tbdtlpsrta table-responsive">

              <table id="tbdtl<?php echo $noregis;?>" class="table table-striped table-hover table-sm text-center tbl-peserta">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Jenis Pelatihan</th>
                    <th>Kode Pelatihan</th>
                    <th>Nama Peserta</th>
                    <th><i class="fa fa-cog"></i></th>
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
                    <tr data-db="1" data-pid="<?php echo $mtable_id;?>">
                      <input type="hidden" id="id<?php echo $noregis;?>" value="<?php echo $mtable_id;?>">
                      <td class="align-middle"><?php echo $mtable_id; ?></td>
                      <td class="align-middle nm-pel<?php echo $noregis;?>"><?php echo $mtable_pel; ?></td>
                      <td class="align-middle kd-pel<?php echo $noregis;?>"><?php echo $mtable_pel_kode; ?></td>
                      <td class="align-middle"> <input type="text" id="nama<?php echo $noregis;?>" class="form-control" value="<?php echo $mtable_nama; ?>"> </td>
                      <td class="align-middle"><button type="button" class="hapus btn btn-danger btn-sm"><i class="fa fa-minus"></i></button></td>
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
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-danger" onClick="window.location.reload()" data-dismiss="modal">Batal</button>
          </div>
          <!-- modal footer end -->
        </div>
      </div>

    </form>
  </div>

  <!-- Modal edit instansi End -->

  <?php $modalloop++; } ?>


<?php } ?>
<!-- modal loop end -->
<!-- button tambah peserta start -->
<script type="text/javascript">
  $(document).ready(function() {

    $("table.tbl-peserta").on("click", ".hapus", function() {

      var rowStat = $(this).closest("tr").attr('data-db');
      var dataPid = $(this).closest("tr").attr('data-pid');
      var deleteRow = $(this);

      if (confirm("Hapus Peserta id "+dataPid+" ?")) {

        $.ajax({
          type: 'POST',
          url: '../../fungsi/edit-data-regis.php',
          data: { pID : dataPid, delete: rowStat },
          success: function(result) {
            if(result != 1){
              alert("Data Gagal dihapus, silahkan Coba Kembali");
            }else{
              deleteRow.closest("tr").remove();
            }
          }
        });

      } else {



      }
    });

  });
</script>
<!-- button tambah peserta end -->
