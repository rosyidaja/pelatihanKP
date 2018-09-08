/*TUpdate Tabel peserta tambah kolom peserta instansi nama dan peruahan tipe data*/
ALTER TABLE `db_schebiz`.`m_peserta` 
MODIFY COLUMN `peserta_nama` varchar(100) NOT NULL AFTER `peserta_id`,
MODIFY COLUMN `peserta_telp` varchar(12) NOT NULL AFTER `peserta_alamat`,
MODIFY COLUMN `peserta_aktif` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'y' AFTER `peserta_jenis`,
ADD COLUMN `peserta_instansi_nama` varchar(100) AFTER `peserta_aktif`;