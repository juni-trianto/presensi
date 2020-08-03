<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Operator_model');
    }
  
    public function index()
    {
    
        $this->form_validation->set_rules('no_id', 'NO ID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if(isset($_POST['submit']) && $this->form_validation->run() != false)
        {
         
            $no_id    = $this->input->post('no_id');
            $password = $this->input->post('password');

            $chek = $this->Operator_model->login($no_id, $password);
            if ($chek == 1) {
            
                $this->session->set_userdata(['status_login' => 'oke', 'username' => $no_id]);
                $this->session->set_flashdata('message', 'Log In Success');
                redirect('user');
            } else {
                $this->session->set_flashdata('error', 'Kombinasi NO ID Dan Password Salah');
                redirect('Login_user');
            }

        }else{

            $this->load->view('frontend/login');
        }

    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['status_absen_masuk']);
        unset($_SESSION['status_absen_keluar']);
        $this->session->set_flashdata('message', 'Log Out Success Full');
        redirect('Login_user');
    }
}
