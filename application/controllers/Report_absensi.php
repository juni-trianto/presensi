<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Report_absensi_model');
        $this->load->library('ion_auth');
        if (empty($this->session->userdata('email'))) {
            $this->session->set_flashdata('message', 'Blocked');
            redirect('/');
        }
    }

    public function index()
    {

        redirect('Report_absensi/master/data');
    }
    public function master($param1 = '')
    {
        if ($param1 == '') {
            redirect('Report_absensi/master/data');
        } else if ($param1 == 'data') {
            $page_data['page_sub_name']     =  'data';
            $page_data['title']             = ' Report Absensi Pegawai';
        }

        $page_data['folder']             = 'report_absen';
        $page_data['page_name']          = 'index';
        $page_data['bulanan']            = $this->Report_absensi_model->get_absensi_bulan();
       

        $this->load->view('backend/index', $page_data);
    }

    public function detail($id)
    {
        $page_data['bulan']             = $this->uri->segment(3);
        $page_data['page_sub_name']     =  'detail_bulanan';
        $page_data['title']             = ' Report Absensi Pegawai';
        $page_data['folder']            = 'report_absen';
        $page_data['page_name']         = 'index';
        $page_data['detail']            = $this->Report_absensi_model->get_detail_bulan($id);
     


        $this->load->view('backend/index', $page_data);
    }

    public function detail_karyawan_perbulan()
    {
        $bulan      = $this->uri->segment(3);
        $karyawan   = $this->uri->segment(4);
        $page_data['bulan']             = $bulan;
        $page_data['page_sub_name']     =  'detail_karyawan_bulanan';
        $page_data['title']             = ' Report Absensi Pegawai';
        $page_data['folder']            = 'report_absen';
        $page_data['page_name']         = 'index';
        $page_data['database']            = $this->Report_absensi_model->get_detail_karyawan_bulan($bulan, $karyawan);
        if(empty($page_data['database'])){
            redirect('Report_absensi/master/data');
        }

        $this->load->view('backend/index', $page_data);

    }

    public function delete()
    {
        $bulan      = $this->uri->segment(3);
        $karyawan   = $this->uri->segment(4);
        $param1     = $this->uri->segment(5);

        $database   = $this->db->get_where('tbl_absensi', ['id_absensi' => $param1 ])->row_array();

        if ($database['gambar_absen_masuk'] != "default.jpg" || $database['gambar_absen_keluar'] != "default.jpg" ) {
            $filename = explode(".", $database['gambar_absen_masuk'])[0];
            array_map('unlink', glob(FCPATH . "./uploads/$filename.*"));

            $filename = explode(".", $database['gambar_absen_keluar'])[0];
            array_map('unlink', glob(FCPATH . "./uploads/$filename.*"));

            $this->db->where('id_absensi', $param1);
            $this->db->delete('tbl_absensi');


            $this->session->set_flashdata('error', 'Data berhasil di hapus');
            redirect('Report_absensi/detail_karyawan_perbulan/' . $bulan .'/' . $karyawan );
        }
    }



    public function pdf()
    {
      

        $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
        $data = $this->load->view('cetak/detail_report_admin_pdf', [], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function excel()
    {
        $bulan        = $this->uri->segment(3);
        $karyawan     = $this->uri->segment(4);

        $title = $this->db->get_where('tbl_karyawan', ['id_karyawan' => $karyawan])->row_array();
        $title = $title['nama_karyawan'];
        $data['bulan'] = $bulan ;
        $data['user'] = $title;
        $data['detail'] = $this->Report_absensi_model->get_report_detail($bulan,  $karyawan);
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$title.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

   

        $this->load->view('cetak/detail_report_admin', $data);


    }
  
}
