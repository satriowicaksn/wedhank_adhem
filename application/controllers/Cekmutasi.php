<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cekmutasi extends CI_Controller
{
	public function balance()
	{
		$this->load->library('cekmutasi/cekmutasi');

		$balance = $this->cekmutasi->balance();

		print_r($balance);
	}
  public function mutasiBank()
  {
    $this->load->library('cekmutasi/cekmutasi');
    $mutasi = $this->cekmutasi->bank()->mutation([
      'date'		=> [
        'from'	=> date('Y-m-d') . ' 00:00:00',
        'to'	=> date('Y-m-d') . ' 23:59:59'
      ]
    ]);

    print_r($mutasi);
  }
  public function coba()
  {
    $data = array(
      'nama' => 'krisna hendra',
      'hobi' => 'kacer'
    );
    return $data;
  }
}

?>
