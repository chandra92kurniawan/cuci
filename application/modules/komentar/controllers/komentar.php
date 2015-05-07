<?php 

class Komentar extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_komentar');
		
	}
	
	public function index()
	{
		$data['list']=$this->m_komentar->getKomentar();
		$this->load->view('v_komentar',$data);
	}
	
	function hapus_data($id){
		$this->m_komentar->hapus_data($id);
		
		
	}

}
