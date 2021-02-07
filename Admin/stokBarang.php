<section id="main-content">
  <section class="wrapper">


<div class="row ">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-bars"></i> Data Stok Barang</h4>
                <hr>
                
                <br>
                <thead>
                  <?php
                      include "../koneksi.php";
                      $query = mysqli_query($sambungin,"SELECT * FROM tbbarang left join tbkategori on tbbarang.kode_kategori = tbkategori.kode_kategori");

                    ?>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Kode Barang</th>
                    <th class="hidden-phone"><i class="fa fa-building"></i> Nama Barang</th>
                    <th class="hidden-phone"><i class="fa fa-building"></i> Kategori</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Stok Awal</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Stok Kini</th>

                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    while($data = mysqli_fetch_array($query)){
                      //menghitung stok masuk
                      error_reporting(0);
                      $jumlahBarangTerima = "SELECT SUM(jumlah_barang) AS jumlah_barang FROM tbdetail_penerimaan where kode_barang = '$data[kode_barang]'";
                      $hasilBarangMasuk = mysqli_query($sambungin,$jumlahBarangTerima) or die (mysql_error());
                      $barangTerima = mysqli_fetch_array($hasilBarangMasuk);

                      //menghitung stok keluar

                      $jumlahBarangKeluar = "SELECT SUM(jumlah_barang) AS jumlah_barang FROM tbdetail_pengeluaran where kode_barang = '$data[kode_barang]'";
                      $hasilBarangKeluar = mysqli_query($sambungin,$jumlahBarangKeluar) or die (mysql_error());
                      $barangKeluar = mysqli_fetch_array($hasilBarangKeluar);

                  ?>
                  
                  
                    <td class="hidden-phone"><?php echo $data['kode_barang'] ?></td>
                     <td class="hidden-phone"><?php echo $data['nama_barang'] ?></td>
                     <td class="hidden-phone"><?php echo $data['nama_kategori'] ?></td>
                     <td class="hidden-phone"><?php echo $data['stok'] ?></td>
                     <td class="hidden-phone"><?php echo $data['stok'] + $barangTerima['jumlah_barang'] - $barangKeluar['jumlah_barang'] ?></td>
                    <td>
                      
                      <a href="beranda.php?hal=detailStokBarang&kode_barang=<?php echo $data['kode_barang'] ?>" class="btn btn-info btn-xs" ><i class="fa fa-bars">Histori</i></a>
                    </td>
                  </tr>
                  <?php
                }
              ?>
                </tbody>
              </table>

              
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>


</section>
</section>