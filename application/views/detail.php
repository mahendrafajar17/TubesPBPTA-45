    <div class="container mt-2 mb-0">
        <!-- Bagian konten disini -->
        <div class="row">
            <div class="col-md-12 text-center">
            <h1><?= $result->nama?></h1> <!-- Nama barang yang dimaksud -->
            </div>
        </div>
    </div>

    <div class="container" id="content">
        <div class="row">
            <div class="col-5">
                <img class="img-fluid image_profil" src="<?= base_url($result->file_gambar)?>" style="display: block; ml-0; mr: auto; width: 450px; height: 330px;" alt="Responsive image">
                <!-- <div class="text-center">coba sjaa</div> -->
            </div>
            <div class = "col-7">
                Kategori : <?= $result->nama_kategori?><br>
                Deskripsi:<br>
                <?= $result->deskripsi?>
            </div>
        </div>
    </div>