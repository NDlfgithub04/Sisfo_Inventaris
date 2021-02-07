<?php
	include "../../koneksi.php";
	$kode_keluar = $_GET['kode_keluar'];
	$hapusTabelPengeluaran = mysqli_query($sambungin,"DELETE FROM tbpengeluaran where kode_keluar='$kode_keluar'") or die (mysql_error());
		if ($hapusTabelPengeluaran){
			$hapusTabelDetailPengeluaran = mysqli_query($sambungin,"DELETE FROM tbdetail_pengeluaran where kode_keluar = '$kode_keluar' ");
		}

	echo "
		<meta http-equiv='refresh' content = '0; url=../beranda.php?hal=dataPengeluaran'>
	  ";
?>