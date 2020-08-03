<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pegawai extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->model('Pegawai_model');
        $this->load->library('ion_auth');
        if (empty($this->session->userdata('email'))) {
            $this->session->set_flashdata('message', 'Blocked');
            redirect('/');
        }

    }

    public function index()
    {

        redirect('Data_pegawai/master/data');
    }
    public function master($param1 = '')
    {
        if ($param1 == '') {
            redirect('Data_pegawai/master/data');
        } else if ($param1 == 'data') {
            $page_data['page_sub_name']     =  'data';
            $page_data['title']             = ' Data Pegawai';
        }

        $page_data['folder']             = 'data_pegawai';
        $page_data['page_name']          = 'index';
        $page_data['database']           = $this->Pegawai_model->get_all_pegawai();

        $this->load->view('backend/index', $page_data);
    }

    public function detail($id)
    {
        $page_data['page_sub_name']      = 'detail';
        $page_data['title']              = 'Detail Data Pegawai';

        $page_data['folder']             = 'data_pegawai';
        $page_data['page_name']          = 'index';
        $page_data['database']           =  $this->Pegawai_model->get_detail_pegawai($id);
      

        $this->load->view('backend/index', $page_data);
    }

    public function aktifkan($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->update('tbl_karyawan', ['status_karyawan' => 1]);

        $this->session->set_flashdata('message', 'Data Pegawai Berhasil Di Aktifkan!');
        redirect('data_pegawai/detail/' . $id);
    }
    public function nonaktifkan($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->update('tbl_karyawan', ['status_karyawan' => 99]);

        $this->session->set_flashdata('error', 'Data Pegawai Berhasil Di NonAktifkan!');
        redirect('data_pegawai/detail/' . $id);
    }

    public function delete($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->delete('tbl_karyawan');

        $this->session->set_flashdata('error', 'Data Pegawai Berhasil Di Hapus!');
        redirect('Data_pegawai/master/data');
    }


    

}