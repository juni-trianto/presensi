<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        if (empty($this->session->userdata('email'))) {
            $this->session->set_flashdata('message', 'Blocked');
            redirect('/');
        }
    }


    public function index()
    {

        redirect('Master_jabatan/master/data');
    }
    public function master($param1 = '')
    {
        if ($param1 == '') {
            redirect('Master_jabatan/master/data');
        } else if ($param1 == 'data') {
            $page_data['page_sub_name']     =  'data';
            $page_data['title']             = 'Master Jabatan';
        }

        $page_data['folder']             = 'jabatan';
        $page_data['page_name']          = 'index';
        $page_data['jabatan']            = $this->db->get_where('m_jabatan', ['status !=' => 99 ])->result_array();

        $this->load->view('backend/index', $page_data);
    }

    public function post()
    {
        $data = [
            'nama_jabatan'  => $this->input->post('nama_jabatan'),
            'created_at'    => date("Y-m-d H:i:s"),
            'status'        => 1
        ];
        $this->db->insert('m_jabatan', $data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Simpan!');
        redirect('Master_jabatan/master/data');
    }

    public function update()
    {
        $id         = $this->input->post('id');
        $jabatan    = $this->input->post('nama_jabatan');

        $this->db->where('id_jabatan', $id);
        $this->db->update('m_jabatan', ['nama_jabatan' => $jabatan ]);

        $this->session->set_flashdata('message', 'Data Berhasil Di Update!');
        redirect('Master_jabatan/master/data');
    }

    public function delete($id)
    {
        $this->db->where('id_jabatan', $id);
        $this->db->update('m_jabatan', ['status' => 99 ]);

        $this->session->set_flashdata('error', 'Data Berhasil Di Hapus!');
        redirect('Master_jabatan/master/data');
    }
}
