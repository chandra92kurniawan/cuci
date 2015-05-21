<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->model('m_rekomendasi');
	}
	public function index()
	{
		$data['parameter']=$this->db->get('tran_parameter')->result();
		$data['judul']="Rekomendasi (Fuzy Tahani)";
		$this->load->view('template/_head',$data);
		$this->load->view('page_index',$data);
		$this->load->view('template/_footer');	
	}
	function rekomended()
	{
		$parameter=$this->db->get('tran_parameter')->result();
		$sess=random_string('alnum', 16);
		$array = array(
			'user' => $sess
		);		
		$this->session->set_userdata( $array );
		
		$mesin=$this->m_rekomendasi->getMesin();
		foreach($mesin as $m){
			$na='';$nb='';$nh='';$a='';$b='';$no=0;
			foreach($parameter as $param){
				if($no!=0){
					$b=$param->id_parameter;
					$nb=$this->input->post('option_'.$param->id_parameter);
					$nilai_b=$this->m_rekomendasi->getNilaiBobot($b,$m->id_mesin);
					$nilai2=$nilai_b['nilai_'.$nb];
					$operator=$this->m_rekomendasi->getOperator($a,$b);
					if($operator->operator==1){
						if($nilai2>=$nilai1){
							$hasil=$nilai2;
						}else{
							$hasil=$nilai1;
						}
					}else{
						if($nilai2>=$nilai1){
							$hasil=$nilai1;
						}else{
							$hasil=$nilai1;
						}
					}
				}
				$na=$this->input->post('option_'.$param->id_parameter);
				$a=$param->id_parameter;
				$nilai_a=$this->m_rekomendasi->getNilaiBobot($a,$m->id_mesin);
				$nilai1=$nilai_a['nilai_'.$na];
				$hasil=$nilai1;
			}
		}
	}
	function test()
	{
		$this->session->sess_expiration = 5;
        $this->session->sess_expire_on_close = TRUE;
		/*$array = array(
			'username' => 'chandra'
		);
		
		$this->session->set_userdata( $array );*/
		echo "<pre>";print_r($this->session->all_userdata());
		
	}
	function test2()
	{
		echo "<pre>";print_r($this->session->all_userdata());
	}
}

/* End of file rekomendasi.php */
/* Location: ./application/modules/rekomendasi/controllers/rekomendasi.php */