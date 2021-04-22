<?php
/**
 *
 */
class Menu extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('menu_model');
    date_default_timezone_set('Asia/Jakarta');
    if ($this->session->userdata('masuk') == FALSE) {
      redirect('auth');
    }
    if ($this->session->userdata('role') == '2') {
      redirect('laporan/laporan_harian');
    }
  }
  public function index()
  {
    $data['konten'] = 'data_menu';
    $this->load->view('template', $data);
  }
  public function get_menu()
  {
    $data = $this->menu_model->get_menu();
    echo json_encode($data);
  }
  public function add_menu()
  {
    $menu = $this->input->post('menu');
    $harga = $this->input->post('harga');
    $data = $this->menu_model->add_menu($menu,$harga);
    echo json_encode($data);
  }
  public function delete_menu()
  {
    $id = $this->input->post('id');
    $data = $this->menu_model->delete_menu($id);
    echo json_encode($data);
  }
  public function get_menu_modal()
  {
    $id = $this->input->post('id');
    $data = $this->menu_model->get_menu_modal($id);
    echo json_encode($data);
  }
  public function update_menu()
  {
    $id = $this->input->post('id');
    $menu = $this->input->post('menu');
    $harga = $this->input->post('harga');
    $data = $this->menu_model->update_menu($id, $menu, $harga);
    echo json_encode($data);
  }
}

 ?>
