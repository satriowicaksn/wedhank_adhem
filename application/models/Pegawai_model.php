<?php
/**
 *
 */
class Pegawai_model extends CI_Model
{
  public function get_pegawai()
  {
    return $this->db->get('wedhang_user')->result();
  }
  public function get_pegawai_modal($id)
  {
    $get = $this->db->query("SELECT * FROM wedhang_user WHERE id_user = '$id'")->result();
    foreach ($get as $r) {
      $data = array(
        'username' => $r->username,
        'password' => $r->password,
        'role' => $r->role,
        'id' => $r->id_user,
      );
    }
    return $data;
  }
  public function update_pegawai($username, $password, $role, $id)
  {
    $this->db->query("UPDATE wedhang_user SET username = '$username', password = '$password', role = '$role' WHERE id_user = '$id'");
  }
  public function add_pegawai($username, $password, $role)
  {
    $data = array(
      'username' => $username,
      'password' => $password,
      'role' => $role,
    );
    $this->db->insert('wedhang_user', $data);
  }
  public function delete_pegawai($id)
  {
    $this->db->query("DELETE FROM wedhang_user WHERE id_user = '$id'");
  }
}

 ?>
