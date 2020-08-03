<?php

class Pegawai_model extends CI_Model
{
    
    public function get_all_pegawai()
    {
        return $this->db->query("SELECT * 
                                FROM tbl_karyawan , m_divisi , m_jabatan , users
                                WHERE tbl_karyawan.divisi_id = m_divisi.id_divisi
                                AND tbl_karyawan.jabatan_id = m_jabatan.id_jabatan
                                AND tbl_karyawan.user_id = users.id
                                ORDER BY tbl_karyawan.id_karyawan DESC")->result_array();
    }

    public function get_detail_pegawai($id)
    {
        return $this->db->query("SELECT * 
                                FROM tbl_karyawan , m_divisi , m_jabatan , users
                                WHERE tbl_karyawan.divisi_id = m_divisi.id_divisi
                                AND tbl_karyawan.jabatan_id = m_jabatan.id_jabatan
                                AND tbl_karyawan.user_id = users.id
                                AND tbl_karyawan.id_karyawan = $id
                                ORDER BY tbl_karyawan.id_karyawan DESC")->row_array(); 
    }

}
