<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_divisi extends CI_Controller
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

        redirect('Master_divisi/master/data');
    }
    public function master($param1 = '')
    {
        if ($param1 == '') {
            redirect('Master_divisi/master/data');
        } else if ($param1 == 'data') {
            $page_data['page_sub_name']     =  'data';
            $page_data['title']             = 'Master Divisi';
        }

        $page_data['folder']             = 'divisi';
        $page_data['page_name']          = 'index';
        $page_data['divisi']            = $this->db->get_where('m_divisi', ['status !=' => 99])->result_array();

        $this->load->view('backend/index', $page_data);
    }

    public function post()
    {
        $data = [
            'nama_divisi'  => $this->input->post('nama_divisi'),
            'created_at'    => date("Y-m-d H:i:s"),
            'status'        => 1
        ];
        $this->db->insert('m_divisi', $data);
        $this->session->set_flashdata('message', 'Data Berhasil Di Simpan!');
        redirect('Master_divisi/master/data');
    }

    public function update()
    {
        $id         = $this->input->post('id');
        $divisi    = $this->input->post('nama_divisi');

        $this->db->where('id_divisi', $id);
        $this->db->update('m_divisi', ['nama_divisi' => $divisi]);

        $this->session->set_flashdata('message', 'Data Berhasil Di Update!');
        redirect('Master_divisi/master/data');
    }

    public function delete($id)
    {
        $this->db->where('id_divisi', $id);
        $this->db->update('m_divisi', ['status' => 99]);

        $this->session->set_flashdata('error', 'Data Berhasil Di Hapus!');
        redirect('Master_divisi/master/data');
    }
}
