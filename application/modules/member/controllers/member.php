<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('m_member');
	}
	public function index()
	{
		$data['list']=$this->m_member->getMember();
		$this->load->view('v_member', $data);
	}
	function hapus($id)
	{
		$this->m_member->hapus($id);
		//$this->session->set_flashdata('msg', 'Data berhasil dihapus');
		redirect('member/index');
	}
}

/* End of file barang.php */
/* Location: ./application/modules/barang/controllers/barang.php */