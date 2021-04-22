<?php
/**
 *
 */
class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('home_model');
    $this->load->model('omzet_model');
    // $this->load->helper(array('email'));
    // $this->load->library(array('email'));
    date_default_timezone_set('Asia/Jakarta');
    if ($this->session->userdata('masuk') == FALSE) {
      redirect('auth');
    }
  }
  public function tes_day()
  {
    $data['day'] = $this->home_model->tes_day();
    $data['konten'] = 'backup';
    $this->load->view('template', $data);
  }
  public function generate_omset()
  {
    $this->db->select('*');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');
    $get = $this->db->get()->result_array();
    foreach ($get as $key => $val) {
      $data[] = array(
        'id' => $val['id'],
        'harga_menu' => $val['harga_menu'],
        'omset_menu' => $val['harga_menu']*$val['terjual'],
      );
    }

    $cek = $this->db->update_batch('wedhang_laporan_menu', $data, 'id');


  }
  public function coba()
  {
    $data['konten'] = 'coba';
    $this->load->view('template', $data);
  }
  public function index()
  {
    $date = date('d-m-Y');
    // $data['uang'] = $this->home_modal->get_uang();
    $data['total'] = $this->home_model->get_total();
    $data['omzet'] = $this->omzet_model->get_omzet_hari($date);
    $data['menu'] = $this->home_model->get_menu();
    $data['omzet_user'] = $this->omzet_model->get_omzet_user($date);
    $data['dateNow'] = date('d-m-Y');
    $data['allOmzet'] = $this->omzet_model->getAllOmzet();
    $this->home_model->cek_reset();
    $this->home_model->generate_omset();
    $this->home_model->generate_omset_total();
    $data['omzet_semua'] = $this->omzet_model->omzet_semua();
    $data['today'] = $this->home_model->get_today();
    $data['cuaca'] = $this->home_model->get_cuaca_today();
    $data['konten'] = 'dashboard';
    $this->load->view('template', $data);
  }
  public function register_satrio()
{
  $config = [
    'mailtype'  => 'html',
    'charset'   => 'utf-8',
    'protocol'  => 'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_user' => 'senjadisolo@gmail.com',  // Email gmail
    'smtp_pass'   => 'soloindonesia',  // Password gmail
    'smtp_crypto' => 'ssl',
    'smtp_port'   => 465,
    'crlf'    => "\r\n",
    'newline' => "\r\n"
];


    $cek_load = $this->load->library('email', $config);

    $this->email->set_newline("\n\n");

    $this->email->from('senjadisolo@gmail.com', 'Budaya Qita');
    $this->email->to('satriowicaksono076@gmail.com');

    $this->email->subject('Pembelian Berhasil');
    $this->email->message("Terima kasih sudah membeli tiket melalui website kami, Download tiket anda pada halaman Profile.");

    $cek = $this->email->send();
    if ($cek) {
      echo "sukses";
    }else {
      show_error($this->email->print_debugger());
    }
    // redirect('registrasimember');
}
  public function kosong_booth()
  {
    $status = $this->input->post('status');
    $data = $this->home_model->kosong_booth($status);
    echo json_encode($data);
  }
  public function get_booth()
  {
    $date = date('d-m-Y');
    $data = $this->home_model->get_booth($date);
    echo json_encode($data);
  }
  public function get_booth_kosong()
  {
    $date = date('d-m-Y');
    $data = $this->home_model->get_booth_kosong($date);
    echo json_encode($data);
  }
  public function get_booth_modal()
  {
    $id = $this->input->post('id');
    $data = $this->home_model->get_booth_modal($id);
    echo json_encode($data);
  }
  public function add_booth()
  {
    $booth = $this->input->post('booth');
    $date = date('d-m-Y');
    $data = $this->home_model->add_booth($booth, $date);
    echo json_encode($data);
  }
  public function delete_booth()
  {
    $id = $this->input->post('id');
    $data = $this->home_model->delete_booth($id);
    echo json_encode($data);
  }
  public function update_booth()
  {
    $id = $this->input->post('id');
    $booth = $this->input->post('booth');
    $status = $this->input->post('status');
    $data = $this->home_model->update_booth($id, $booth, $status);
    echo json_encode($data);
  }

}

 ?>
