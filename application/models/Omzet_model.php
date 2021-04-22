<?php
/**
 *
 */
class Omzet_model extends CI_Model
{
  public function ubah_omzet()
  {
    $id_laporan = $this->input->post('id_laporan');
    $id_laporan_menu = $this->input->post('id_laporan_menu');
    $omset_menu = $this->input->post('omset_menu');
    $data = array();
    $get_update = $this->db->query("SELECT * FROM wedhang_laporan_menu WHERE id_laporan = '$id_laporan'")->result_array();
    foreach ($get_update as $i => $key) {
      $data[] = array(
        'id' => $id_laporan_menu[$i],
        'omset_menu' => $omset_menu[$i]
    );
    $this->db->update_batch('wedhang_laporan_menu', $data, 'id');
    }

    $this->db->select_sum('omset_menu');
    $this->db->select('wedhang_laporan.id_laporan');
    $this->db->select('wedhang_laporan.tanggal_date');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->group_by('wedhang_laporan_menu.id_laporan');
    $this->db->where('wedhang_laporan.id_laporan', $id_laporan);
    $get = $this->db->get()->result();
    foreach ($get as $g) {
      $omset_total = $g->omset_menu;
    }
    $this->db->query("UPDATE wedhang_laporan SET omzet_total = '$omset_total' WHERE id_laporan = '$id_laporan'");




  }

