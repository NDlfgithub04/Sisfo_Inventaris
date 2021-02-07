<?php
include "../koneksi.php";

$kode_departement = $_GET['kode_departement'];




if($_SERVER['REQUEST_METHOD']=="POST"){
	include "../koneksi.php";
		$kode_departement = $_POST['kode_departement'];
    $nama_departement = $_POST['nama_departement'];
    $ext = $_POST['ext'];
    $nama_kasi = $_POST['nama_kasi'];
    

		$simpan = mysqli_query($sambungin,"UPDATE tbdepartement SET nama_departement='$nama_departement', ext='$ext', nama_kasi = '$nama_kasi' where kode_departement = '$kode_departement'");

			echo "
			  <script>
			  window.alert('Data Departement Berhasil Diubah !!')
			  </script>
			";


			echo "
			  <meta http-equiv='refresh' content = '0; url=?hal=dataDepartement'>
			";


}

?>







<section id="main-content">
<section class="wrapper">
		
<h3><i class="fa fa-bars"></i> Ubah Departement</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <?php
        $query = mysqli_query($sambungin,"SELECT * FROM tbdepartement where kode_departement = '$kode_departement'");
        while ($data = mysqli_fetch_array($query)){

        ?>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-bars"></i> Ubah Departement</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Departement</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="kode_departement" value="<?php echo $kode_departement ?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Departement</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_departement" value="<?php echo $data['nama_departement']?>">
                  </div>
                </div>

                
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">No. Ext</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="ext" value="<?php echo $data['ext']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Kasi</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_kasi" value="<?php echo $data['nama_kasi']?>">
                  </div>
                </div>

               






                <div class="form-group">
                  <div class="col-sm-4">
                  	<button class="btn btn-primary" name="">Simpan</button>
                  	<a href="?hal=dataDepartement" class="btn btn-warning">Kembali</a>
                  </div>
                </div>


                
              </form>
              <?php
                }
               ?>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>


</section>
</section>