<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->helper('security');
	}
	public function index()
	{
		$data['judul']="User";
		$data['value']=$this->m_user->getDtUser();
		$this->load->view('template/_head',$data);
		$this->load->view('user/page_index',$data);
		$this->load->view('template/_footer');
	}
	function cekUsername($user)
	{
		$ck=$this->m_user->CekUsername($user);
		echo $ck;
	}
	function add()
	{
		$str = do_hash($this->input->post('password1'), 'md5');
		$data=array('username'=>$this->input->post('username'),
					'password'=>$str,
					'nama_lengkap'=>$this->input->post('nama_lengkap'),
					'id_role'=>'2',
					'status'=>'1');
		$this->db->insert('adm_user', $data);
		$this->session->set_flashdata('msg', "<div class='alert alert-success fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Data user baru berhasil ditambahkan</strong> .</div>");
		redirect('pengaturan/user/index');
	}
	function setStatus($status,$user){
		if($status==1){
			$s=0;
		}else{
			$s=1;
		}
		$this->db->where('username', $user);
		$this->db->update('adm_user', array('status'=>$s));
		$this->session->set_flashdata('msg', "<div class='alert alert-success fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Set Status berhasil</strong> .</div>");
		redirect('pengaturan/user/index');
	}
}

/* End of file user.php */
/* Location: ./application/modules/pengaturan/controllers/user.php */