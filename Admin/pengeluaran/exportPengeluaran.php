<?php
include "../fungsiExport.php";
include "../../koneksi.php";

$hasil = mysqli_query($sambungin,"SELECT * From tbpengeluaran left join tbdepartement on tbpengeluaran.kode_departement = tbdepartement.kode_departement left join tblogin on tbpengeluaran.id_login = tblogin.id_login");

$namefile = "DataPengeluaran.xls";
$judul = "Daftar Pengeluaran Barang";
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
xlsWriteLabel($tablehead,$kolomhead++,"Kode Keluar");
xlsWriteLabel($tablehead,$kolomhead++,"Tanggal");
xlsWriteLabel($tablehead,$kolomhead++,"Jumlah Item");
xlsWriteLabel($tablehead,$kolomhead++,"Nama Departement");
xlsWriteLabel($tablehead,$kolomhead++,"Admin");
xlsWriteLabel($tablehead,$kolomhead++,"Keterangan");

while($data = mysqli_fetch_array($hasil)){

$kolombody = 0;

xlsWriteLabel($tablebody,$kolombody++,$nourut);
xlsWriteLabel($tablebody,$kolombody++,$data['kode_keluar']);
xlsWriteLabel($tablebody,$kolombody++,$data['tanggal_keluar']);
xlsWriteLabel($tablebody,$kolombody++,$data['jumlah_item']);
xlsWriteLabel($tablebody,$kolombody++,$data['nama_departement']);
xlsWriteLabel($tablebody,$kolombody++,$data['nama_admin']);
xlsWriteLabel($tablebody,$kolombody++,$data['keterangan']);

$tablebody++;
$nourut++;
}
xlsEOF();
exit();




?>