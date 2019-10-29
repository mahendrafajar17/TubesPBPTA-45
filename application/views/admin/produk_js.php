    <script>
        <?php if (isset($result)) { ?>
            $("#editModal").modal();
        <?php }?>
        tampilkanData();
        function tampilkanData() {
            $("#data").empty();
            $.ajax({
                type: "get",
                url: "<?= base_url("ajax/produk/data") ?>",
                dataType: "json",
                success: function(response) {
                $i = 1;
                $.each(response, function(index, value) {
                    $tr = $("<tr>").append(
                    $("<td>").text($i),
                    $("<td>").text(value.nama),
                    $("<td>").text(value.deskripsi),
                    $("<td>").text(value.nama_kategori),
                    $("<td>").text(value.nama_sub_kategori),
                    $("<td><img src='<?= base_url()?>"+value.file_gambar+"' width='200' height='200' style='object-fit: cover;'>"),
                    $("<td>").text(value.last_update),
                    $("<td>").text(value.nama_lengkap),
                    $("<td><a href='<?= base_url("admin/produk/") ?>" + value.id_produk + "' class='btn btn-warning text-light'><i class='fas fa-pen'></i></a><button class='btn btn-danger' onclick='hapus(" + value.id_produk + ")'><i class='fas fa-trash'></i></button>")
                    );
                    $i++;
                    $("#data").append($tr);
                });
                $("#tabel").DataTable();
                }
            });
        }

        function hapus(id_produk){
            $.ajax({
                type: "post",
                url: "<?= base_url("ajax/produk/hapus")?>",
                data: {id_produk: id_produk},
                dataType: "json",
                success: function (response) {
                    if(response.status == "success") successMessage();
                    else errorMessage();
                    tampilkanData();
                }
            });
        }

        $(".alert").delay(3000).slideUp(300, function() {
            $(this).alert('close');
        });

        function successMessage(){
        $("#message").append(
            $("<div class='login100-form m-t-16 alert alert-success'>").text("Produk berhasil dihapus").delay(3000).slideUp(300, function() {
                $(this).alert('close');
                })
            )
        }

        function errorMessage(){
            $("#message").append(
                $("<div class='login100-form m-t-16 alert alert-danger'>").text("Produk gagal dihapus").delay(3000).slideUp(300, function() {
                $(this).alert('close');
                })
            )
        }
    </script>