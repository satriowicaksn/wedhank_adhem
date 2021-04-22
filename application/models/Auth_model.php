<?php
/**
 *
 */
class Auth_model extends CI_Model
{
  public function cek_staff()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $role = '1';
    $cek = $this->db->where('username', $username)->where('password', $password)->where('role', $role)->get('wedhang_user');
    $this->session->userdata($cek);
    return $cek;
  }
  public function cek_pegawai()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $role = '2';
    $cek = $this->db->where('username', $username)->where('password', $password)->where('role', $role)->get('wedhang_user');
    $this->session->userdata($cek);
    return $cek;
  }
}

 ?>
