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
$pdf-> Cell(155,10,'Laporan Penerimaan Barang', 0,1,'C');
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
$pdf->Cell(50,6,'Tanggal',1,0,'C');
$pdf->Cell(50,6,'Kode Penerimaan',1,0,'C');
$pdf->Cell(50,6,'Nama Barang',1,0,'C');
$pdf->Cell(35,6,'Jumlah',1,0,'C');
$pdf->Cell(50,6,'Nama Penerima',1,0,'C');
$pdf->Cell(40,6,'No. PO',1,0,'C');

$query = mysqli_query($sambungin,"SELECT distinct * FROM tbpenerimaan left join tbdetail_penerimaan on tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima left join tbbarang on tbdetail_penerimaan.kode_barang = tbbarang.kode_barang left join tblogin on tbpenerimaan.id_login = tblogin.id_login where (tbpenerimaan.tanggal_terima BETWEEN '$tgl_awal' AND '$tgl_akhir') GROUP BY tbpenerimaan.kode_terima");
while ($data = mysqli_fetch_array($query)) {

$pdf->Ln(6);
$pdf-> SetFont('Arial','',12); // tipe font, bold , ukuran font
$pdf->Cell(50,6,tgl_indo($data['tanggal_terima']),1,0,'C');
$pdf->Cell(50,6,$data['kode_terima'],1,0,'C');
$pdf->Cell(50,6,$data['nama_barang'],1,0,'C');
$pdf->Cell(35,6,$data['jumlah_barang'],1,0,'C');
$pdf->Cell(50,6,$data['nama_admin'],1,0,'C');
$pdf->Cell(40,6,$data['keterangan'],1,0,'C');
}

{
$pdf-> Cell(10);
$pdf-> Ln(15);
$pdf-> SetFont('Arial','',12);
$pdf-> Cell(160);
$pdf-> Cell(160,5,'Payakumbuh, '. tgl_indo($today) , 0,1,'C');
$pdf-> Ln(5);
$pdf-> Cell(160);
$pdf-> Cell(160,5,'Mengetahui',0,1,'C');
$pdf-> Cell(160);
$pdf-> Cell(160,5,'Kepala BPS Kota Payakumbuh',0,1,'C');
$pdf-> Ln(16);
$pdf-> Cell(160);
$pdf-> SetFont('Arial','U',12);
$pdf-> Cell(160,5,'Dessi Febriyanti, MA',0,1,'C');
$pdf-> Cell(160);
$pdf-> SetFont('Arial','',12);
$pdf-> Cell(160,5,'NIP. 19760207 199712 2 001',0,1,'C');
}

$pdf->Output();

?>