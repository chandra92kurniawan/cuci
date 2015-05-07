<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rating extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('m_rating');
	}
	public function index()
	{
		$data['list']=$this->m_rating->getRating();
		$this->load->view('v_rating', $data);
	
	}
}

/* End of file barang.php */
/* Location: ./application/modules/barang/controllers/barang.php */