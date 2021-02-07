<section id="main-content">
  <section class="wrapper">


<div class="row ">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-tags"></i> Data kategori</h4>
                <hr>
                <div class="text-center">
                  <a href="?hal=tambahKategori" class="btn btn-primary"> Tambah Kategori </a>
                </div>
                <br>
                <thead>
                  <?php
                      include "../koneksi.php";
                      $query = mysqli_query($sambungin,"SELECT * FROM tbkategori");

                    ?>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Kode kategori</th>
                    <th class="hidden-phone"><i class="fa fa-building"></i> Nama Kategori</th>

                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                    while($data = mysqli_fetch_array($query)){
                  ?>
                  
                  
                    <td class="hidden-phone"><?php echo $data['kode_kategori'] ?></td>
                     <td class="hidden-phone"><?php echo $data['nama_kategori'] ?></td>
                    <td>
                      <a href="beranda.php?hal=ubahKategori&kode_kategori=<?php echo $data['kode_kategori'] ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="dataKategori/hapusKategori.php?kode_kategori=<?php echo $data['kode_kategori'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin akan dihapus?')"><i class="fa fa-trash-o "></i></a>
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