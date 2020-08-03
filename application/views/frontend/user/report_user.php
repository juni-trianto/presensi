<?php
$user = $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array();
?>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12">
                <div class="card hoverable" style="padding: 15px;">
                    <blockquote>
                        Report Absensi <b><?= $user['nama_karyawan']; ?></b>
                    </blockquote>
                    <table class="striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Detail</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1;
                            foreach ($record as $row) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <b>
                                            <?php if ($row['bulan'] == 1) {
                                                echo 'Januari';
                                            } elseif ($row['bulan'] == 2) {
                                                echo 'Februari';
                                            } elseif ($row['bulan'] == 3) {
                                                echo 'Maret';
                                            } elseif ($row['bulan'] == 4) {
                                                echo 'April';
                                            } elseif ($row['bulan'] == 5) {
                                                echo 'Mei';
                                            } elseif ($row['bulan'] == 6) {
                                                echo 'Juni';
                                            } elseif ($row['bulan'] == 7) {
                                                echo 'Juli';
                                            } elseif ($row['bulan'] == 8) {
                                                echo 'Agustus';
                                            } elseif ($row['bulan'] == 9) {
                                                echo 'September';
                                            } elseif ($row['bulan'] == 10) {
                                                echo 'Oktober';
                                            } elseif ($row['bulan'] == 11) {
                                                echo 'Novemer';
                                            } elseif ($row['bulan'] == 12) {
                                                echo 'Desember';
                                            }

                                            ?>
                                        </b>
                                    </td>
                                    <td><a href="<?= base_url('report_user/detail/') . $row['bulan']; ?>" class="btn btn-primary">Detail</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>