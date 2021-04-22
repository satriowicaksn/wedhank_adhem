<?php
/**
 *
 */
class Pegawai extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('pegawai_model');
    date_default_timezone_set('Asia/Jakarta');
    if ($this->session->userdata('masuk') == FALSE) {
      redirect('auth');
    }
    
  }
  public function index()
  {
    $data['konten'] = 'data_pegawai';
    $this->load->view('template', $data);
  }
  public function get_pegawai()
  {
    $data = $this->pegawai_model->get_pegawai();
    echo json_encode($data);
  }
  public function get_pegawai_modal()
  {
    $id = $this->input->post('id');
    $data = $this->pegawai_model->get_pegawai_modal($id);
    echo json_encode($data);
  }
  public function add_pegawai()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $role = $this->input->post('role');
    $data = $this->pegawai_model->add_pegawai($username, $password, $role);
    echo json_encode($data);
  }
  public function update_pegawai()
  {
    $id = $this->input->post('id');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $role = $this->input->post('role');
    $data = $this->pegawai_model->update_pegawai($username, $password, $role, $id);
    echo json_encode($data);
  }
  public function delete_pegawai()
  {
    $id = $this->input->post('id');
    $data = $this->pegawai_model->delete_pegawai($id);
    echo json_encode($data);
  }
}

 ?>
