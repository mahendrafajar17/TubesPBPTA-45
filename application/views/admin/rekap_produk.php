      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= base_url("admin/dashboard")?>dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Produk</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header"><i class="fas fa-table"></i> Rekap Produk</div>
          <div class="card-body">
            <div id="message">
<?php if(isset($error)){?>
              <div class="login100-form m-t-16 alert alert-danger" role="alert"><?= $error?></div>
<?php }
if(isset($success)){?>
              <div class="login100-form m-t-16 alert alert-success" role="alert"><?= $success?></div>
<?php } ?>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                <!-- edited table-->
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Sub Kategori</th>
                    <th>Produk</th>
                  </tr>
                </thead>
                <tbody id="data">
<?php
$i = 1;
$currentKategori = "";
$currentSubKategori = "";
foreach($result as $row){?>
                  <tr>
                    <td><?= $i?></td>
<?php
  if($currentKategori != $row["nama_kategori"]){
    $currentKategori = $row["nama_kategori"];?>
                    <td rowspan="<?= $row["count_kategori"]?>"><?= $row["nama_kategori"]?></td>
<?php 
  }
  if($currentSubKategori != $row["nama_sub_kategori"]){
    $currentSubKategori = $row["nama_sub_kategori"];?>
                    <td rowspan="<?= $row["count_sub_kategori"]?>"><?= $row["nama_sub_kategori"]?></td>
<?php
  }?>
                    <td><?= $row["nama"]?></td>
                  </tr>
<?php 
$i++;
} ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>
      </div>
      <!-- /.container-fluid -->