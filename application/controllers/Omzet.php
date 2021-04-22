<?php
/**
 *
 */
class Omzet extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('omzet_model');
    date_default_timezone_set('Asia/Jakarta');
    if ($this->session->userdata('masuk') == FALSE) {
      redirect('auth');
    }

  }
  public function index()
  {
    $date = date('d-m-Y');
    $data['konten'] = 'omzet_penjualan';
    $data['omzet'] = $this->omzet_model->get_omzet();
    $data['omzet2'] = $this->omzet_model->get_omzet_hari($date);
    $data['omzet3'] = $this->omzet_model->getOmzetUser();
    $data['omzet4'] = $this->omzet_model->getOmzetBooth();
    $data['omzetMenu'] = $this->omzet_model->getOmzetMenu();
    $this->load->view('template', $data);
  }
  public function omzet_by_day()
  {
    $date = $this->input->post('date');
    $data['laporan'] = $this->omzet_model->omzet_by_day($date);
    $data['pelapor'] = $this->omzet_model->omzet_laporan($date);
    $data['total'] = $this->omzet_model->total_omzet($date);
    $data['konten'] = 'omzet_by_day';
    $this->load->view('template', $data);
  }
  public function ubah_omzet()
  {
    $this->omzet_model->ubah_omzet();
    $this->session->set_flashdata('notif', 'berhasil');
    redirect('omzet/omzet_by_day');
  }
}

 ?>
