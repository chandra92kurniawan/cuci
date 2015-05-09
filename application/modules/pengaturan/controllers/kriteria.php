<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

	public function index()
	{
		$data['judul']="Pengaturan / Kriteria Variable";
		$this->load->view('template/_head',$data);
		$this->load->view('kriteria/page_index');
		$this->load->view('template/_footer');	
	}

}

/* End of file kriteria.php */
/* Location: ./application/modules/pengaturan/controllers/kriteria.php */