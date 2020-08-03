<?php
$bulan        = $this->uri->segment(3);
$karyawan     = $this->uri->segment(4);

$data         = $this->db->query('SELECT * FROM `tbl_absensi` , `tbl_karyawan` WHERE MONTH(tanggal) = "' . $bulan . '" AND tbl_absensi.karyawan_id = tbl_karyawan.id_karyawan   AND karyawan_id = "' . $karyawan . '" ')->result_array();


foreach($data as $nama){}
?>


<table border="1" style="font-size: 12px;">
    <thead>
        <tr>
            <th>Nama</th>
            <th> : </th>
            <th colspan="6"> <?= $nama['nama_karyawan']; ?> </th>
        </tr>
        <tr>
            <th>Bulan</th>
            <th> : </th>
            <th colspan="6">
                <?php if ($bulan == 1) {
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
            </th>
        </tr>
        <tr style="text-align:center">
            <td style="background-color:green; color:white;">No</td>
            <td style="background-color:green; color:white;">Nama</td>
            <td style="background-color:green; color:white;">Tanggal</td>
            <td style="background-color:aqua; color:black;">Jenis Absen Masuk</td>
            <td style="background-color:aqua; color:black;">Jam Absen Masuk</td>
            <td style="background-color:blue; color:white;">Jenis Absen Pulang</td>
            <td style="background-color:blue; color:white;">Jam Absen Pulang</td>
            <td style="background-color:green; color:white;">Keterangan</td>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1;
        foreach ($data as $row) :
        ?>
            <tr style="text-align: center;">
                <td><?= $no++; ?></td>
                <td><?= $row['nama_karyawan'] ?></td>
                <td><?= date('d F Y', strtotime($row['tanggal'])); ?></td>
                <td><?= $row['jenis_absen_masuk'] ?></td>
                <td><?= $row['jam_absen_masuk']; ?></td>
                <td><?= $row['jenis_absen_keluar'] ?></td>
                <td><?= $row['jam_absen_keluar']; ?></td>
                <td></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>