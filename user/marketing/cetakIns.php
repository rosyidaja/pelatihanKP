<?php
include '../../config/koneksi.php';
if (isset($_GET['reg_no'])) {
	// code...
	$regisno = $_GET['reg_no'];

	$cetakInd = mysqli_query($koneksi, "SELECT p.peserta_jenis, p.peserta_instansi_nama, p.peserta_pic_nama, p.peserta_alamat, p.peserta_telp, p.peserta_email, pel.jns_pelatihan_nama, t.id_jns_pelatihan, j.jadwal_sesi, j.jadwal_mulai, j.jadwal_selesai, u.user_nama, t.id_peserta, t.id_jadwal, t.approve, t.reg_no, t.lokasi, t.tools, t.tgl_registrasi, t.status_pay, t.trainer FROM m_peserta p INNER JOIN(m_jadwal j INNER JOIN(m_jns_pelatihan pel INNER JOIN(t_sertifikasi t INNER JOIN m_user u ON t.id_marketing=u.user_id)ON pel.jns_pelatihan_kode=t.id_jns_pelatihan)ON j.jadwal_id=t.id_jadwal) ON p.peserta_id=t.id_peserta WHERE t.reg_no='$regisno' ORDER BY p.peserta_id ASC");

	while ($data = mysqli_fetch_array($cetakInd)) {
    // code...
		$pel = $data["jns_pelatihan_nama"];
		$pelKode = $data["id_jns_pelatihan"];
    $nama = $data["peserta_instansi_nama"];
		$namaPIC = $data["peserta_pic_nama"];
    $jenis = $data["peserta_jenis"];
    $email = $data["peserta_email"];
    $alamat = $data["peserta_alamat"];
    $telp = $data["peserta_telp"];
		$lokasi = $data["lokasi"];
		$tools = $data["tools"];
		$trainer = $data["trainer"];
		$pterm = $data["status_pay"];
		$tglRegis = $data["tgl_registrasi"];
		$jSesi = $data["jadwal_sesi"];
		$jMulai = $data["jadwal_mulai"];
		$jSelesai = $data["jadwal_selesai"];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> CETAK | BUKTI REGISTRASI</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
</head>
<body onload="window.print();">
	<div class="container p-5">
	 <div class="row">

		<div class="col-12 border border-3">
			<img src="../../assets/image/header-cetak.JPG" style="width:850px;padding-left:130px; padding-top: 20px; padding-bottom: 20px;" >
		</div>

		<div class="col-12 border border-3">

		<div style="padding-top: 30px;padding-bottom: 30px;">
				<h4 class="text-center">
					REGISTRATION FORM
				</h4>
				<h4 class="text-center">
					NO.REG : <?php echo $regisno; ?>
				</h4>
		</div>

		<div class="content text-left" style="font-size: 20px; padding-top:45px; padding-bottom:75%;padding-left:70px;">

			<div class="row">
				<label class="col-sm-3">
					Nama Instansi
				</label>
				<div>: </div>
				<div class="col-sm-8">
					<?php echo $nama;?>
				</div>
			</div>
			<div class="row">
				<label class="col-sm-3">
					Alamat Instansi
				</label>
				<div>: </div>
				<div class="col-sm-8">
					<?php echo $alamat;?>
				</div>
			</div>
			<div class="row">
				<label class="col-sm-3">
					Nama PIC
				</label>
				<div>: </div>
				<div class="col-sm-8">
					<?php echo $namaPIC;?>
				</div>
			</div>
			<div class="row">
				<label class="col-sm-3">
					No. Telepon PIC
				</label>
				<div>: </div>
				<div class="col-sm-8">
					<?php echo $telp;?>
				</div>
			</div>
			<div class="row">
				<label class="col-sm-3">
					Email PIC
				</label>
				<div>: </div>
				<div class="col-sm-8">
					<?php echo $email;?>
				</div>
			</div>
			<div class="row">
				<label class="col-sm-3">
					Jenis Pelatihan
				</label>
				<div>: </div>
				<div class="col-sm-8">
					<?php echo $pel; ?>
				</div>
			</div>
			<div class="row">
				<label class="col-sm-3">
					Jadwal
				</label>
				<div>: </div>
				<div class="col-sm-8">
					<?php echo "$jSesi - $jMulai s/d $jSelesai"; ?>
				</div>
			</div>
			<div class="row">
				<label class="col-sm-3">
					Tgl Registrasi
				</label>
				<div>: </div>
				<div class="col-sm-8">
					<?php echo $tglRegis; ?>
				</div>
			</div>
			<div class="row">
				<label class="col-sm-3">
					Tools
				</label>
				<div>: </div>
				<div class="col-sm-8">
					<?php if ($tools == "") { echo "Data Belum di Masukkan"; } else { echo $tools; } ?>
				</div>
			</div>
			<div class="row">
				<label class="col-sm-3">
					Lokasi
				</label>
				<div>: </div>
				<div class="col-sm-8">
					<?php if ($lokasi == "") { echo "Data Belum di Masukkan"; } else { echo $lokasi; } ?>
				</div>
			</div>
			<div class="row">
				<label class="col-sm-3">
					Pembayaran
				</label>
				<div>: </div>
				<div class="col-sm-8">
					<?php if ($pterm == "") { echo "Data Belum di Masukkan"; } else { echo $pterm; } ?>
				</div>
			</div>
			<div class="row">
				<label class="col-sm-12">
					<h5>Daftar Peserta</h5>
				</label>
				<div class="col-sm-12">
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
							<?php $qmtable = mysqli_query($koneksi, "SELECT p.peserta_nama, t.id_peserta, t.id_jns_pelatihan, jp.jns_pelatihan_nama FROM m_peserta P INNER JOIN(t_sertifikasi t INNER JOIN m_jns_pelatihan jp ON t.id_jns_pelatihan=jp.jns_pelatihan_kode) ON p.peserta_id=t.id_peserta WHERE p.peserta_instansi_nama='$nama' ORDER BY jp.jns_pelatihan_kode ASC, t.id_peserta ASC"); ?>
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

		</div>

		</div>

	 </div>
	</div>
</body>
</html>
