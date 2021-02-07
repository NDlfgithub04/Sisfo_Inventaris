<?php
include "../../koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($sambungin,"DELETE FROM tbsementara where id = '$id'") or die (mysql_error());

echo "
		<meta http-equiv='refresh' content = '0; url=../beranda.php?hal=tambahPenerimaan'>
	 ";

?>