<?php
/**
 *
 */
class Laporan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('laporan_model');
    $this->load->model('home_model');
    date_default_timezone_set('Asia/Jakarta');
    if ($this->session->userdata('masuk') == FALSE) {
      redirect('auth');
    }
  }
    public function add_new_menu()
  {
    $laporan = $this->input->post('laporan');
    $menu = $this->input->post('menu');
    $data = $this->laporan_model->new_menu($laporan, $menu);
    echo json_encode($data);
  }
  public function delete_data_laporan()
  {
    $laporan = $this->input->post('id');
    $this->laporan_model->delete_data_laporan($laporan);
    redirect('laporan/data_laporan');
  }
  public function data_laporan()
  {
    $data['konten'] = 'data_laporan';
    $data['laporan'] = $this->laporan_model->get_laporan_excel_today();
    $data['pelapor'] = $this->laporan_model->get_pelapor_today();
    $data['total'] = $this->laporan_model->get_total();
    $this->load->view('template', $data);
  }
  public function laporan_modif()
  {
    $id = $this->input->post('id_laporan');
    $data['konten'] = 'edit_laporan';
    $data['menu'] = $this->laporan_model->get_modif_menu($id);
    $data['get_laporan'] = $this->laporan_model->get_modif($id);
    $data['laporan'] = $this->laporan_model->get_laporan_modif($id);
    $this->load->view('template', $data);
  }
  public function laporan_detail()
  {
    $data['konten'] = 'laporan_detail';
    $data['laporan'] = $this->laporan_model->get_laporan_detail();
    $this->load->view('template', $data);
  }
  public function data_laporan_total()
  {
    $data['konten'] = 'data_laporan_total';
    $data['laporan'] = $this->laporan_model->get_laporan_excel();
    $data['pelapor'] = $this->laporan_model->get_pelapor();
    $data['total'] = $this->laporan_model->get_total_bulan();
    $this->load->view('template', $data);
  }
  public function laporan_harian()
  {
    $this->home_model->cek_reset();
    $data['konten'] = 'laporan_harian';
    $date = date('d-m-Y');
    $data['time'] = time();
    $user = $this->session->userdata('email');
    $data['laporan'] = $this->laporan_model->jml_laporan($date, $user);
    $data['laporan_unik'] = $this->laporan_model->laporan_unik($date, $user);
    $data['booth'] = $this->laporan_model->cek_booth($date, $user);
    $data['detail'] = $this->laporan_model->detail_laporan($date, $user);
    $data['note'] = $this->laporan_model->get_note($date, $user);
    $data['menu'] = $this->laporan_model->get_menu();
    $this->load->view('template', $data);
  }
  public function add_laporan()
  {
    $date = date('d-m-Y');
    $user = $this->input->post('nama');
    $tempat = $this->input->post('pilih_booth');
    $paket = $this->input->post('paket');
    $this->laporan_model->add_laporan($date, $user, $tempat, $paket);

  }
  public function get_laporan()
  {
    $date = date('d-m-Y');
    $user = $this->session->userdata('email');
    $data = $this->laporan_model->detail_laporan($date, $user);
    echo json_encode($data);
  }
  public function get_sisa()
  {
    $date = date('d-m-Y');
    $user = $this->session->userdata('email');
    $data = $this->laporan_model->detail_sisa($date, $user);
    echo json_encode($data);
  }
  public function get_sisa_modal()
  {
    $id = $this->input->post('id');
    $data = $this->laporan_model->detail_sisa_modal($id);
    echo json_encode($data);
  }
  public function plus()
  {
    $id = $this->input->post('id');
    $lapor = $this->input->post('idl');
    $data = $this->laporan_model->plus($id, $lapor);
    echo json_encode($data);

  }
  public function bonus()
  {
    $id = $this->input->post('id');
    $lapor = $this->input->post('idl');
    $data = $this->laporan_model->bonus($id, $lapor);
    echo json_encode($data);
  }
  public function update_sisa()
  {
    $cup = $this->input->post('cup');
    $id = $this->input->post('id');
    $plastik = $this->input->post('plastik');
    $data = $this->laporan_model->update_sisa($cup, $id, $plastik);
    echo json_encode($data);
  }
  public function export()
  {
    $data['laporan'] = $this->laporan_model->get_laporan_excel();
    $data['pelapor'] = $this->laporan_model->get_pelapor();
    $data['title'] = 'Laporan Penjualan';
    $this->load->view('laporan_excel',$data);
  }
  public function export_today()
  {
    $date = date('d-m-Y');
    $user = $this->session->userdata('email');
    $data['note'] = $this->laporan_model->get_note($date, $user);
    $data['laporan'] = $this->laporan_model->get_laporan_excel_today();
    $data['pelapor'] = $this->laporan_model->get_pelapor_today();
    $data['title'] = 'Laporan Penjualan Hari Ini';
    $this->load->view('laporan_excel_today',$data);
  }
  public function lapor_cuaca()
  {
    $id = $this->input->post('id');
    $cuaca = $this->input->post('laporan');
    $data = $this->laporan_model->lapor_cuaca($id, $cuaca);
    echo json_encode($data);
  }
  public function tutup()
  {
    $id = $this->input->post('id');
    $data = $this->laporan_model->tutup($id);
    echo json_encode($data);
  }
  public function add_notes()
  {
    $id = $this->input->post('id');
    $note = $this->input->post('note');
    $data = $this->laporan_model->add_notes($id, $note);
    echo json_encode($data);
  }
  public function delete_detail()
  {
    $detail = $this->input->post('id_detail');
    $laporan = $this->input->post('id_laporan');
    $id = $this->input->post('id');
    $this->laporan_model->delete_detail($detail, $laporan, $id);
    $this->session->set_flashdata('notif', 'Berhasil Hapus Data !!!');
    redirect('laporan/data_laporan');
  }
  public function delete_detail_bonus()
  {
    $detail = $this->input->post('id_detail');
    $laporan = $this->input->post('id_laporan');
    $id = $this->input->post('id');
    $this->laporan_model->delete_detail_bonus($detail, $laporan, $id);
    $this->session->set_flashdata('notif', 'Berhasil Hapus Data !!!');
    redirect('laporan/data_laporan');
  }
  public function add_modif()
  {
    $menu = $this->input->post('menu');
    $ket = $this->input->post('ket');
    $this->laporan_model->add_modif($menu, $ket);
    $this->session->set_flashdata('notif', 'Berhasil Tambah Data !!!');
    redirect('laporan/data_laporan');
  }

}

 ?>
