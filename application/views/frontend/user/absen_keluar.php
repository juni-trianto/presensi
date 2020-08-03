<div class="container mt--5">
    <div class="page-inner mt--3">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-light">
                    <div class="card-body curves-shadow">
                        <h2><b>ABSEN PULANG</b> | TANGGAL = <?= date('d F Y', strtotime(date('Y-m-d'))); ?> | Status = <?= $this->session->userdata('status_absen_keluar');  ?></h2>
                        </h2>

                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="info-text text-center">
                                    <div id="jam-digital">
                                        <div id="hours">
                                            <p id="jam"></p>
                                        </div>
                                        <div id="minute">
                                            <p id="menit"></p>
                                        </div>
                                        <div id="second">
                                            <p id="detik"></p>
                                        </div>
                                    </div>
                                </h1>
                                <hr />
                            </div>
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <th>NAMA</th>
                                        <th><?= $record['nama_karyawan'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>NIK</th>
                                        <th><?= $record['nik'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>NO ID</th>
                                        <th><?= $record['nomer_id_karyawan'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>PHONE</th>
                                        <th><?= $record['no_hp'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>ALAMAT LENGKAP</th>
                                        <th><?= $record['alamat_lengkap'] ?></th>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <th>DOMISILI</th>
                                        <th><?= $record['domisili'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>JABATAN</th>
                                        <th><?= $record['nama_jabatan'] ?></th>
                                    </tr>
                                    <tr>
                                        <th>DIVISI</th>
                                        <th><?= $record['nama_divisi'] ?></th>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <em><b>Foto Selfi Untuk Absen Masuk</b></em>
                                <?php echo form_open('', array('id' => 'form')); ?>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">Pilih Jenis Absen</label><br>
                                        <select class="custom-select my-1 mr-sm-2" name="jenis_absen" id="jenis_absen">
                                            <option value="">-Pilih Jenis Absen</option>
                                            <option value="Pulang">Pulang</option>
                                            <option value="Lembur">Lembur</option>
                                        </select>
                                    </div>
                                    <!-- Form Untuk Menampilkan Kamera -->
                                    <label id="camera">Ambil Gambar :</label>
                                    <div id="webcam">
                                        <input type="button" class="label-input-file btn btn-primary" onClick="preview()" value="Ambil Gambar" />
                                    </div>
                                    <div id="simpan" style="display:none">
                                        <input type="button" class="label-input-file btn btn-danger" onClick="batal()" value="Hapus" />
                                    </div>
                                    <div id="hasil"></div>
                                    <!-- Form Akhir Kamera -->
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>

                    </div>
                    <div class="card-action">
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-4">
                                <button class="btn btl-label btn-success" onClick="simpan()" type="button"><i class="far fa-save"></i> Simpan</button>

                                <a href="<?= base_url('user/unset') ?>" class="btn btl-label btn-warning">BACK</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>



<script src="<?= base_url('assets/backend/') ?>assets/vendor/jquery/dist/jquery.min.js"></script>



<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="<?= base_url('assets/webcam'); ?>/demo.js"></script>
<script src="<?= base_url('assets/webcam'); ?>/webcam.min.js"></script>
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





<!-- Koding JS untuk Kmera -->
<script language="Javascript">
    // konfigursi webcam
    Webcam.set({
        width: 270,
        height: 200,
        image_format: 'jpg',
        jpeg_quality: 100
    });
    Webcam.attach('#camera');

    function preview() {
        // untuk preview gambar sebelum di upload
        Webcam.freeze();
        // ganti display webcam menjadi none dan simpan menjadi terlihat
        document.getElementById('webcam').style.display = 'none';
        document.getElementById('simpan').style.display = '';
    }

    function batal() {
        // batal preview
        Webcam.unfreeze();

        // ganti display webcam dan simpan seperti semula
        document.getElementById('webcam').style.display = '';
        document.getElementById('simpan').style.display = 'none';
    }

    function simpan() {
        // ambil foto
        Webcam.snap(function(data_uri) {
            confirm('Absen!');

            // upload foto
            Webcam.upload(data_uri, '<?= base_url('user'); ?>/simpan_foto', function(code, text) {

                //fungsi unntuk mengambil data dalam form
                var jenis_absen = $('#jenis_absen').val();
                var foto_tamu = text;
                //fungsi untuk menyimpan data dengan menggunakan ajax
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('user'); ?>/pulang',
                    data: {

                        jenis_absen: jenis_absen,
                        foto_tamu: foto_tamu
                    },
                    //redirect ketika fungsi berhasil di lakukan
                    success: function(data) {
                        // alert(text);
                        var res = JSON.parse(data);
                        console.log(res.pesan);
                        if (res.pesan != "Data Berhasil Di Simpan !") {
                            //Notify ERROR
                            console.log(res.pesan);
                            $.notify(res.pesan, "warning");
                        } else {
                            //Notify ERROR
                            console.log(res.pesan);
                            $.notify(res.pesan, "warning");
                            //akhir dari redirect

                            //fungsi untuk mengembalikan nilai kosong pada form
                            $('#jenis_absen').val('');

                        }
                    },
                });
                // }
            });
            Webcam.unfreeze();

            document.getElementById('webcam').style.display = '';
            document.getElementById('simpan').style.display = 'none';
        });
    }
</script>