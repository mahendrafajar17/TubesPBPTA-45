      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="<?= base_url("admin/dashboard")?>dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Sub Kategori</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header"><i class="fas fa-table"></i> Tabel Sub Kategori</div>
          <div class="card-body">
            <div id="message">
<?php if(isset($error)){?>
              <div class="login100-form m-t-16 alert alert-danger" role="alert"><?= $error?></div>
<?php }
if(isset($success)){?>
              <div class="login100-form m-t-16 alert alert-success" role="alert"><?= $success?></div>
<?php } ?>
            </div>
            <button class="btn btn-success mb-3" data-toggle="modal" data-target="#tambahModal">Tambah <i class="fas fa-pen"></i></button>
            <div class="table-responsive">
              <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
                <!-- edited table-->
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Sub Kategori</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="data">
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>
      </div>
      <!-- /.container-fluid -->