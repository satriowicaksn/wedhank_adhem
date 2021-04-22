<?php
/**
 *
 */
class Rekap extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model('rekap_model');
    if ($this->session->userdata('masuk') == FALSE) {
      redirect('auth');
    }
    if ($this->session->userdata('masuk') == TRUE) {
      if ($this->session->userdata('role') != 1) {
        redirect('laporan/laporan_harian');
      }
    }
  }
  public function index()
  {
    $data['konten'] = 'rekap_penjualan';
    $this->load->view('template', $data);
  }
  public function test()
  {
    $this->load->view('template_2');
  }
  public function rekaphari()
  {
    $awal = $this->input->post('awal');
    $akhir = $this->input->post('akhir');
    $data['konten'] = 'rekap_penjualan_result';
    $data['rekap'] = $this->rekap_model->rekaphari($awal, $akhir);
    $data['rekap_pelapor'] = $this->rekap_model->rekappelapor($awal, $akhir);
    $data['awal_export'] = $awal;
    $data['akhir_export'] = $akhir;
    $this->load->view('template', $data);
  }
  public function rekapbulan()
  {
    $awal = $this->input->post('awal');
    $akhir = $this->input->post('akhir');
    $data['konten'] = 'rekap_penjualan_result';
    $data['rekap'] = $this->rekap_model->rekapbulan($awal, $akhir);
    $this->load->view('template_2', $data);
  }
  public function export()
  {
    $awal = $this->input->post('awal_export');
    $akhir = $this->input->post('akhir_export');
    $data['title'] = 'Rekap Penjualan Wedhang Adhem';
    $data['konten'] = 'rekap_penjualan_result';
    $data['rekap'] = $this->rekap_model->rekaphari($awal, $akhir);
    $data['rekap_pelapor'] = $this->rekap_model->rekappelapor($awal, $akhir);
    $data['awal_export'] = $awal;
    $data['akhir_export'] = $akhir;
    $data['a_export'] = $this->rekap_model->convert_hari_awal($awal);
    $data['b_export'] = $this->rekap_model->convert_hari_akhir($akhir);
    $this->load->view('export_rekap', $data);
  }


}

 ?>
