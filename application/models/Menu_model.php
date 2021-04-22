<?php
/**
 *
 */
class Menu_model extends CI_Model
{
  public function get_menu()
  {
    return $this->db->query("SELECT * FROM wedhang_menu ORDER BY nama_menu ASC")->result();
  }
  public function add_menu($menu)
  {
    $data = array(
      'nama_menu' => $menu,
      'harga_menu' => $harga,
    );
    $this->db->insert('wedhang_menu', $data);
  }
  public function delete_menu($id)
  {
    $this->db->query("DELETE FROM wedhang_menu WHERE id_menu = '$id'");
  }
  public function get_menu_modal($id)
  {
    $get = $this->db->query("SELECT * FROM wedhang_menu WHERE id_menu = '$id'")->result();
    foreach ($get as $r) {
      $data = array(
        'nama_menu' => $r->nama_menu,
        'harga_menu' => $r->harga_menu,
        'id_menu' => $r->id_menu
      );
    }
    return $data;
  }
  public function update_menu($id, $menu, $harga)
  {
    $this->db->query("UPDATE wedhang_menu SET nama_menu = '$menu',harga_menu = '$harga' WHERE id_menu = '$id'");
  }
}

 ?>
