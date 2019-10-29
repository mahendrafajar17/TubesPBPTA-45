    <script>
        <?php if (isset($result)) { ?>
        $("#editModal").modal();
        <?php
        } ?>

        tampilkanData();

        function tampilkanData() {
        $("#data").empty();
        $.ajax({
            type: "get",
            url: "<?= base_url("ajax/sub_kategori/data") ?>",
            dataType: "json",
            success: function(response) {
            $i = 1;
            $.each(response, function(index, value) {
                $tr = $("<tr>").append(
                $("<td>").text($i),
                $("<td>").text(value.nama),
                $("<td><a href='<?= base_url("admin/sub_kategori/") ?>" + value.id_sub_kategori + "' class='btn btn-warning text-light'><i class='fas fa-pen'></i></a><button class='btn btn-danger' onclick='hapus(" + value.id_sub_kategori + ")'><i class='fas fa-trash'></i></button>")
                );
                $i++;
                $("#data").append($tr);
            });
            $("#tabel").DataTable();
            }
        });
        }

        function hapus(id_sub_kategori){
        $.ajax({
            type: "post",
            url: "<?= base_url("ajax/sub_kategori/hapus")?>",
            data: {id_sub_kategori: id_sub_kategori},
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
            $("<div class='login100-form m-t-16 alert alert-success'>").text("Sub Kategori berhasil dihapus").delay(3000).slideUp(300, function() {
            $(this).alert('close');
            })
        )
        }

        function errorMessage(){
        $("#message").append(
            $("<div class='login100-form m-t-16 alert alert-danger'>").text("Sub kategori gagal dihapus").delay(3000).slideUp(300, function() {
            $(this).alert('close');
            })
        )
        }
    </script>
