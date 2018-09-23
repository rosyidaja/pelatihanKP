// Coba jQuery
$(function() {
    $('body').fadeIn("slow");
    $('.alert-dismissible').delay("2000").slideUp("slow");
    $('#lblinfo').html("Pilih Pelatihan");
});

// dropdown function
function getval(sel)
{
    // alert(sel.value);
    document.getElementById("lblinfo").innerHTML= "Kode Pelatihan: " + document.getElementById("jns_pelatihan").value;
};

$(document).ready(function(){


  //approval button
  $('.pterm').on('change', function() {
    var btnId = $(this).attr('data-showbtn');
    // var selVal = $(this).attr('value');
    var selVal = this.selectedIndex;
    if (selVal == "") {
      $('#'+btnId).fadeOut("slow");
    } else {
      $('#'+btnId).fadeIn("slow");
    }
  });

  // radio button jenis form
  $('#form-individu').on('click', function() {
    // $('#instansi').slideUp("slow").delay("slow");
    // $('#individu').delay("slow").slideDown("slow");
    $('#instansi').fadeOut("slow");
    $('#individu').delay("slow").fadeIn("slow");
  });

  $('#form-instansi').on('click', function() {
    // $('#individu').slideUp("slow").delay("slow");
    // $('#instansi').delay("slow").slideDown("slow");
    $('#individu').fadeOut("slow");
    $('#instansi').delay("slow").fadeIn("slow");
  });

});

