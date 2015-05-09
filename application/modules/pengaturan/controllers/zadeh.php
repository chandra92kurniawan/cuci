<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zadeh extends CI_Controller {

	public function index()
	{
		$data['judul']="Pengaturan / Operator Zadeh";
		$this->load->view('template/_head',$data);
		$this->load->view('zadeh/page_index');
		$this->load->view('template/_footer');
	}

}

/* End of file zadeh.php */
/* Location: ./application/modules/pengaturan/controllers/zadeh.php */