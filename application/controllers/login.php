<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
		$this->load->model('m_login');
	}
	public function index()
	{
		echo $this->uri->segment(2);	
	}
	function do_login()
	{
		$user=$this->input->post('username');
		$pass=do_hash($this->input->post('password'),'md5');
		$cek=$this->m_login->cekpass($user,$pass);
		if($cek->num_rows()==0){
			$this->session->set_flashdata('msg', "<div class='alert alert-danger fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>login gagal</strong> .</div>");
		}else{
			if($cek->row()->status==1){
			$array = array(
				'_username' =>$user,
				'login'=>true,
			);
			
			$this->session->set_userdata( $array );
			$this->session->set_flashdata('msg', "<div class='alert alert-success fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Login berhasil</strong> .</div>");
			}else{
			$this->session->set_flashdata('msg', "<div class='alert alert-warning fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Akun tersebut telah dinonaktifkan</strong> .</div>");	
			}
		}
		redirect('dashboard');
	}
	function do_logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('msg', "<div class='alert alert-success fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Anda berhasil logout</strong> .</div>");
		redirect('dashboard');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */