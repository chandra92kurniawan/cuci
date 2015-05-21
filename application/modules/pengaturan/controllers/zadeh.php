<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zadeh extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_zadeh');
	}
	public function index()
	{
		$data['judul']="Pengaturan / Operator Zadeh";
		$data['parameter']=$this->db->get('tran_parameter');
		$this->load->view('template/_head',$data);
		$this->load->view('zadeh/page_index');
		$this->load->view('template/_footer');
	}
	function add()
	{
		$param=$this->db->get('tran_parameter')->result();
		$a='';$b='';$no=0;
		$this->m_zadeh->delAl();
		foreach($param as $p){
			if($no!=0){
				$b=$p->id_parameter;
				$data=array('id_parameter_1'=>$a,
							'operator'=>$this->input->post('operator_'.$a),
							'id_parameter_2'=>$b);
				$this->db->insert('tran_zadeh', $data);
			}
			$a=$p->id_parameter;
			if($b!=''){
				$b=$a;
			}
			$no++;
		}
		redirect("pengaturan/zadeh");
	}
}

/* End of file zadeh.php */
/* Location: ./application/modules/pengaturan/controllers/zadeh.php */