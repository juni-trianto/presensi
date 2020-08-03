<?php
$user = $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array();
?>
<div class="section no-pad-bot" id="index-banner">
    <div>
        <div class="row">
            <div class="col s12 m6 l12">
                <div class="card" style="padding: 10px;">

                    <blockquote>
                        Absensi Bulan <b> <?php if ($bulan == 1) {
                                                echo 'Januari';
                                            } elseif ($bulan == 2) {
                                                echo 'Februari';
                                            } elseif ($bulan == 3) {
                                                echo 'Maret';
                                            } elseif ($bulan == 4) {
                                                echo 'April';
                                            } elseif ($bulan == 5) {
                                                echo 'Mei';
                                            } elseif ($bulan == 6) {
                                                echo 'Juni';
                                            } elseif ($bulan == 7) {
                                                echo 'Juli';
                                            } elseif ($bulan == 8) {
                                                echo 'Agustus';
                                            } elseif ($bulan == 9) {
                                                echo 'September';
                                            } elseif ($bulan == 10) {
                                                echo 'Oktober';
                                            } elseif ($bulan == 11) {
                                                echo 'Novemer';
                                            } elseif ($bulan == 12) {
                                                echo 'Desember';
                                            }

                                            ?></b>
                        , <?= $user['nama_karyawan']; ?>
                    </blockquote>
                    <a href="<?= base_url('report_user/excel/') . $this->uri->segment(3); ?>" style="color:white; padding:10px; margin:5px; background-color: green;"> Downlod Excel </a>
                    <a href="<?= base_url('report_user/pdf/') . $this->uri->segment(3); ?>" style="color:white; padding:10px; margin:5px; background-color: red;" target="_blank"> Downlod PDF </a>
                    <a href="<?= base_url('user') ?>" style="color:white; padding:10px; margin:5px; background-color: blue;"> Back </a>
                    <table class="striped responsive-table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Tanggal</td>
                                <td>Jenis Absen Masuk</td>
                                <td>Jam Absen Masuk</td>
                                <td>Image Absen Masuk</td>
                                <td>Jenis Absen Pulang</td>
                                <td>Jam Absen Pulang</td>
                                <td>Image Absen Pulang</td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1;
                            foreach ($detail as $row) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['nama_karyawan'] ?></td>
                                    <td><?= date('d F Y', strtotime($row['tanggal'])); ?></td>
                                    <td><?= $row['jenis_absen_masuk'] ?></td>
                                    <td><?= $row['jam_absen_masuk']; ?></td>
                                    <td><?php if (!empty($row['gambar_absen_masuk'])) : ?>
                                            <img src="<?= base_url('uploads/') . $row['gambar_absen_masuk'] ?>" class="materialboxed" width="50">
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $row['jenis_absen_keluar'] ?></td>

                                    <td><?= $row['jam_absen_keluar']; ?></td>
                                    <td>
                                        <?php if (!empty($row['gambar_absen_keluar'])) : ?>
                                            <img src="<?= base_url('uploads/') . $row['gambar_absen_keluar'] ?>" class="materialboxed" width="50">
                                        <?php endif; ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>