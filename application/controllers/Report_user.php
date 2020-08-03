<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Mpdf\Mpdf;

class Report_user extends CI_Controller
{
   public function __construct()
   {
       parent:: __construct();
       $this->load->model('Report_laporan_karyawan_model', 'report');
   }

    public function index()
    {
        $data['record'] = $this->report->get_report_karyawan();
        $data['title']  = 'Dashboard E-Presensi';
        $this->load->view('frontend/user/header', $data);
        $this->load->view('frontend/user/report_user', $data);
        $this->load->view('frontend/user/footer');
    }

    public function detail($id)
    {
        $data['bulan']  = $this->uri->segment(3);
        $data['detail'] = $this->report->get_report_detail($id);
        $data['title']  = 'Dashboard E-Presensi';
        $this->load->view('frontend/user/header', $data);
        $this->load->view('frontend/user/detail_report_user', $data);
        $this->load->view('frontend/user/footer');
    }

    public function excel()
    {
        $id = $this->uri->segment(3);
        $title = $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array();
        $title = $title['nama_karyawan'];
        $data['user'] = $title;
        $data['bulan'] = $id ;
        $data['detail'] = $this->report->get_report_detail($id);
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$title.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('cetak/detail_report_user', $data);


    }

    public function pdf()
    {
      

        $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
        $data = $this->load->view('cetak/detail_report_user_pdf', [], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
      

    }

}
        