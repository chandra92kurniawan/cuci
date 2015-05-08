<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index()
	{
		$data['judul']="Kategori";
		$this->load->view('template/_head',$data);
		$this->load->view('page_index');
		$this->load->view('template/_footer');		
	}
	function contoh()
	{	echo "<pre>";
		$dd=array('airi','budiman');
		$data=array('draw'=>'1',
					'recordsTotal'=>'3',
					'recordsFiltered'=>'3',
					'data'=>array($dd,array('cc','dd'),array('vv','zz')));
		echo json_encode($data);
	}
}

/* End of file dashboard.php */
/* Location: ./application/modules/dashboard/controllers/dashboard.php */