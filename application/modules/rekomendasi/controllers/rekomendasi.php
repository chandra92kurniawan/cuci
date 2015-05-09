<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi extends CI_Controller {

	public function index()
	{
		$data['judul']="Rekomendasi (Fuzy Tahani)";
		$this->load->view('template/_head',$data);
		$this->load->view('page_index');
		$this->load->view('template/_footer');	
	}

}

/* End of file rekomendasi.php */
/* Location: ./application/modules/rekomendasi/controllers/rekomendasi.php */