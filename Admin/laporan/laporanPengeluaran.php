<?php
	include "../../koneksi.php";
	include "../../fpdf17/fpdf.php";
	include "../fungsiTanggal.php";
	$today = date('Y-m-d');
	$tgl_awal = $_POST['tgl_awal'];
	$tgl_akhir = $_POST['tgl_akhir'];

$pdf = new FPDF ('L','mm',array(210,297)); // tipe kertas P potrait, L landscape, mm milimeter, 210,297 ukuran kertas
$pdf-> addPage();
$pdf-> Image('C:\xampp\htdocs\Sistem_Inventaris\img\bps.png',12,12,30);
$pdf-> SetFont('Arial','B',16); // tipe font, bold , ukuran font
$pdf-> Cell(60);
$pdf-> Cell(155,10,'Laporan Pengeluaran Barang', 0,1,'C');
$pdf-> SetFont('Arial','B',16); // tipe font, bold , ukuran font
$pdf-> Cell(60);
$pdf-> Cell(155,5,'Badan Pusat Statistik Kota Payakumbuh', 0,1,'C');
$pdf-> Cell(60);
$pdf-> SetFont('Arial','B',12); // tipe font, bold , ukuran font
$pdf-> Cell(155,17,'Jl. Imam Bonjol, Bulakan Balai Kandih, Kec.Payakumbuh Barat', 0,1,'C');
// garis bawah double
$pdf-> SetLineWidth(1);
$pdf-> Line(10,38,285,38);
$pdf-> SetLineWidth(0);
$pdf-> Line(10,39,285,39);

$pdf-> Ln(5);

$pdf-> SetLineWidth(0.2);
$pdf-> SetFont('Arial','B',12); // tipe font, bold , ukuran font
$pdf-> Cell(50,6,'Tanggal',1,0,'C');
$pdf-> Cell(45,6,'Kode Keluar',1,0,'C');
$pdf-> Cell(50,6,'Nama Barang',1,0,'C');
$pdf-> Cell(40,6,'Jumlah Barang',1,0,'C');
$pdf-> Cell(50,6,'Nama Departement',1,0,'C');
$pdf-> Cell(40,6,'No Keterangan',1,0,'C');

$query = mysqli_query($sambungin,"SELECT distinct * FROM tbpengeluaran left join tbdetail_pengeluaran on tbpengeluaran.kode_keluar = tbdetail_pengeluaran.kode_keluar left join tbbarang on tbdetail_pengeluaran.kode_barang = tbbarang.kode_barang left join tbdepartement on tbpengeluaran.kode_departement = tbdepartement.kode_departement where (tbpengeluaran.tanggal_keluar BETWEEN '$tgl_awal' AND '$tgl_akhir') GROUP BY tbpengeluaran.kode_keluar");
while ($data = mysqli_fetch_array($query)) {

$pdf-> Ln(6);
$pdf-> SetFont('Arial','',12); // tipe font, bold , ukuran font
$pdf-> Cell(50,6,tgl_indo($data['tanggal_keluar']),1,0,'C');
$pdf-> Cell(45,6,$data['kode_keluar'],1,0,'C');
$pdf-> Cell(50,6,$data['nama_barang'],1,0,'C');
$pdf-> Cell(40,6,$data['jumlah_barang'],1,0,'C');
$pdf-> Cell(50,6,$data['nama_departement'],1,0,'C');
$pdf-> Cell(40,6,$data['keterangan'],1,0,'C');
}

{
$pdf-> Cell(30);
$pdf-> Ln(15);
$pdf-> SetFont('Arial','',12);
$pdf-> Cell(156);
$pdf-> Cell(156,5,'Payakumbuh, '. tgl_indo($today) , 0,1,'C');
$pdf-> Ln(3);
$pdf-> Cell(25);
$pdf-> Cell(25,5,'Menyetujui',0,0,'C');
$pdf-> Cell(105);
$pdf-> Cell(160,5,'Mengetahui',0,1,'C');

$pdf-> Cell(25);
$pdf-> Cell(25,5,'Kasubag Tata Usaha',0,0,'C');
$pdf-> Cell(105);
$pdf-> Cell(160,5,'Kepala BPS Kota Payakumbuh',0,1,'C');

$pdf-> Ln(16);

$pdf-> Cell(25);
$pdf-> SetFont('Arial','U',12);
$pdf-> Cell(25,5,'Erni Sulastri, SE',0,0,'C');
$pdf-> Cell(105);
$pdf-> SetFont('Arial','U',12);
$pdf-> Cell(160,5,'Dessi Febriyanti, MA',0,1,'C');
$pdf-> Cell(25);
$pdf-> SetFont('Arial','',12);
$pdf-> Cell(25,5,'NIP. 19660102 199202 2 001',0,0,'C');
$pdf-> Cell(105);
$pdf-> SetFont('Arial','',12);
$pdf-> Cell(160,5,'NIP. 19760207 199712 2 001',0,1,'C');

}

$pdf-> Output();

?>