<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin_cuci extends CI_Controller {

	public function index()
	{
		$data['judul']="Data Mesin Cuci";
		$this->load->view('template/_head',$data);
		$this->load->view('page_index');
		$this->load->view('template/_footer');
	}

}

/* End of file mesin_cuci.php */
/* Location: ./application/modules/mesin_cuci/controllers/mesin_cuci.php */