  public function omzet_laporan($date)
  {
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan.tempat');
    $this->db->group_by('id_laporan');
    $this->db->where('tanggal', $date);
    return $this->db->get()->result();
  }
  public function omzet_by_day($date)
  {
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_laporan_menu', 'wedhang_laporan_menu.id_laporan = wedhang_laporan.id_laporan');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu', 'wedhang_menu.id_menu = wedhang_sisa.id_menu');
    $this->db->group_by('wedhang_laporan_menu.id');
    $this->db->where('wedhang_laporan.tanggal', $date);
    return $this->db->get()->result();
  }
  public function omzet_semua()
  {
    $this->db->select_sum('omset_menu');
    $this->db->from('wedhang_laporan_menu');
    return $this->db->get()->result();
  }
  public function total_omzet($date)
  {
    $this->db->select('wedhang_laporan.id_laporan');
    $this->db->select('wedhang_laporan_menu.id_menu');
    $this->db->select_sum('terjual');
    $this->db->select_sum('bonus');
    $this->db->select_sum('omset_menu');
    $this->db->select_sum('sisa_cup');
    $this->db->select_sum('sisa_plastik');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->select('wedhang_menu.nama_menu');
    $this->db->group_by('wedhang_laporan.id_laporan');
    $this->db->where('wedhang_laporan.tanggal', $date);
    return $this->db->get()->result();
  }
    public function get_omzet_user($date)
  {
    $this->db->select('ket_tempat');
    $this->db->select('user_laporan');
    $this->db->select('tanggal');
    $this->db->select_sum('terjual');
    $this->db->select_sum('omset_menu');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan_menu.id_laporan = wedhang_laporan.id_laporan');
    $this->db->group_by('wedhang_laporan.id_laporan');
    $this->db->where('wedhang_laporan.tanggal', $date);
    $get = $this->db->get()->result();
    // print_r($get);die;
    return $get;
  }
    public function get_omzet_hari($date)
  {
    $this->db->select('tanggal');
    $this->db->select('DATE_FORMAT(tanggal_date, "%a") as hari');
    $this->db->select('DATE_FORMAT(tanggal_date, "%d %M %Y") as tanggal_date');
    $this->db->select('id_menu');
    $this->db->select('wedhang_laporan.id_laporan');
    $this->db->select('COUNT(id_menu) AS "total_buka"');
    $this->db->select_sum('terjual');
    $this->db->select_sum('omset_menu');
    $this->db->select_sum('bonus');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->group_by('wedhang_laporan.tanggal');
    $this->db->order_by('wedhang_laporan.id_laporan', 'desc');
    // $this->db->where('wedhang_laporan.tanggal', $date);
    $get = $this->db->get()->result();
    // echo "<pre>";
    // print_r($get);die;
    return $get;
  }
  public function getOmzetUser()
  {
    $this->db->select('user_laporan');
    $this->db->select_sum('terjual');
    $this->db->select_sum('bonus');
    $this->db->select_sum('omset_menu');
    $this->db->select('COUNT(wedhang_laporan.id_laporan) AS "total_buka"');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->group_by('wedhang_laporan.user_laporan');
    $this->db->order_by('wedhang_laporan_menu.omset_menu', 'desc');
    // $this->db->where('wedhang_laporan.tanggal', $date);
    $get = $this->db->get()->result();
    // echo "<pre>";
    // print_r($get);die;
    return $get;
  }
  public function getOmzetMenu()
  {
    $this->db->select('user_laporan');
    $this->db->select_sum('terjual');
    $this->db->select_sum('bonus');
    $this->db->select_sum('omset_menu');
    $this->db->select('COUNT(wedhang_laporan.id_laporan) AS "total_buka"');
    $this->db->select('nama_menu');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');
    $this->db->group_by('wedhang_menu.id_menu');
    $this->db->order_by('wedhang_laporan_menu.omset_menu', 'desc');
    // $this->db->where('wedhang_laporan.tanggal', $date);
    $get = $this->db->get()->result();
    // echo "<pre>";
    // print_r($get);die;
    return $get;
  }
  public function getOmzetBooth()
  {
    $this->db->select('ket_tempat');
    $this->db->select_sum('terjual');
    $this->db->select_sum('bonus');
    $this->db->select_sum('omset_menu');
    $this->db->select('COUNT(wedhang_laporan.id_laporan) AS "total_buka"');
    $this->db->from('wedhang_laporan_menu');
    $this->db->join('wedhang_laporan', 'wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan');
    $this->db->group_by('wedhang_laporan.ket_tempat');
    $this->db->order_by('wedhang_laporan_menu.omset_menu', 'desc');
    // $this->db->where('wedhang_laporan.tanggal', $date);
    $get = $this->db->get()->result();
    // echo "<pre>";
    // print_r($get);die;
    return $get;
  }
  public function get_omzet()
  {
    $this->db->select('*');
    $this->db->select_sum('wedhang_laporan_menu.terjual');
    $this->db->select_sum('wedhang_laporan_menu.bonus');
    $this->db->select_sum('wedhang_laporan_menu.sisa_cup');
    $this->db->select_sum('wedhang_laporan_menu.sisa_plastik');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_laporan_menu', 'wedhang_laporan_menu.id_laporan = wedhang_laporan.id_laporan');
    $this->db->join('wedhang_booth', 'wedhang_booth.id_booth = wedhang_laporan.tempat');
    $this->db->group_by('wedhang_laporan_menu.id_laporan');
    $get = $this->db->get()->result();
    return $get;
  }
  public function getAllOmzet()
  {
    $dateNow = date('Y-m-d');
    $date2 = mktime(0,0,0,date("n"),date("j")-1,date("Y"));
    $date2 = date('Y-m-d', $date2);
    $date3 = mktime(0,0,0,date("n"), date("j")-3,date("Y"));
    $date3 = date('Y-m-d', $date3);
    $date4 = mktime(0,0,0,date("n"), date("j")-7,date("Y"));
    $date4 = date('Y-m-d', $date4);
    $date5 = mktime(0,0,0,date("n"), date("j")-14, date("Y"));
    $date5 = date('Y-m-d', $date5);
    $date6 = mktime(0,0,0,date("n"), date("j")-21, date("Y"));
    $date6 = date('Y-m-d', $date6);
    $date7 = mktime(0,0,0, date("n"), date("j")-30, date("Y"));
    $date7 = date('Y-m-d', $date7);

    $getToday = $this->db->query("SELECT SUM(omset_menu) AS result FROM wedhang_laporan_menu JOIN wedhang_laporan ON wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan WHERE tanggal_date = '$dateNow' GROUP BY tanggal_date")->row();
    if ($getToday != NULL) {
      $getToday = $getToday->result;
    }else {
      $getToday = 0;
    }
    $getKemarin = $this->db->query("SELECT SUM(omset_menu) AS result FROM wedhang_laporan_menu JOIN wedhang_laporan ON wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan WHERE tanggal_date = '$date2' GROUP BY tanggal_date")->row();
    if ($getKemarin != NULL) {
      $getKemarin = $getKemarin->result;
    }else {
      $getKemarin = 0;
    }
    $get3Hari = $this->db->query("SELECT SUM(omset_menu) AS result FROM wedhang_laporan_menu JOIN wedhang_laporan ON wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan WHERE tanggal_date >= '$date3' AND tanggal_date <= '$dateNow'")->row();
    if ($get3Hari != NULL) {
      $get3Hari = $get3Hari->result;
    }else {
      $get3Hari = 0;
    }
    $get1Minggu = $this->db->query("SELECT SUM(omset_menu) AS result FROM wedhang_laporan_menu JOIN wedhang_laporan ON wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan WHERE tanggal_date >= '$date4' && tanggal_date <= '$dateNow'")->row();
    if ($get1Minggu != NULL) {
      $get1Minggu = $get1Minggu->result;
    }else {
      $get1Minggu = 0;
    }
    $get2Minggu = $this->db->query("SELECT SUM(omset_menu) AS result FROM wedhang_laporan_menu JOIN wedhang_laporan ON wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan WHERE tanggal_date >= '$date5' && tanggal_date <= '$dateNow'")->row();
    if ($get2Minggu != NULL) {
      $get2Minggu = $get2Minggu->result;
    }else {
      $get2Minggu = 0;
    }
    $get3Minggu = $this->db->query("SELECT SUM(omset_menu) AS result FROM wedhang_laporan_menu JOIN wedhang_laporan ON wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan WHERE tanggal_date >= '$date6' && tanggal_date <= '$dateNow'")->row();
    if ($get3Minggu != NULL) {
      $get3Minggu = $get3Minggu->result;
    }else {
      $get3Minggu = 0;
    }
    $get1Bulan = $this->db->query("SELECT SUM(omset_menu) AS result FROM wedhang_laporan_menu JOIN wedhang_laporan ON wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan WHERE tanggal_date >= '$date7' && tanggal_date <= '$dateNow'")->row();
    if ($get1Bulan != NULL) {
      $get1Bulan = $get1Bulan->result;
    }else {
      $get1Bulan = 0;
    }
    $all = $this->db->query("SELECT SUM(omset_menu) AS result FROM wedhang_laporan_menu JOIN wedhang_laporan ON wedhang_laporan.id_laporan = wedhang_laporan_menu.id_laporan")->row();
    if ($all != NULL) {
      $all = $all->result;
    }else {
      $all = 0;
    }
    $data = array(
      'today' => $getToday,
      'kemarin' => $getKemarin,
      '3hari' => $get3Hari,
      '1minggu' => $get1Minggu,
      '2minggu' => $get2Minggu,
      '3minggu' => $get3Minggu,
      '1bulan' => $get1Bulan,
      'all' => $all
    );
    // echo "<pre>";
    // print_r($date3);die;
    return $data;

  }

}

 ?>
