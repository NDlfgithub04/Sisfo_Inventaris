<?php
	include "../../koneksi.php";
	$kode_departement = $_GET['kode_departement'];
	$query = mysqli_query($sambungin,"DELETE FROM tbdepartement where kode_departement='$kode_departement'") or die (mysql_error());

	echo "
		<meta http-equiv='refresh' content = '0; url=../beranda.php?hal=dataDepartement'>
	  ";
?>