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
                url: "<?= base_url("ajax/kategori/data") ?>",
                dataType: "json",
                success: function(response) {
                    $i = 1;
                    $.each(response, function(index, value) {
                        $tr = $("<tr>").append(
                            $("<td>").text($i),
                            $("<td>").text(value.nama),
                            $("<td><a href='<?= base_url("admin/kategori/") ?>" + value.id_kategori + "' class='btn btn-warning text-light'><i class='fas fa-pen'></i></a><button class='btn btn-danger' onclick='hapus(" + value.id_kategori + ")'><i class='fas fa-trash'></i></button>")
                        );
                        $i++;
                        $("#data").append($tr);
                    });
                    $("#tabel").DataTable();
                }
            });
        }

        function hapus(id_kategori) {
            $.ajax({
                type: "post",
                url: "<?= base_url("ajax/kategori/hapus") ?>",
                data: {
                    id_kategori: id_kategori
                },
                dataType: "json",
                success: function(response) {
                    if (response.status == "success") successMessage();
                    else errorMessage();
                    tampilkanData();
                }
            });
        }

        $(".alert").delay(3000).slideUp(300, function() {
            $(this).alert('close');
        });

        function successMessage() {
            $("#message").append(
                $("<div class='login100-form m-t-16 alert alert-success'>").text("Pegawai berhasil dihapus").delay(3000).slideUp(300, function() {
                    $(this).alert('close');
                })
            )
        }

        function errorMessage() {
            $("#message").append(
                $("<div class='login100-form m-t-16 alert alert-danger'>").text("Pegawai gagal dihapus").delay(3000).slideUp(300, function() {
                    $(this).alert('close');
                })
            )
        }
    </script>