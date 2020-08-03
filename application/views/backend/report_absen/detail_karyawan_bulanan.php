<?php foreach ($database as $nama) {
} ?>
<div class="container-fluid">
    <a href="<?= base_url('Report_absensi/detail/') . $bulan; ?>" class="btn btn-secondary">Back</a>
    <a href="<?= base_url('Report_absensi/pdf/') . $bulan . '/' . $nama['karyawan_id']; ?>" class="btn btn-danger" target="_blank">Print PDF</a>
    <a href="<?= base_url('Report_absensi/excel/') . $bulan . '/' . $nama['karyawan_id']; ?>" class="btn btn-success">EXCEL</a>

    <br><br>
    <div class="card" style="padding: 10px;">
        <em><b> Data Absensi <?= $nama['nama_karyawan']; ?> </b></em><br><br>
        <div class="col-md-12">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jenis Absen Masuk</th>
                        <th>Jam Absen Masuk</th>
                        <th>Image Absen Masuk</th>
                        <th>Jenis Absen Pulang</th>
                        <th>Jam Absen Pulang</th>
                        <th>Image Absen Pulang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($database as $row) : ?>
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
                            <td><a href="<?= base_url('Report_absensi/delete/') . $bulan . '/' . $row['karyawan_id'] . '/' . $row['id_absensi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data!')">Delete</a></td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>

            </table>
        </div>
    </div>
</div>