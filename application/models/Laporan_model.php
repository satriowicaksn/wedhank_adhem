<?php
/**
 *
 */
class Laporan_model extends CI_Model
{
    public function new_menu($laporan, $menu)
  {
    foreach ($menu as $m) {
      $data = array(
        'id_laporan' => $laporan,
        'id_menu' => $m,
        'terjual' => '0',
        'bonus' => '0',
        'sisa_cup' => '0',
        'sisa_plastik' => '0',
      );
      $this->db->insert('wedhang_laporan_menu', $data);
    }
  }
  public function laporan_unik($date, $user)
  {
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->where('user_laporan', $user);
    $this->db->where('tanggal', $date);
    return $this->db->get()->result();
  }
  public function delete_data_laporan($laporan)
  {
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan.tempat');
    $this->db->join('wedhang_laporan_menu', 'wedhang_laporan_menu.id_laporan = wedhang_laporan.id_laporan');
    $this->db->where('wedhang_laporan.id_laporan', $laporan);
    $select =  $this->db->get()->result();

    foreach ($select as $s) {
      $data = array(
        'id' => $s->id,
      );
      $id = $data;
      $booth = $s->tempat;
    }
    // $this->db->query("UPDATE wedhang_booth SET status_booth = 'kosong' WHERE id_booth = '$booth'");
    $this->db->query("DELETE FROM wedhang_laporan_cuaca WHERE cuaca_booth = '$booth'");
    $this->db->query("DELETE FROM wedhang_laporan WHERE id_laporan = '$laporan'");
    $this->db->query("DELETE FROM wedhang_laporan_menu WHERE id_laporan = '$laporan'");
    $this->db->query("DELETE FROM wedhang_laporan_detail WHERE id_laporan = '$laporan'");

  }
  public function get_menu()
  {
    return $this->db->get('wedhang_menu')->result_array();
  }
  public function add_laporan($date, $user, $tempat, $paket)
  {
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->where('user_laporan', $user);
    $this->db->where('tanggal', $date);
    $cek = $this->db->get()->num_rows();
    if ($cek > 0) {
      redirect('home/coba');
    }
    if ($cek == 0) {
      $get_ket = $this->db->query("SELECT * FROM wedhang_booth WHERE id_booth = '$tempat'")->result();
      foreach ($get_ket as $gk) {
        $ket_tempat = $gk->nama_booth;
      }
      $time = date('H:i:s');
      $laporan_date = date('Y-m-d');
      $data = array(
        'tanggal' => $date,
        'tanggal_date' => $laporan_date,
        'user_laporan' => $user,
        'tempat' => $tempat,
        'ket_tempat' => $ket_tempat,
      );
      $this->db->insert('wedhang_laporan', $data);
      $select = $this->db->query("SELECT * FROM wedhang_laporan WHERE user_laporan = '$user' && tanggal = '$date'");
      foreach ($select->result() as $s) {
      $id = $s->id_laporan;
      }
      foreach ($paket as $p) {
        $result = array(
          'id_laporan' => $id,
          'id_menu' => $p,
          'terjual' => '0',
          'bonus' => '0',
          'sisa_cup' => '0',
          'sisa_plastik' => '0',
        );
        $this->db->insert('wedhang_laporan_menu', $result);
      }
      $this->db->query("UPDATE wedhang_booth SET status_booth = 'sedang buka' WHERE id_booth = '$tempat'");
      redirect('laporan/laporan_harian');
    }

  }
  public function detail_laporan($date, $user)
  {
    $status = 'sedang buka';
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_laporan_menu', 'wedhang_laporan_menu.id_laporan = wedhang_laporan.id_laporan');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan.tempat');
    $this->db->where('wedhang_laporan.user_laporan', $user);
    $this->db->where('wedhang_laporan.tanggal', $date);
    $this->db->where('wedhang_booth.status_booth', $status);
    return $this->db->get()->result();
  }
  public function jml_laporan($date, $user)
  {
    // $status = ''
    $status = 'sedang buka';
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan.tempat');
    $this->db->where('wedhang_laporan.user_laporan', $user);
    $this->db->where('wedhang_laporan.tanggal', $date);
    $this->db->where('wedhang_booth.status_booth', $status);
    return $this->db->get()->num_rows();
  }
  public function cek_booth($date, $user)
  {
    $status = 'tutup';
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan.tempat');
    $this->db->where('wedhang_laporan.user_laporan', $user);
    $this->db->where('wedhang_laporan.tanggal', $date);
    $this->db->where('wedhang_booth.status_booth', $status);
    return $this->db->get()->num_rows();
  }
  public function detail_sisa($date, $user)
  {
    $this->db->select('*');
    $this->db->from('wedhang_sisa');
    $this->db->join('wedhang_laporan', 'wedhang_sisa.id_laporan = wedhang_laporan.id_laporan');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_sisa.id_menu');
    $this->db->where('wedhang_laporan.user_laporan', $user);
    $this->db->where('wedhang_laporan.tanggal', $date);
    return $this->db->get()->result();
  }
  public function plus($id, $lapor)
  {
    date_default_timezone_set('Asia/Jakarta');
    $time = date('H:i:s');
    $select = $this->db->query("SELECT * FROM wedhang_laporan_menu WHERE id = '$id'")->result();
    foreach ($select as $s) {
      $awal = $s->terjual;
      $id_menu = $s->id_menu;
    }
    $get_harga_menu = $this->db->query("SELECT * FROM wedhang_menu WHERE id_menu = '$id_menu'")->result();
    foreach ($get_harga_menu as $g) {
      $harga_menu = $g->harga_menu;
    }
    $plus = $awal+1;
    $omset_menu = $plus*$harga_menu;
    $this->db->query("UPDATE wedhang_laporan_menu SET terjual = '$plus' WHERE id = '$id'");
    $this->db->query("UPDATE wedhang_laporan_menu SET harga_menu = '$harga_menu' WHERE id = '$id'");
    $this->db->query("UPDATE wedhang_laporan_menu SET omset_menu = '$omset_menu' WHERE id = '$id'");
    $detail = array(
      'id' => $id,
      'id_laporan' => $lapor,
      'time_detail' => $time,
      'ket_detail' => 'terjual',
    );
    $this->db->insert('wedhang_laporan_detail', $detail);
  }
  public function bonus($id, $lapor)
  {
    date_default_timezone_set('Asia/Jakarta');
    $time = date('H:i:s');
    $select = $this->db->query("SELECT bonus FROM wedhang_laporan_menu WHERE id = '$id'")->result();
    foreach ($select as $s) {
      $awal = $s->bonus;
    }
    $plus = $awal+1;
    $update = $this->db->query("UPDATE wedhang_laporan_menu SET bonus = '$plus' WHERE id = '$id'");
    $detail = array(
      'id' => $id,
      'id_laporan' => $lapor,
      'time_detail' => $time,
      'ket_detail' => 'bonus',
    );
      $this->db->insert('wedhang_laporan_detail', $detail);
  }
  public function detail_sisa_modal($id)
  {
    $get = $this->db->query("SELECT * FROM wedhang_laporan_menu WHERE id = '$id'")->result();
    foreach ($get as $r) {
      $data = array(
        'sisa_cup' => $r->sisa_cup,
        'sisa_plastik' => $r->sisa_plastik,
        'id' => $r->id,
      );
    }
    return $data;
  }
  public function update_sisa($cup, $id, $plastik)
  {
    $update = $this->db->query("UPDATE wedhang_laporan_menu SET sisa_cup = '$cup', sisa_plastik = '$plastik' WHERE id = '$id'");
  }
  public function get_laporan_excel()
  {

    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_laporan_menu', 'wedhang_laporan_menu.id_laporan = wedhang_laporan.id_laporan');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu', 'wedhang_menu.id_menu = wedhang_sisa.id_menu');
    $this->db->group_by('wedhang_laporan_menu.id');
    return $this->db->get()->result();
  }
  public function get_laporan_excel_today()
  {
    $date = date('d-m-Y');
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_laporan_menu', 'wedhang_laporan_menu.id_laporan = wedhang_laporan.id_laporan');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu', 'wedhang_menu.id_menu = wedhang_sisa.id_menu');
    $this->db->group_by('wedhang_laporan_menu.id');
    $this->db->where('wedhang_laporan.tanggal', $date);
    return $this->db->get()->result();
  }
  public function get_total()
  {
    $date = date('d-m-Y');
    $this->db->select('wedhang_laporan_menu.id_menu');
    $this->db->select_sum('terjual');
    $this->db->select_sum('bonus');
    $this->db->select_sum('sisa_cup');
    $this->db->select_sum('sisa_plastik');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->select('wedhang_menu.nama_menu');
    $this->db->group_by('wedhang_laporan_menu.id_menu');
    $this->db->where('wedhang_laporan.tanggal', $date);
    return $this->db->get()->result();

  }
  public function get_total_bulan()
  {
    $this->db->select('wedhang_laporan_menu.id_menu');
    $this->db->select_sum('terjual');
    $this->db->select_sum('bonus');
    $this->db->select_sum('sisa_cup');
    $this->db->select_sum('sisa_plastik');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');
    $this->db->select('wedhang_menu.nama_menu');
    $this->db->group_by('wedhang_laporan_menu.id_menu');
    return $this->db->get()->result();

  }
  public function get_pelapor()
  {
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->group_by('id_laporan');
    return $this->db->get()->result();
  }
  public function get_pelapor_today()
  {
    $date = date('d-m-Y');
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan.tempat');
    $this->db->group_by('id_laporan');
    $this->db->where('tanggal', $date);
    return $this->db->get()->result();
  }
  public function lapor_cuaca($id, $cuaca)
  {
    date_default_timezone_set('Asia/Jakarta');
    $time = date('H:i:s');
    $date_cuaca = date('d-m-Y');
    $data = array(
      'cuaca_booth' => $id,
      'cuaca' => $cuaca,
      'time_cuaca' => $time,
      'date_cuaca' => $date_cuaca,
    );
    $this->db->insert('wedhang_laporan_cuaca', $data);
  }
  public function tutup($id)
  {
    $status = 'tutup';
    $this->db->query("UPDATE wedhang_booth SET status_booth = '$status' WHERE id_booth = '$id'");
  }
  public function add_notes($id, $note)
  {
    $this->db->query("UPDATE wedhang_laporan SET notepad = '$note' WHERE id_laporan = '$id'");
  }
  public function get_note($date, $user)
  {
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_booth', 'wedhang_laporan.tempat = wedhang_booth.id_booth');
    $this->db->where('wedhang_laporan.user_laporan', $user);
    $this->db->where('wedhang_laporan.tanggal', $date);
    return $this->db->get()->result();
  }
  public function get_laporan_detail()
  {
    date_default_timezone_set('Asia/Jakarta');
    $date = date('d-m-Y');
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_laporan_menu', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->join('wedhang_laporan_detail', 'wedhang_laporan_detail.id = wedhang_laporan_menu.id');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan.tempat');
    $this->db->join('wedhang_menu', 'wedhang_laporan_menu.id_menu = wedhang_menu.id_menu');
    $this->db->where('wedhang_booth.tanggal_booth', $date);
    return $this->db->get()->result();
  }
  public function get_laporan_modif($id)
  {
    date_default_timezone_set('Asia/Jakarta');
    $date = date('d-m-Y');
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_laporan_menu', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->join('wedhang_laporan_detail', 'wedhang_laporan_detail.id = wedhang_laporan_menu.id');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan.tempat');
    $this->db->join('wedhang_menu', 'wedhang_laporan_menu.id_menu = wedhang_menu.id_menu');
    $this->db->where('wedhang_laporan.tanggal', $date);
    $this->db->where('wedhang_laporan_menu.id_laporan', $id);
    $this->db->order_by('wedhang_laporan_detail.id_detail', 'DESC');
    return $this->db->get()->result();
  }
  public function get_modif($id)
  {
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan.tempat');
    $this->db->where('wedhang_laporan.id_laporan', $id);
    return $this->db->get()->result();
  }
  public function delete_detail($detail, $laporan, $id)
  {
    $this->db->query("DELETE FROM wedhang_laporan_detail WHERE id_detail = '$detail'");
    $select = $this->db->query("SELECT * FROM wedhang_laporan_menu WHERE id = '$id'")->result();
    foreach ($select as $s) {
      $terjual = $s->terjual;
    }
    $update = $terjual-1;
    $this->db->query("UPDATE wedhang_laporan_menu SET terjual = '$update' WHERE id = '$id'");
  }
  public function delete_detail_bonus($detail, $laporan, $id)
  {
    $this->db->query("DELETE FROM wedhang_laporan_detail WHERE id_detail = '$detail'");
    $select = $this->db->query("SELECT * FROM wedhang_laporan_menu WHERE id = '$id'")->result();
    foreach ($select as $s) {
      $bonus = $s->bonus;
    }
    $update = $bonus-1;
    $this->db->query("UPDATE wedhang_laporan_menu SET bonus = '$update' WHERE id = '$id'");
  }
  public function get_modif_menu($id)
  {
    $this->db->select('*');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');
    $this->db->group_by('wedhang_laporan_menu.id_menu');
    $this->db->where('wedhang_laporan_menu.id_laporan', $id);
    return $this->db->get()->result();
  }
  public function add_modif($menu, $ket)
  {
    $this->db->select('*');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_laporan_detail', 'wedhang_laporan_menu.id = wedhang_laporan_detail.id');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan.tempat');
    $this->db->where('wedhang_laporan_detail.id', $menu);
    $this->db->order_by('wedhang_laporan_detail.id_detail', 'DESC');
    $this->db->limit('1');
    $get = $this->db->get()->result();
    foreach ($get as $g) {
      $waktu = $g->time_detail;
    }
    $select = $this->db->query("SELECT * FROM wedhang_laporan_menu WHERE id = '$menu'")->result();
    foreach ($select as $s) {
      $terjual = $s->terjual;
      $bonus = $s->bonus;
    }
    if ($ket == 'terjual') {
      $update = $terjual+1;
      $this->db->query("UPDATE wedhang_laporan_menu SET terjual = '$update' WHERE id = '$menu'");
      $data = array(
        'id' => $menu,
        'time_detail' => $waktu,
        'ket_detail' => $ket,
      );
      $this->db->insert('wedhang_laporan_detail', $data);
    }
    if ($ket == 'bonus') {
      $update_b = $bonus+1;
      $this->db->query("UPDATE wedhang_laporan_menu SET bonus = '$update_b' WHERE id = '$menu'");
      $data_b = array(
        'id' => $menu,
        'time_detail' => $waktu,
        'ket_detail' => $ket,
      );
      $this->db->insert('wedhang_laporan_detail', $data_b);
    }
  }

}

 ?>
