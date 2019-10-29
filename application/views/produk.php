    <div class="container mt-3 mb-3">
        <!-- Bagian konten disini -->
        <div class="row">
            <h2>Produk</h2>
        </div>
        <br>
        <form method="get">
            <div class="row">
                <div class="col-md-5">
                    <input name="nama" type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <select name="id_kategori" class="form-control">
                        <option value="" selected disabled>Pilih kategori</option>
<?php foreach($kategori->result() as $row){?>
                        <option value="<?= $row->id_kategori?>"><?= $row->nama?></option>
<?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="id_sub_kategori" class="form-control">
                        <option value="" selected disabled>Pilih sub kategori</option>
<?php foreach($sub_kategori->result() as $row){?>
                        <option value="<?= $row->id_sub_kategori?>"><?= $row->nama?></option>
<?php } ?>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                </div>
            </div>
        </form>
        <div class="row">
            <hr width="100%">
<?php foreach($result as $row){?>
            <div class="col-xl-4 col-sm-12 mt-3">
                <div class="card category shadow-sm">
                    <img class="card-img-top" src="<?= base_url($row->file_gambar)?>" height="225px" style="object-fit: cover;">
                    <div class="card-body border-1">
                        <h5 class="card-title"><?= $row->nama?></h5>
                        <h6><?= $row->nama_kategori?></h6>
                        <p class="card-text"><?= $row->deskripsi?></p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="<?= base_url("produk/detail/" . $row->id_produk)?>" class="btn btn-outline-primary">Lihat Detail</a>
                        <!-- <span class="harga">Rp <?= number_format($row->harga,0,",",".")?></span> -->
                    </div>
                </div>
            </div>
<?php }?>
        </div>
    </div>