<?php
if (empty($this->session->userdata('username'))) {
    redirect('login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/animate.css">

    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/aos.css">

    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url(); ?>ui/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>user/index">Stars<small>Coffee</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="<?= base_url(); ?>user/home" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="<?= base_url(); ?>user/home/katalog" class="nav-link">Menu</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="room.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="<?= base_url(); ?>user/home/mytrans">Transaksiku</a>
                        </div>
                    </li>
                    <li class="nav-item cart"><a href="<?= base_url(); ?>user/home/cart" class="nav-link"><span class="icon icon-shopping_cart"></span></a></li>
                    <li class="nav-item cart"><a href="<?= base_url(); ?>login/logout" class="nav-link"><span class="icon icon-power-off"></span></a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->