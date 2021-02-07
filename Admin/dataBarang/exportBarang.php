<?php
include "../fungsiExport.php";
include "../../koneksi.php";

$hasil = mysqli_query($sambungin,"SELECT * From tbbarang left join tbkategori on tbbarang.kode_kategori = tbkategori.kode_kategori");

$namefile = "DataBarang.xls";
$judul = "Daftar Barang";
$tablehead = 2;
$tablebody = 3;
$nourut = 1;

//tulis header ms excel
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Disposition: attachment;filename=".$namefile."");
header("Content-Transfer-Encoding: binary");
xlsBOF();
xlsWriteLabel(0,0,$judul);
$kolomhead = 0;

xlsWriteLabel($tablehead,$kolomhead++,"No");
xlsWriteLabel($tablehead,$kolomhead++,"Kode Barang");
xlsWriteLabel($tablehead,$kolomhead++,"Nama Barang");
xlsWriteLabel($tablehead,$kolomhead++,"Kategori");
xlsWriteLabel($tablehead,$kolomhead++,"Spesifikasi");
xlsWriteLabel($tablehead,$kolomhead++,"Stok");
xlsWriteLabel($tablehead,$kolomhead++,"Lokasi");

while($data = mysqli_fetch_array($hasil)){

$kolombody = 0;

xlsWriteLabel($tablebody,$kolombody++,$nourut);
xlsWriteLabel($tablebody,$kolombody++,$data['kode_barang']);
xlsWriteLabel($tablebody,$kolombody++,$data['nama_barang']);
xlsWriteLabel($tablebody,$kolombody++,$data['nama_kategori']);
xlsWriteLabel($tablebody,$kolombody++,$data['spesifikasi']);
xlsWriteLabel($tablebody,$kolombody++,$data['stok']);
xlsWriteLabel($tablebody,$kolombody++,$data['lokasi']);

$tablebody++;
$nourut++;
}
xlsEOF();
exit();




?>