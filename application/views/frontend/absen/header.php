<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Absensi </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url('assets/webcam/'); ?>/webfont.min.js"></script>


    <style>
        img.tengah {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        #jam-digital {
            overflow: hidden;
            width: 350px
        }

        #hours {
            float: left;
            width: 100px;
            height: 50px;
            background-color: #6B9AB8;
            margin-right: 25px
        }

        #minute {
            float: left;
            width: 100px;
            height: 50px;
            background-color: #A5B1CB
        }

        #second {
            float: right;
            width: 100px;
            height: 50px;
            background-color: #FF618A;
            margin-left: 25px
        }

        #jam-digital p {
            color: #FFF;
            font-size: 36px;
            text-align: center;
            margin-top: 4px
        }
    </style>
    <script type="text/javascript">
        window.setTimeout("waktu()", 1000);

        function waktu() {
            var tanggal = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = tanggal.getHours();
            document.getElementById("menit").innerHTML = tanggal.getMinutes();
            document.getElementById("detik").innerHTML = tanggal.getSeconds();
        }
    </script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['<?= base_url('assets/webcam/'); ?>/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <script type="text/javascript">
        //set timezone
        //buat object date berdasarkan waktu di server
        var serverTime = new Date(2020, 07, 06, 12, 25, 47, 0);
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //hitung selisih
        var Diff = serverTime.getTime() - clientTime.getTime();
        //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
        function displayServerTime() {

            //fungsi untuk mengampilkan hari dan Tanggal
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth();
            var thisDay = date.getDay(),
                thisDay = myDays[thisDay];
            var yy = date.getYear();
            var year = (yy < 1000) ? yy + 1900 : yy;

            //buat object date berdasarkan waktu di client
            var clientTime = new Date();
            //buat object date dengan menghitung selisih waktu client dan server
            var time = new Date(clientTime.getTime() + Diff);
            //ambil nilai jam
            var sh = time.getHours().toString();
            //ambil nilai menit
            var sm = time.getMinutes().toString();
            //ambil nilai detik
            var ss = time.getSeconds().toString();
            //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
            document.getElementById("clock").innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year + ' - ' + (sh.length == 1 ? "0" + sh : sh) + " : " + (sm.length == 1 ? "0" + sm : sm) + " : " + (ss.length == 1 ? "0" + ss : ss);
        }
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/webcam/'); ?>/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/webcam/'); ?>/atlantis2.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?= base_url('assets/webcam/'); ?>/demo.css">
</head>

<body onLoad="waktu()" onload="setInterval('displayServerTime()', 1000);">
    <br><br>
    <div class="wrapper horizontal-layout-3">
        <div class="main-panel">
            <br><br>