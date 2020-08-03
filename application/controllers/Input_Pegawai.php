<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->library('ion_auth');
        if (empty($this->session->userdata('email'))) {
            $this->session->set_flashdata('message', 'Blocked');
            redirect('/');
        }

    }

    public function index()
    {

        redirect('Input_Pegawai/master/data');
    }
    public function master($param1 = '')
    {
        if ($param1 == '') {
            redirect('Input_Pegawai/master/data');
        } else if ($param1 == 'data') {
            $page_data['page_sub_name']     =  'data';
            $page_data['title']             = 'Input Data Pegawai';
        }

        $page_data['folder']             = 'input_pegawai';
        $page_data['page_name']          = 'index';

        $this->load->view('backend/index', $page_data);
    }

    public function post_data()
    {   

        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
        $this->form_validation->set_rules('alamat_lengkap', 'Alamat Lengkap', 'trim|required');
        $this->form_validation->set_rules('domisili', 'Domisili', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
        $this->form_validation->set_rules('no_id', 'NO Id', 'trim|required');

        if(isset($_POST['submit']) && $this->form_validation->run() != false ){

            $user  = $this->db->get_where('users', ['email' => $this->session->userdata('email') ])->row_array();
            $no_id = $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->input->post('no_id') ])->num_rows();
            if($no_id > 0 ){


                $this->session->set_flashdata('error', 'Data Di tolak! No ID Sudah Ada');
                redirect('Input_Pegawai/master/data');

            }else{
                $data = [
                    'nama_karyawan'         => $this->input->post('nama_karyawan'),
                    'nik'                   => $this->input->post('nik'),
                    'alamat_lengkap'        => $this->input->post('alamat_lengkap'),
                    'domisili'              => $this->input->post('domisili'),
                    'no_hp'                 => $this->input->post('phone'),
                    'jenis_kelamin'         => $this->input->post('jenis_kelamin'),
                    'nomer_id_karyawan'     => $this->input->post('no_id'),
                    'password'              => md5(123456),
                    'jabatan_id'            => $this->input->post('jabatan'),
                    'divisi_id'             => $this->input->post('divisi'),
                    'status_karyawan'       => 1,
                    'created_at'            => date("Y-m-d H:i:s"),
                    'user_id'               => $user['id']
                ];

                $this->db->insert('tbl_karyawan', $data);

                $this->session->set_flashdata('message', 'Data Karyawan Berhasil Di Simpan!');
                redirect('Input_Pegawai/master/data');
            }
           
        }else{

            $page_data['page_sub_name']     =  'data';
            $page_data['title']             = 'Input Data Pegawai';
            $page_data['folder']             = 'input_pegawai';
            $page_data['page_name']          = 'index';
    
            $this->load->view('backend/index', $page_data);
        }


    }

    public function update_data_pegawai()
    {
        $user  = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $id   = $this->input->post('id');
        $data = [
            'nama_karyawan'         => $this->input->post('nama_karyawan'),
            'nik'                   => $this->input->post('nik'),
            'alamat_lengkap'        => $this->input->post('alamat_lengkap'),
            'domisili'              => $this->input->post('domisili'),
            'no_hp'                 => $this->input->post('phone'),
            'jenis_kelamin'         => $this->input->post('jenis_kelamin'),
            'nomer_id_karyawan'     => $this->input->post('no_id'),
            'password'              => md5(123456),
            'jabatan_id'            => $this->input->post('jabatan'),
            'divisi_id'             => $this->input->post('divisi'),
            'status_karyawan'       => 1,
            'created_at'            => date("Y-m-d H:i:s"),
            'user_id'               => $user['id']
        ];

        $this->db->where('id_karyawan', $id);
        $this->db->update('tbl_karyawan', $data);

        $this->session->set_flashdata('message', 'Data Karyawan Berhasil Di Update!');
        redirect('data_pegawai/detail/'. $id);
    }


}