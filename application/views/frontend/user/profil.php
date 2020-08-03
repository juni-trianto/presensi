<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <div class="card" style="padding:20px;">
            <div class="card-header">
                <b> Profile Pegawai</b>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col s12 m6 l4">
                        <img src="<?= base_url('assets/image/'); ?>nama.png" class="responsive-img tengah">
                    </div>
                    <div class="col s12 m6 l8 card hoverable" style="padding: 10px;">
                        <table class="striped">
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
                </div>
            </div>
            <a href="<?= base_url('user'); ?>" class="waves-effect waves-light btn">BACK</a>
        </div>
    </div>
</div>