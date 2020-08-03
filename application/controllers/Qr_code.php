<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Qr_code extends CI_Controller
{

   public function __construct()
   {
      parent:: __construct();
      $this->load->library('ion_auth');
      if (empty($this->session->userdata('email'))) {
         $this->session->set_flashdata('message', 'Blocked');
         redirect('/');
      }
   }

   public function index()
   {


        $this->load->library('ciqrcode');

        $this->load->library('ciqrcode');

        $params['data'] = 'IniTanggalUntukAbsen' . date("Y-m-d");
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . 'assets/qrcode/absen.png';
        $this->ciqrcode->generate($params);

       $this->load->view('backend/absen/qr_code');
    
   }



  
}
