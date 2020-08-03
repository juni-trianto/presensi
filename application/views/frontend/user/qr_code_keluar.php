<html>

<head>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="https://schmich.github.io/instascan/style.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>
    <div id="app">

        <div class="sidebar">
            <section class="cameras">
                <h2>Scan Qr Code Untuk Absen Pulang</h2>
                <ul>
                    <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                    <li v-for="camera in cameras">
                        <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
                        <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                            <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
                        </span>
                    </li>
                </ul>
            </section>
            <section class="scans">
                <h2>Scans</h2>
                <ul v-if="scans.length === 0">
                    <li class="empty">No scans yet</li>
                </ul>

                <transition-group name="scans" tag="ul">
                    <!-- <ul v-for="scan in scans" :key="scan.date" :title="scan.content">
                        <li v-if="scan.content" id="hasil"> {{ scan.content }} </li>
                    </ul> -->
                    <form method="post" name="frm_ajax" v-for="scan in scans" :key="scan.date" :title="scan.content">
                        <textarea name="hasil" style="display:none;" type="hidden" id="hasil" cols="30" rows="10" v-if="scan.content">{{ scan.content }}</textarea>
                        <em>Tunggu 5 Detik, Silahkan Klik Cek</em>
                        <button onclick="kirim_form();">Cek</button>
                    </form>
                </transition-group>
            </section>
        </div>
        <div class="preview-container">
            <video id="preview"></video>
        </div>
    </div>
    <script type="text/javascript" src="https://schmich.github.io/instascan/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>



    <script type="text/javascript" src="<?= base_url('assets/notifi'); ?>/jquery.idle.js"></script>


    <script>
        $(document).idle({
            onIdle: function() {
                window.location = "<?= base_url('login_user/logout'); ?>";
                // window.alert("sometext");
            },
            idle: 300000
        });
    </script>

    <script>
        ambilData();

        function ambilData() {
            $.ajax({
                type: 'GET',
                url: '<?= base_url('User/cek') ?>',
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                }
            });
        }

        function kirim_form() {
            var hasil = $('#hasil').val();

            $.ajax({
                url: '<?= base_url('User/cek') ?>',
                type: 'POST',
                dataType: 'html',
                data: 'hasil=' + hasil,
                success: function(data) {
                    console.log(data);
                    if (data != 1) {
                        window.location = "<?= base_url('user/qr_code_keluar') ?>";
                    } else {
                        <?php $this->session->set_userdata(['status_absen_keluar' => 'Oke']); ?>
                        window.location = "<?= base_url('user/absen_keluar') ?>";

                    }
                },
            })
        }
    </script>
</body>

</html>