<?php
/**
 *
 */
class Home_model extends CI_Model
{
  public function generate_omset()
  {
    $date = date('Y-m-d');
    $this->db->select('*');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');

    $get = $this->db->get()->result_array();

    foreach ($get as $key => $val) {
      if ($val['tanggal_date'] == $date) {
        $data[] = array(
          'id' => $val['id'],
          'harga_menu' => $val['harga_menu'],
          'omset_menu' => $val['harga_menu']*$val['terjual'],
        );
        $cek = $this->db->update_batch('wedhang_laporan_menu', $data, 'id');
      }

    }




  }
  public function generate_omset_total()
  {
    $date = date('Y-m-d');
    $this->db->select_sum('omset_menu');
    $this->db->select('wedhang_laporan.id_laporan');
    $this->db->select('wedhang_laporan.tanggal_date');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->group_by('wedhang_laporan_menu.id_laporan');
    $get = $this->db->get()->result_array();
    foreach ($get as $key => $val) {
      if ($val['tanggal_date'] == $date) {
        $data[] = array(
          'id_laporan' => $val['id_laporan'],
          'omzet_total' => $val['omset_menu'],
        );
        $cek = $this->db->update_batch('wedhang_laporan', $data, 'id_laporan');
      }

    }


  }

  public function get_menu()
  {
    return $this->db->get('wedhang_menu')->result();
  }
  public function tes_day()
  {
    $this->db->select('*, DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal_date');
    $this->db->from('tb_laporan');
    return $this->db->get()->result();
  }
  public function cek_reset()
  {
    $now = date('Y-m-d');
    $kosong = 'kosong';
    $this->db->select('*');
    $this->db->from('wedhang_reset');
    $this->db->limit(1);
    $get = $this->db->get()->result();

    foreach ($get as $g) {
      $cek = $g->reset_day;
      if ($cek != $now) {
        $this->db->query("UPDATE wedhang_reset SET reset_day = '$now'");
        $this->db->query("UPDATE wedhang_booth SET status_booth = '$kosong'");
      }
    }

  }
    public function get_cuaca_today()
  {
    $date = date('d-m-Y');
    $this->db->select('*');
    $this->db->from('wedhang_laporan_cuaca');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan_cuaca.cuaca_booth');
    $this->db->where('date_cuaca', $date);
    $this->db->order_by('time_cuaca', 'desc');
    return $this->db->get()->result();
  }
  public function kosong_booth($status)
  {
      $this->db->query("UPDATE wedhang_booth SET status_booth = '$status'");
  }
  public function get_today()
  {
    $date = date('d-m-Y');
    $this->db->select('wedhang_laporan_menu.id_menu');
    $this->db->select_sum('terjual');
    $this->db->select_sum('omset_menu');
    $this->db->select_sum('wedhang_laporan_menu.harga_menu');
    $this->db->select_sum('bonus');
    $this->db->select_sum('sisa_cup');
    $this->db->select_sum('sisa_plastik');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->select('wedhang_menu.nama_menu');
    $this->db->where('wedhang_laporan.tanggal', $date);
    return $this->db->get()->result();
  }
  public function get_total()
  {
    $this->db->select('wedhang_laporan_menu.id_menu');
    $this->db->select_sum('terjual');
    $this->db->select_sum('bonus');
    $this->db->select_sum('sisa_cup');
    $this->db->select_sum('sisa_plastik');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->select('wedhang_menu.nama_menu');
    return $this->db->get()->result();

  }
  public function get_booth($date)
  {
    return $this->db->query("SELECT * FROM wedhang_booth")->result();
  }
  public function get_booth_kosong($date)
  {
    $status = 'kosong';
    return $this->db->query("SELECT * FROM wedhang_booth WHERE status_booth = '$status'")->result();
  }
  public function get_booth_modal($id)
  {
    $get = $this->db->query("SELECT * FROM wedhang_booth WHERE id_booth = '$id'")->result();
    foreach ($get as $g) {
      $data = array(
        'id_booth' => $g->id_booth,
        'nama_booth' => $g->nama_booth,
        'status_booth' => $g->status_booth,
      );
    }
    return $data;
  }
  public function add_booth($booth, $date)
  {
    $status = 'kosong';
    $data = array(
      'nama_booth' => $booth,
      'tanggal_booth' => $date,
      'status_booth' => $status,
    );
    $this->db->insert('wedhang_booth', $data);
  }
  public function delete_booth($id)
  {
    $this->db->query("DELETE FROM wedhang_booth WHERE id_booth = '$id'");
  }
  public function update_booth($id, $booth, $status)
  {
    $this->db->query("UPDATE wedhang_booth SET nama_booth = '$booth', status_booth = '$status' WHERE id_booth = '$id'");
  }

}

 ?>
