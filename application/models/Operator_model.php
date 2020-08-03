<?php

class Operator_model extends CI_Model
{
    public function login($no_id, $password)
    {
        $chek =   $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $no_id, 'password' => md5($password) , 'status_karyawan !=' => 99 ]);
        if ($chek->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
 
}
