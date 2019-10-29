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
                <form method="post">
                    <div class="form-group">
                        <label for="">Password Baru</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-footer small text-muted"></div>
            </div>
        </div>
        <!-- /.container-fluid -->