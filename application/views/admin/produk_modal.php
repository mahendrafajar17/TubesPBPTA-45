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
                        <form id="formTambah" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" id="deskripsi" name="deskripsi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" class="form-control" required>
                                    <option value="">Pilih kategori</option>
<?php foreach($kategori->result() as $row){?>
                                    <option value="<?= $row->id_kategori?>"><?= $row->nama?></option>
<?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Kategori</label>
                                <select name="id_sub_kategori" class="form-control" required>
                                    <option value="">Pilih sub kategori</option>
<?php foreach($sub_kategori->result() as $row){?>
                                    <option value="<?= $row->id_sub_kategori?>"><?= $row->nama?></option>
<?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>File Gambar</label>
                                <input type="file" id="file_gambar" name="file_gambar" class="form-control" required>
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
                            <form id="formEdit" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="<?= $result->nama?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" id="deskripsi" name="deskripsi" class="form-control" value="<?= $result->deskripsi?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="id_kategori" class="form-control" required>
                                        <option value="" selected disabled>Pilih kategori</option>
<?php foreach($kategori->result() as $row){?>
                                        <option value="<?= $row->id_kategori?>" <?php if($result->id_kategori == $row->id_kategori) echo "selected"?>><?= $row->nama?></option>
<?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sub Kategori</label>
                                    <select name="id_sub_kategori" class="form-control" required>
                                        <option value="">Pilih sub kategori</option>
<?php foreach($sub_kategori->result() as $row){?>
                                        <option value="<?= $row->id_sub_kategori?>" <?php if($result->id_sub_kategori == $row->id_sub_kategori) echo "selected"?>><?= $row->nama?></option>
<?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>File Gambar</label>
                                    <input type="file" id="file_gambar" name="file_gambar" class="form-control">
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