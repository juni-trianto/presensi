<?php

class Report_laporan_karyawan_model extends CI_Model
{

    public function get_report_karyawan()
    {
        $user            =  $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array();
        return $this->db->query('SELECT MONTH(tanggal) AS bulan FROM tbl_absensi WHERE karyawan_id = "'.$user['id_karyawan'].'" GROUP BY MONTH(tanggal)')->result_array();
    }

    public function get_report_detail($id)
    {
        $user            =  $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array();
        return $this->db->query('SELECT * FROM `tbl_absensi` , `tbl_karyawan` WHERE MONTH(tanggal) = "'. $id. '" AND tbl_absensi.karyawan_id = tbl_karyawan.id_karyawan   AND karyawan_id = "'.$user['id_karyawan'].'" ')->result_array();
    }
}
