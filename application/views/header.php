<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- base_url() memanggil alamat website/lokasi -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/css/custom.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/font-awesome/css/all.css">
    <title><?= $title?></title>
    <style>
        .container>.row>h2,
        a {
            text-align: center;
            align-content: center;
            /* padding-left: 20px; */
            margin: auto;
            display: inline-block;
            /* background-color: dodgerblue; */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 20px;
            padding: 5px;
        }

        .container>.row>p {
            margin: auto;
            text-align: center;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url()?>">TA-45</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url()?>produk">Produk <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url()?>tentang_kami">Tentang Kami</a>
                    </li>
                </ul>
            </div>
    </nav>
