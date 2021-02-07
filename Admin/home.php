<?php
include "../koneksi.php";

$departement = mysqli_query($sambungin,"SELECT nama_departement , SUM(jumlah_barang) As total from tbpenerimaan left join tbdetail_penerimaan on tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima left join tbdepartement on tbpenerimaan.kode_departement = tbdepartement.kode_departement Group By nama_departement")
?>

<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>GRAFIK PENERIMAAN BARANG</h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
                
              </ul>

              <?php
              	while($data = mysqli_fetch_array($departement)){ 
              ?>
              <div class="bar">
                <div class="title"><?php echo $data['nama_departement'] ?></div>
                <div class="value tooltips" data-original-title="<?php echo $data['total'] ?>" data-toggle="tooltip" data-placement="top"><?php echo $data['total'] * 10 ?></div>
              </div>
            <?php
        	}
            ?>
        	
        </div>
        
        	
        </div>
      </section>
    </section>


<?php
include "../koneksi.php";

    $departement = mysqli_query($sambungin,"SELECT nama_departement , SUM(jumlah_barang) As total from tbpengeluaran left join tbdetail_pengeluaran on tbpengeluaran.kode_keluar = tbdetail_pengeluaran.kode_keluar left join tbdepartement on tbpengeluaran.kode_departement = tbdepartement.kode_departement Group By nama_departement")
?>

<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>GRAFIK PENGELUARAN BARANG</h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">
                
              </ul>

              <?php
              	while($data = mysqli_fetch_array($departement)){ 
              ?>
              <div class="bar">
                <div class="title"><?php echo $data['nama_departement'] ?></div>
                <div class="value tooltips" data-original-title="<?php echo $data['total'] ?>" data-toggle="tooltip" data-placement="top"><?php echo $data['total'] * 10 ?></div>
              </div>
            <?php
        	}
            ?>
        	
        </div>
        
        	
        </div>
      </section>
    </section>