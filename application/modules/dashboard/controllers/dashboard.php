<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['judul']="Dashboard";
		$this->load->view('template/_head',$data);
		$this->load->view('page_index');
		$this->load->view('template/_footer');
	}

}

/* End of file dashboard.php */
/* Location: ./application/modules/dashboard/controllers/dashboard.php */