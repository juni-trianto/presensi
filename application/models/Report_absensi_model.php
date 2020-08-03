<?php

class Report_absensi_model extends CI_Model
{

    public function get_absensi_bulan()
    {
        return $this->db->query('SELECT MONTH(tanggal) AS bulan FROM tbl_absensi GROUP BY MONTH(tanggal)')->result_array();
    }

    public function get_detail_bulan($id)
    {
        return $this->db->query("SELECT DISTINCT tbl_karyawan.nama_karyawan ,  tbl_absensi.karyawan_id FROM tbl_karyawan, tbl_absensi WHERE MONTH(tanggal) = $id AND tbl_karyawan.id_karyawan = tbl_absensi.karyawan_id ")->result_array();
    }

    public function get_detail_karyawan_bulan($bulan, $karyawan)
    {
        return $this->db->query("SELECT * FROM `tbl_absensi`, `tbl_karyawan` WHERE tbl_karyawan.id_karyawan = tbl_absensi.karyawan_id AND karyawan_id = $karyawan AND MONTH(tanggal) = $bulan ")->result_array();
    }

    public function get_report_detail($bulan , $karyawan)
    {
        return $this->db->query('SELECT * FROM `tbl_absensi` , `tbl_karyawan` WHERE MONTH(tanggal) = "' . $bulan . '" AND tbl_absensi.karyawan_id = tbl_karyawan.id_karyawan   AND karyawan_id = "' . $karyawan . '" ')->result_array();
    }
   
}
