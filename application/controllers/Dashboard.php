<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->library('ion_auth');

        if(empty($this->session->userdata('email'))){
            $this->session->set_flashdata('message', 'Blocked');
            redirect('/');
        }
    }

 
    public function index()
    {
        $page_data['title']     = 'Dashboard';
        $page_data['folder']    = 'dashboard';
        $page_data['page_name'] = 'v_index';
        
        $this->load->view('backend/index', $page_data);
    }
}
