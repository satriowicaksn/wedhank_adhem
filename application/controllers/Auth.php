<?php
/**
 *
 */
class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('auth_model');
    date_default_timezone_set('Asia/Jakarta');
  }
  public function index()
  {
    $this->load->view('login_view');
    if ($this->session->userdata('masuk') == TRUE) {
      redirect('home');
    }
  }
  public function cek_auth()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $cek_staff = $this->auth_model->cek_staff();
    if ($cek_staff->num_rows() > 0) {
      $this->session->set_userdata('masuk', TRUE);
      $this->session->set_userdata('jabatan', 'Admin');
      $this->session->set_userdata('role', '1');
      $this->session->set_userdata('email', $username);
      redirect('home');
    }
    $cek_pegawai = $this->auth_model->cek_pegawai();
    if ($cek_pegawai->num_rows() > 0) {
      $this->session->set_userdata('masuk', TRUE);
      $this->session->set_userdata('jabatan', 'Pegawai');
      $this->session->set_userdata('role', '2');
      $this->session->set_userdata('email', $username);
      redirect('laporan/laporan_harian');
    }
    else {
      $this->session->set_flashdata('notif','<p class="text-white"> <span class="fa fa-warning"></span> username & password do not match !!</p>');
      redirect('auth');
    }
  }
  public function logout()
  {
    session_destroy();
    redirect('auth');
  }
}

 ?>
