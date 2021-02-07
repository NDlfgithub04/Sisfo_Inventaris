<?php
	function tgl_indo($tanggal){
		$bulan = array(
			1 => 'januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'juni',
			'juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember',

		);

		// 0 = tanggal
		// 1 = bulan
		// 2 = tahun
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan [0];

}

?>