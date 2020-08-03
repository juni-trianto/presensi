<div class="container-fluid">
    <div class="card" style="padding: 10px;">
        <em><b>Report Absensi Perbulan</b></em><br><br>
        <div class="col-md-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Bulan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($bulanan as $row) : ?>
                        <td><?= $no++; ?></td>
                        <td>
                            <b>
                                <?php if ($row['bulan'] == 1) {
                                    echo 'Januari';
                                } elseif ($row['bulan'] == 2) {
                                    echo 'Februari';
                                }
                                elseif ($row['bulan'] == 3) {
                                    echo 'Maret';
                                }
                                elseif ($row['bulan'] == 4) {
                                    echo 'April';
                                }
                                elseif ($row['bulan'] == 5) {
                                    echo 'Mei';
                                }
                                elseif ($row['bulan'] == 6) {
                                    echo 'Juni';
                                }
                                elseif ($row['bulan'] == 7) {
                                    echo 'Juli';
                                }
                                elseif ($row['bulan'] == 8) {
                                    echo 'Agustus';
                                }
                                elseif ($row['bulan'] == 9) {
                                    echo 'September';
                                }
                                elseif ($row['bulan'] == 10) {
                                    echo 'Oktober';
                                }
                                elseif ($row['bulan'] == 11) {
                                    echo 'Novemer';
                                }
                                elseif ($row['bulan'] == 12) {
                                    echo 'Desember';
                                }

                                ?>
                            </b>
                        </td>
                        <td><a href="<?= base_url('Report_absensi/detail/') . $row['bulan']; ?>" class="btn btn-primary">Detail</a></td>

                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>Bulan</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>