<div class="container-fluid">
    <div class="card" style="padding: 10px;">
        <em><b>Data Semua Pegawai</b></em><br><br>
        <div class="col-md-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PEGAWAI</th>
                        <th>GENDER</th>
                        <th>PHONE</th>
                        <th>JABATAN</th>
                        <th>DIVISI</th>
                        <th>INFO</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($database as $row) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama_karyawan']; ?></td>
                            <td><?= $row['jenis_kelamin']; ?></td>
                            <td><?= $row['no_hp']; ?></td>
                            <td><?= $row['nama_jabatan']; ?></td>
                            <td><?= $row['nama_divisi']; ?></td>
                            <td>
                                <?php if ($row['status_karyawan'] != 99) : ?>
                                    <a href="<?= base_url('data_pegawai/detail/') . $row['id_karyawan'] ?>" class="btn btn-info btn-sm">DETAIL</a>
                                <?php else : ?>
                                    <a href="<?= base_url('data_pegawai/detail/') . $row['id_karyawan'] ?>" class="btn btn-danger btn-sm">DETAIL</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PEGAWAI</th>
                        <th>GENDER</th>
                        <th>PHONE</th>
                        <th>JABATAN</th>
                        <th>DIVISI</th>
                        <th>INFO</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>