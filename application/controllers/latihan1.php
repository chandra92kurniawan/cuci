<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Latihan1 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_latihan1');
	}	
	public function index()
	{
		
		$data['tampil']=$this->m_latihan1->getData();
		$this->load->view('page_latihan',$data);
	}
	
	function add()
	{
		$data=array("username"=>$this->input->post('username'),
					"password"=>$this->input->post('password'),
					"nama_lengkap"=>$this->input->post('nama'));
		$this->db->insert('user', $data);
		$this->session->set_flashdata('msg', "<div class='alert alert-success fade in'>
										        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
										        <strong>Berhasil disimpan</strong>
										      </div>");
		redirect("latihan1");
	}
	function edit()
	{
		$user=$this->input->post('username');
		$data=array(
					"password"=>$this->input->post('password'),
					"nama_lengkap"=>$this->input->post('nama'));
		$this->m_latihan1->update($data,$user);
		$this->session->set_flashdata('msg', "<div class='alert alert-success fade in'>
										        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
										        <strong>Berhasil diubah</strong>
										      </div>");
		redirect("latihan1");
	}
	function hapus($user)
	{
		$this->m_latihan1->hapus($user);
		$this->session->set_flashdata('msg', "<div class='alert alert-success fade in'>
										        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
										        <strong>Berhasil dihapus</strong>
										      </div>");
		redirect("latihan1");
	}
}

/* End of file latihan1.php */
/* Location: ./application/controllers/latihan1.php */





