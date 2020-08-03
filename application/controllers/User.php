<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
        if(empty($this->session->userdata('username')))
        {
            $this->session->set_flashdata('message', 'Blocked');
            redirect('/');
        }

      
    }

    public function index()
    {
       
        $data['title']  = 'Dashboard E-Presensi';
        $this->load->view('frontend/user/header', $data);
        $this->load->view('frontend/user/v_index');
        $this->load->view('frontend/user/footer');
    }

    public function profil()
    {
        $data['title']   = 'Dashboard E-Presensi';
        $user            =  $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username') ])->row_array();
        $user            = $user['id_karyawan']; 
        $data['record']  =$this->User_model->get_profil_karyawan($user);
        $this->load->view('frontend/user/header', $data);
        $this->load->view('frontend/user/profil', $data);
        $this->load->view('frontend/user/footer');
    }

    public function change_password()
    {
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Konfirm Password', 'required|trim|matches[new_password]');

        if(isset($_POST['submit']) && $this->form_validation->run() != false )
        {
            $user            =  $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array();
            $password        =  $this->db->get_where('tbl_karyawan', ['password' => md5($this->input->post('password')) , 'nomer_id_karyawan' => $this->session->userdata('username') ])->num_rows();
            $new_password    = md5($this->input->post('new_password'));
            
            if($password > '0' )
            {
                $this->db->where('id_karyawan', $user['id_karyawan']);
                $this->db->update('tbl_karyawan', ['password' => $new_password]);

                $this->session->set_flashdata('message', 'Password Berhasil Di Ubah');
                redirect('User/change_password');

            }else{
                $this->session->set_flashdata('error', 'Password Salah');
                redirect('User/change_password');
            }
            
          
        }else{
            $data['title']   = 'Dashboard E-Presensi';
            $this->load->view('frontend/user/header', $data);
            $this->load->view('frontend/user/change_password', $data);
            $this->load->view('frontend/user/footer');
        }
       
    }


    public function qr_code_masuk()
    {
        $data['title']   = 'Qr Code Scanning';
        $this->load->view('frontend/user/header', $data);
        $this->load->view('frontend/user/qr_code_masuk');
    }
    public function qr_code_keluar()
    {
        $data['title']   = 'Qr Code Scanning';
        $this->load->view('frontend/user/header', $data);
        $this->load->view('frontend/user/qr_code_keluar');
    }

    public function cek()
    {
        $params = 'IniTanggalUntukAbsen' . date("Y-m-d");
        $cek = $this->input->post('hasil');

        if ($cek != $params) {
            echo json_encode(0);
        } else {

            echo json_encode(1);
        }
    }


    public function absen_masuk()
    {
        if(empty($this->session->userdata('status_absen_masuk')))
        {
            $this->session->set_flashdata('message', 'Blocked');
            redirect('user');
        }

        $user            =  $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array();
        $user            = $user['id_karyawan'];
        $data['record']  = $this->User_model->get_profil_karyawan($user);
        $data['title']   = 'AbsenMasuk';
        $this->load->view('frontend/absen/header', $data);
        $this->load->view('frontend/user/absen_masuk', $data);
        $this->load->view('frontend/absen/footer');
    }

    public function absen_keluar()
    {
        if (empty($this->session->userdata('status_absen_keluar'))) {
            $this->session->set_flashdata('message', 'Blocked');
            redirect('user');
        }

        $user            =  $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array();
        $user            = $user['id_karyawan'];
        $data['record']  = $this->User_model->get_profil_karyawan($user);
        $data['title']   = 'AbsenMasuk';
        $this->load->view('frontend/absen/header', $data);
        $this->load->view('frontend/user/absen_keluar', $data);
        $this->load->view('frontend/absen/footer');
    }

    public function masuk()
    {

        $user            =  $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array();
        $user            = $user['id_karyawan'];
        $jenis_absen            = $this->input->post('jenis_absen');
        $foto_tamu            = $this->input->post('foto_tamu');

        if ($jenis_absen == '') {
            $result['pesan'] = "Jenis Absen Harus Di Isi!";
        } else {
            $result['pesan'] = "Absen Success!";

            $data = [
                'karyawan_id'           => $user,
                'jenis_absen_masuk'     => $jenis_absen,
                'jam_absen_masuk'       => date("H:i"),
                'gambar_absen_masuk'    =>  $foto_tamu,
                'jam_absen_keluar'      => '',
                'gambar_absen_keluar'   => '',
                'tanggal'               => date("Y-m-d"),
                'keterangan'            => ''
            ];

            $this->db->insert('tbl_absensi', $data);
        }

        echo json_encode($result);
    }

    public function pulang()
    {

        $user                 =  $this->db->get_where('tbl_karyawan', ['nomer_id_karyawan' => $this->session->userdata('username')])->row_array();
        $user                 = $user['id_karyawan'];
        $jenis_absen          = $this->input->post('jenis_absen');
        $foto_tamu            = $this->input->post('foto_tamu');
        $cek                  = $this->User_model->cek();
      
        if ($jenis_absen == '') {
            $result['pesan'] = "Jenis Absen Harus Di Isi!";
        } else {
            $result['pesan'] = "Absen Success!";

            if($cek > 0):

            $data = [
                'jenis_absen_keluar'     => $jenis_absen,
                'jam_absen_keluar'      => date("H:i"),
                'gambar_absen_keluar'   => $foto_tamu,
            ];

            $this->db->where('karyawan_id', $user);
            $this->db->where('tanggal', date("Y-m-d"));
            $this->db->update('tbl_absensi', $data);
        else:
                $data = [
                        'karyawan_id'           => $user,
                        'jenis_absen_keluar'     => $jenis_absen,
                        'jam_absen_masuk'       => '',
                        'gambar_absen_masuk'    =>  '',
                        'jam_absen_keluar'      => date("H:i"),
                        'gambar_absen_keluar'   => $foto_tamu,
                        'tanggal'               => date("Y-m-d"),
                        'keterangan'            => ''
                    ];

                $this->db->insert('tbl_absensi', $data);

        endif;
            
        }

        echo json_encode($result);
    }

    public function simpan_foto()
    {
        $config['upload_path']         = './uploads/';
        $config['allowed_types']     = 'jpeg|jpg|png';
        $config['max_size']         = 10000;
        $config['max_width']         = 10000;
        $config['max_height']          = 10000;
        $config['file_name']         = time() . '.jpg';

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('webcam')) {

            $this->session->set_flashdata('msg', 'Gagal Upload');
            redirect('user/absen_masuk');
        }

        echo ($config['file_name']);
    }


    public function unset()
    {
        unset($_SESSION['status_absen_masuk']);
        unset($_SESSION['status_absen_keluar']);
        redirect('user');
    }

  
}
