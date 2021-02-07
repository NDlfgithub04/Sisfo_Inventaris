<?php
include "../koneksi.php";
// nomor otomatis
$query = "SELECT max(kode_departement) as maxKode FROM tbDepartement";
$hasil = mysqli_query($sambungin,$query);
$data = mysqli_fetch_array($hasil);
$kodeDepartement = $data['maxKode'];
$noUrut = (int) substr($kodeDepartement,3,3);
$noUrut ++ ;
$char = "DEP";
$kodeDepartement = $char . sprintf("%03s", $noUrut);
echo $kodeDepartement;





if($_SERVER['REQUEST_METHOD']=="POST"){
	include "../koneksi.php";
		$kode_departement = $_POST['kode_departement'];
    $nama_departement = $_POST['nama_departement'];
    $ext = $_POST['ext'];
    $nama_kasi = $_POST['nama_kasi'];
    

		$simpan = mysqli_query($sambungin,"INSERT INTO tbdepartement VALUES('$kode_departement','$nama_departement','$ext','$nama_kasi')");

			echo "
			  <script>
			  window.alert('Data Departement Berhasil Ditambahkan !!')
			  </script>
			";


			echo "
			  <meta http-equiv='refresh' content = '0; url=?hal=dataDepartement'>
			";


}

?>







<section id="main-content">
<section class="wrapper">
		
<h3><i class="fa fa-bars"></i> Tambah Departement</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-bars"></i> Tambah Departement</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Departement</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="kode_departement" value="<?php echo $kodeDepartement ?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Departement</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_departement" required>
                  </div>
                </div>

                
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">No. Ext</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="ext" required="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kasi</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_kasi" required="">
                  </div>
                </div>







                <div class="form-group">
                  <div class="col-sm-4">
                  	<button class="btn btn-primary" name="">Simpan</button>
                  	<a href="?hal=dataDepartement" class="btn btn-warning">Kembali</a>
                  </div>
                </div>


                
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>


</section>
</section>