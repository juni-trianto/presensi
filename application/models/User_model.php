<?php

class User_model extends CI_Model
{
  
    public function __construct()
    {
        parent:: __construct();
        date_default_timezone_set('Asia/Jakarta');

    }

    public function get_profil_karyawan($user)
    {
        return $this->db->query("SELECT * FROM tbl_karyawan , m_jabatan , m_divisi WHERE tbl_karyawan.jabatan_id = m_jabatan.id_jabatan AND tbl_karyawan.divisi_id = m_divisi.id_divisi AND id_karyawan = $user")->row_array();
    }



    public function cek()
    {    $user            =  $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array();
        $cek = $this->db->query('SELECT * FROM `tbl_absensi` WHERE tanggal = "'. date("Y-m-d"). '" AND jam_absen_keluar = "" AND karyawan_id = "'.$user['id_karyawan'].'" ')->num_rows();
        if($cek > 0 )
        {
            return 1 ;
        }else{
            return 0 ;
        }
    }

}