// checkbox
$(function () {

  //submit modal edit individu marketing
  $('.edit-individu-marketing').submit(function (e) {
    e.preventDefault();
    // alert("test");
    var $dataNoreg = $(this).attr('data-noreg');
    if (confirm("Submit data ?")) {
      // alert("data berhasil di submit");
      var editIndMarket = {};
      editIndMarket.nama = $("[id*=nama-ind-"+$dataNoreg+"]").val();
      editIndMarket.alamat = $("[id*=alamat-ind-"+$dataNoreg+"]").val();
      editIndMarket.telp = $("[id*=telp-ind-"+$dataNoreg+"]").val();
      editIndMarket.email = $("[id*=email-ind-"+$dataNoreg+"]").val();

      $.ajax({
        type: 'POST',
        data: { editMarket : editIndMarket },
        url: '../../fungsi/edit-data-regis.php',
        success: function(result) {
          if (result != 1) {
            alert("Data gagal di submit");
          } else {

          }
        }
      });

    } else {
      return false;
    }
  });

  //submit modal edit instansi marketing
  $('.edit-instansi-marketing').submit(function (e) {
    e.preventDefault();
    // alert("test");
    var $dataNoreg = $(this).attr('data-noreg');
    if (confirm("Submit data ?")) {
      // alert("data berhasil di submit");
      var editIndMarket = {};
      editIndMarket.nama = $("[id*=nama-ind-"+$dataNoreg+"]").val();
      editIndMarket.alamat = $("[id*=alamat-ind-"+$dataNoreg+"]").val();
      editIndMarket.telp = $("[id*=telp-ind-"+$dataNoreg+"]").val();
      editIndMarket.email = $("[id*=email-ind-"+$dataNoreg+"]").val();

      $.ajax({
        type: 'POST',
        data: { editMarket : editIndMarket },
        url: '../../fungsi/edit-data-regis.php',
        success: function(result) {
          if (result != 1) {
            alert("Data gagal di submit");
          } else {

          }
        }
      });

    } else {
      return false;
    }
  });

  //submit
  $('#btnFrmSubmit').click(function () {
      /* Checking if more than 0 rows exists */
      if ($("#tbpeserta tbody>tr").length > 0) {
          var info = {};
          info.nama_marketing = $("[id*=nama_marketing]").val();
          info.nama_instansi = $("[id*=nama_instansi]").val();
          info.nama_pic = $("[id*=nama_pic]").val();
          info.jadwal_instansi = $("[id*=jadwal_instansi]").val();
          info.jenis_pelatihan = $("[id*=jenis_pelatihan]").val();
          info.email_instansi = $("[id*=email_instansi]").val();
          info.alamat_instansi = $("[id*=alamat_instansi]").val();
          info.nomer_instansi = $("[id*=nomer_instansi]").val();
          info.nama_marketing = $("[id*=nama_marketing]").val();
          info.form_jenis = $("[id*=form_jenis]").val();
          info.noregis = $("[id*=noregis]").val();

          /* Creating Array object as WireDimDetails to add in user object*/
          var WireDimDetails = new Array();
          $("#tbpeserta tbody tr").each(function () {
              var row = $(this);
              /* Declare and sets the WireDimDetail object with the property which will add in WireDimDetails array object*/
              var WireDimDetail = {};
              var nama_peserta = row.find("[id^=nama]").val();
              /* Checking if control exist or not else assign empty value in sizeMax*/
              // var jenis = row.find("[id^=pel]") != "undefined" ? row.find("[id^=pel]").val() : "";
              // var jadwal = row.find("[id^=jadwal]") != "undefined" ? row.find("[id^=jadwal]").val() : "";
              //var kode = row.find("[id^=kode]").val();
              var catatan = row.find("[id^=cat]").val();
              /*Sets the Values of controls */
              WireDimDetail.nama_peserta = nama_peserta;
              //WireDimDetail.kode = kode;
              WireDimDetail.catatan = catatan;
              /*Add WireDimDetail object in WireDimDetails Array object*/
              WireDimDetails.push(WireDimDetail);
          })
          /*Add WireDimDetails array of object to user object*/
          //user.WireDimDetails = WireDimDetails;
          //info.detail = WireDimDetails;
          //console.log(info);
          $.ajax({
              type: 'POST',
              data: {
                formValues : info,
                task : WireDimDetails
                },
              url: '../../fungsi/tambah_comp.php',
              success: function(result) {
                 if(result != 1){
                  alert("Data Gagal dihapus, silahkan Coba Kembali");
                }else{
                    window.location.href = "../../user/public/form.php?pesan=sukses";
                }
              }
            });

      }
      return false;
  });

    // tombol setujui marketing
    $('.button-checkbox-marketing').each(function () {

        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            $dataApr = $widget.attr('data-apr'),
            $dataMID = $widget.attr('data-mid'),
            $dataField = $widget.attr('data-field'),
            $dataId = $widget.attr('data-id'),
            $disabledEdit = $('.apr-disabled'+$dataId),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'fa fa-check-square'
                },
                off: {
                    icon: 'far fa-square'
                }
            };

        //hide if approved

        if ($dataMID == "1") {
          $widget.show();
        } else if ($dataMID != "1" && $dataApr > "0") {
          $checkbox.prop('checked', !$checkbox.is(':checked'));
          $checkbox.triggerHandler('change');
          updateDisplay();
          $disabledEdit.prop('disabled', true);
          $button.prop('disabled', true);
          $widget.show();
        }

        // Event Handlers
        $button.on('click', function () {
            if (confirm("Apakah anda yakin akan menyetujui data ini ?\nData tidak dapat di ubah setelah di setujui")) {

              $widget.attr("data-apr", "1");

              var approveM = {};
              approveM.id = $("[id*=noregis"+$dataField+"]").val();
              approveM.jadwal = $("[id*=jadwal"+$dataField+"]").val();
              approveM.lokasi = $("[id*=lokasi"+$dataField+"]").val();
              approveM.tools = $("[id*=tools"+$dataField+"]").val();
              approveM.pembayaran = $("[id*=pembayaran"+$dataField+"]").val();
              approveM.approval = $widget.attr('data-apr');

              $.ajax({
                type: 'POST',
                data: {
                  marketingApr : approveM
                  },
                url: '../../fungsi/approval.php',
                success: function(result) {
                  if (result != 1) {
                    alert("Data gagal dihapus, Silahkan coba kembali");
                  } else {

                  }
                }
              });

              $checkbox.prop('checked', !$checkbox.is(':checked'));
              $checkbox.triggerHandler('change');
              updateDisplay();
              $disabledEdit.prop('disabled', true);
              $button.prop('disabled', true);
            } else {
              return false;
            }
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });

    //tombol setujui admin
    $('.button-checkbox-admin').each(function () {

        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            $dataApr = $widget.attr('data-apr'),
            $dataMID = $widget.attr('data-mid'),
            $dataField = $widget.attr('data-field'),
            $dataId = $widget.attr('data-id'),
            $disabledEdit = $('.apr-disabled'+$dataId),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'fa fa-check-square'
                },
                off: {
                    icon: 'far fa-square'
                }
            };

        if ($dataApr == "2") {
          $checkbox.prop('checked', !$checkbox.is(':checked'));
          $checkbox.triggerHandler('change');
          updateDisplay();
          $widget.show();
        } else {
          $widget.show();
        }

        // Event Handlers
        $button.on('click', function () {
          if ($dataApr == "1") {
            if (confirm("Apakah anda yakin akan menyetujui data ini ?\nData akan ditampilkan di dashboard umum setelah di setujui.")) {

              $widget.attr("data-apr", "2");

              var approveA = {};
              approveA.id = $("[id*=noregis"+$dataField+"]").val();
              approveA.jadwal = $("[id*=jadwal"+$dataField+"]").val();
              approveA.lokasi = $("[id*=lokasi"+$dataField+"]").val();
              approveA.trainer = $("[id*=trainer"+$dataField+"]").val();
              approveA.tools = $("[id*=tools"+$dataField+"]").val();
              approveA.pembayaran = $("[id*=pembayaran"+$dataField+"]").val();
              approveA.approval = $widget.attr('data-apr');

              $.ajax({
                type: 'POST',
                data: {
                  marketingApr : approveA
                  },
                url: '../../fungsi/approval.php',
                success: function(result) {
                  if (result != 1) {
                    alert("Data gagal dihapus, Silahkan coba kembali");
                  } else {
                    $checkbox.prop('checked', !$checkbox.is(':checked'));
                    $checkbox.triggerHandler('change');
                    updateDisplay();
                    window.location.href = "../../user/admin/index.php?halaman=course-info&pesan=sukses-apr";
                  }
                }
              });
            } else {
              return false;
            }
          } else {
            if (confirm("Apakah anda yakin akan membatalkan data ini ?\nData tidak akan di tampilkan di dashboard umum setelah di batalkan.")) {

              $widget.attr("data-apr", "1");

              var approveA = {};
              approveA.id = $("[id*=noregis"+$dataField+"]").val();
              approveA.jadwal = $("[id*=jadwal"+$dataField+"]").val();
              approveA.lokasi = $("[id*=lokasi"+$dataField+"]").val();
              approveA.trainer = $("[id*=trainer"+$dataField+"]").val();
              approveA.tools = $("[id*=tools"+$dataField+"]").val();
              approveA.pembayaran = $("[id*=pembayaran"+$dataField+"]").val();
              approveA.approval = $widget.attr('data-apr');

              $.ajax({
                type: 'POST',
                data: {
                  marketingApr : approveA
                  },
                url: '../../fungsi/approval.php',
                success: function(result) {
                  if (result != 1) {
                    alert("Data gagal dihapus, Silahkan coba kembali");
                  } else {
                    $checkbox.prop('checked', !$checkbox.is(':checked'));
                    $checkbox.triggerHandler('change');
                    updateDisplay();
                    window.location.href = "../../user/admin/index.php?halaman=course-info&pesan=sukses-noapr";
                  }
                }
              });
            } else {
              return false;
            }
          }
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });

});
