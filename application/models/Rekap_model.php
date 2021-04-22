<?php
/**
 *
 */
class Rekap_model extends CI_Model
{
  function rekaphari($awal, $akhir)
  {
    $min = '2020-09-11';
    $max = date('Y-m-d');
    $this->db->select('*');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_laporan_menu', 'wedhang_laporan_menu.id_laporan = wedhang_laporan.id_laporan');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');
    $this->db->where('wedhang_laporan.tanggal_date >=', $awal);
    $this->db->where('wedhang_laporan.tanggal_date <=', $akhir);
    $get = $this->db->get()->result();
    return $get;
  }
  function rekappelapor($awal, $akhir)
  {
    $min = '2020-09-11';
    $max = date('Y-m-d');
    $this->db->select('*');
    $this->db->select('DATE_FORMAT(tanggal_date, "%a") as hari');
    $this->db->select('DATE_FORMAT(tanggal_date, "%d %M %Y") as tgl');
    $this->db->select_sum('omset_menu');
    $this->db->select_sum('terjual');
    $this->db->select_sum('bonus');
    $this->db->select_sum('sisa_cup');
    $this->db->select_sum('sisa_plastik');
    $this->db->from('wedhang_laporan');
    $this->db->join('wedhang_laporan_menu', 'wedhang_laporan_menu.id_laporan = wedhang_laporan.id_laporan');
    $this->db->join('wedhang_menu', 'wedhang_menu.id_menu = wedhang_laporan_menu.id_menu');
    $this->db->where('wedhang_laporan.tanggal_date >=', $awal);
    $this->db->where('wedhang_laporan.tanggal_date <=', $akhir);
    $this->db->group_by('wedhang_laporan.id_laporan');
    return $this->db->get()->result();
  }
  function convert_hari_awal($awal)
  {
    $this->db->select('DATE_FORMAT(tanggal_date, "%a") as hari');
    $this->db->select('DATE_FORMAT(tanggal_date, "%d %M %Y") as tgl');
    $this->db->from('wedhang_laporan');
    $this->db->where('tanggal_date >=', $awal);
    $this->db->limit(1);
    return $this->db->get()->result();
  }
  function convert_hari_akhir($akhir)
  {
    $this->db->select('DATE_FORMAT(tanggal_date, "%a") as hari');
    $this->db->select('DATE_FORMAT(tanggal_date, "%d %M %Y") as tgl');
    $this->db->from('wedhang_laporan');
    $this->db->where('tanggal_date <=', $akhir);
    $this->db->limit(1);
    return $this->db->get()->result();
  }

}

 ?>
