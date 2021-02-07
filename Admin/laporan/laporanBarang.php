<?php
include "../../koneksi.php";
include "../../fpdf17/fpdf.php";
include "../fungsiTanggal.php";
$today = date('Y-m-d');

$pdf = new FPDF ('P','mm',array(210,297)); // tipe kertas P potrait, L landscape, mm milimeter, 210,297 ukuran kertas
$pdf-> addPage();
$pdf-> Image('C:\xampp\htdocs\Sistem_Inventaris\img\bps.png',12,12,25);
$pdf-> SetFont('Arial','B',14); // tipe font, bold , ukuran font
$pdf-> Cell(60);
$pdf-> Cell(65,10,'Laporan Master Barang', 0,1,'C');
$pdf-> SetFont('Arial','B',14); // tipe font, bold , ukuran font
$pdf-> Cell(60);
$pdf-> Cell(65,3,'Badan Pusat Statistik Kota Payakumbuh', 0,1,'C');
$pdf-> Cell(50);
$pdf-> SetFont('Arial','B',11); // tipe font, bold , ukuran font
$pdf-> Cell(85,15,'Jl. Imam Bonjol, Bulakan Balai Kandih, Kec.Payakumbuh Barat', 0,1,'C');
// garis bawah double
$pdf-> SetLineWidth(1);
$pdf-> Line(10,35,200,35);
$pdf-> SetLineWidth(0);
$pdf-> Line(10,36,200,36);

$pdf-> Ln(5);

//bikin tabel
$pdf-> Cell(2);
$pdf-> SetLineWidth(0.2);
$pdf-> Cell(40,6,'Kode Barang', 1,0,'C');
$pdf-> Cell(40,6,'Nama Barang', 1,0,'C');
$pdf-> Cell(35,6,'Kategori', 1,0,'C');
$pdf-> Cell(45,6,'Lokasi', 1,0,'C');
$pdf-> Cell(25,6,'Stok', 1,0,'C');


$query = mysqli_query($sambungin,"SELECT * FROM tbbarang left join tbkategori on tbbarang.kode_kategori = tbkategori.kode_kategori");
while($data = mysqli_fetch_array($query)){
$pdf-> Ln(6);
$pdf-> SetFont('Arial','',12); // tipe font, bold , ukuran font
$pdf-> Cell(2);
$pdf-> Cell(40,6,$data['kode_barang'], 1,0,'C');
$pdf-> Cell(40,6,$data['nama_barang'], 1,0,'C');
$pdf-> Cell(35,6,$data['nama_kategori'], 1,0,'C');
$pdf-> Cell(45,6,$data['lokasi'], 1,0,'C');
$pdf-> Cell(25,6,$data['stok'], 1,0,'C');
}

{
$pdf-> Cell(10);
$pdf-> Ln(15);
$pdf-> SetFont('Arial','',12);
$pdf-> Cell(100);
$pdf-> Cell(100,5,'Payakumbuh, '. tgl_indo($today) , 0,1,'C');
$pdf-> Ln(5);
$pdf-> Cell(100);
$pdf-> Cell(100,5,'Mengetahui',0,1,'C');
$pdf-> Cell(100);
$pdf-> Cell(100,5,'Kepala BPS Kota Payakumbuh',0,1,'C');
$pdf-> Ln(16);
$pdf-> Cell(100);
$pdf-> SetFont('Arial','U',12);
$pdf-> Cell(100,5,'Dessi Febriyanti, MA',0,1,'C');
$pdf-> Cell(100);
$pdf-> SetFont('Arial','',12);
$pdf-> Cell(100,5,'NIP. 19760207 199712 2 001',0,1,'C');
}

$pdf->Output();



?>