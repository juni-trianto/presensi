<?php $user = $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title><?= $title; ?></title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?= base_url('assets/frontend/assets/'); ?>css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="<?= base_url('assets/frontend/assets/'); ?>css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    

    <style>
        img.tengah {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        

 </style>
</head>

<body onLoad="waktu()" style="background-color: rgb(242, 242, 242); background-image: url('<?= base_url('assets/image/'); ?>gambar1.png');">

    <ul id="dropdown1" class="dropdown-content">
        <li><a href="<?= base_url('user/change_password') ?>">Change Password</a></li>
        <li><a href="<?= base_url('login_user/logout') ?>">Log Out</a></li>

    </ul>
    <nav>
        <div class="nav-wrapper blue ">
            <div class="container">
                <a href="<?= base_url('user'); ?>" class="brand-logo">E-Presensi</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><?= $user['nama_karyawan']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
        <li><a href="<?= base_url('user/change_password') ?>">Change Password</a></li>
        <li><a href="<?= base_url('login_user/logout') ?>">Log Out</a></li>
    </ul>