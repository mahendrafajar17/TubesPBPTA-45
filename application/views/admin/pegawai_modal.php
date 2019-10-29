    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="container">
                <form id="formTambah" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select id="level" name="level" class="form-control" required>
                    <option value="" selected disabled>Pilih level</option>
                    <option value="admin">Admin</option>
                    <option value="manajer">Manajer</option>
                    </select>
                </div>
                </form>
            </div>
            </div>
            <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" name="submit" value="tambah" form="formTambah" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
            </div>
        </div>
        </div>
    </div>
    <?php if (isset($result)) { ?>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                <form id="formEdit" method="post">
                    <div class="form-group">
                    <label>Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="<?= $result->username ?>" required>
                    </div>
                    <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?= $result->nama_lengkap ?>" required>
                    </div>
                    <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= $result->email ?>" required>
                    </div>
                    <div class="form-group">
                    <label>Password</label>
                    <input type="text" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label>Level</label>
                    <select id="level" name="level" class="form-control" required>
                        <option value="" disabled>Pilih level</option>
                        <option value="admin" <?php if ($result->level == "admin") echo "selected" ?>>Admin</option>
                        <option value="manajer" <?php if ($result->level == "admin") echo "selected" ?>>Manajer</option>
                    </select>
                    </div>
                </form>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" name="submit" value="edit" form="formEdit" class="btn btn-success">Simpan <i class="fas fa-save"></i></button>
            </div>
            </div>
        </div>
        </div>
    <?php } ?>