<div class="container-fluid">
    <a href="<?= base_url('Report_absensi/master/data'); ?>" class="btn btn-secondary">Back</a> <br><br>

    <div class="card" style="padding: 10px;">
        <em>
            Report Absensi <b> Bulan
                <?php
                if ($bulan == 1) {
                    echo 'Januari';
                } elseif ($bulan == 2) {
                    echo 'Februari';
                }
                elseif ($bulan == 3) {
                    echo 'Maret';
                }
                elseif ($bulan == 4) {
                    echo 'April';
                }
                elseif ($bulan == 5) {
                    echo 'Mei';
                }
                elseif ($bulan == 6) {
                    echo 'Juni';
                }
                elseif ($bulan == 7) {
                    echo 'Juli';
                }
                elseif ($bulan == 8) {
                    echo 'Agustus';
                }
                elseif ($bulan == 9) {
                    echo 'September';
                }
                elseif ($bulan == 10) {
                    echo 'Oktober';
                }
                elseif ($bulan == 11) {
                    echo 'Novemer';
                }
                elseif ($bulan == 12) {
                    echo 'Desember';
                }

                ?>
            </b>
        </em><br><br>
        <div class="col-md-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($detail as $get) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $get['nama_karyawan']; ?></td>
                            <td>
                                <a href="<?= base_url('Report_absensi/detail_karyawan_perbulan/') . $bulan . '/' . $get['karyawan_id']; ?>" class="btn btn-info">Info</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Detail</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>