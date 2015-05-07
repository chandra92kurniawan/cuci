<?php 

class Restoran extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_restoran');
		
	}
	
	public function index()
	{
		
		$data['list']=$this->m_restoran->getRestoran();
		$this->load->view('v_restoran',$data);
		
	}
	function tambah_data(){
	if($this->input->post('submit')){
			$this->m_restoran->tambah();
			
			redirect('restoran');
		}
		$this->load->view('tambah_resto');
		
	}
	function hapus_data($id){
		$this->m_restoran->hapus_data($id);
		redirect('restoran');
	}
	function update()
	{
		$data=array(
					'nama_restoran'=>$this->input->post('nama_restoran'),
					'alamat_restoran'=>$this->input->post('alamat_restoran'),
					'telp_restoran'=>$this->input->post('telp_restoran'),
					'foto_restoran'=>$this->input->post('foto_restoran'),
					'jenis_masakan'=>$this->input->post('jenis_masakan'),
					'latitude'=>$this->input->post('latitude'),
					'longitude'=>$this->input->post('longitude'),
					'rating'=>$this->input->post('rating'));
		$this->m_restoran->update($data,$this->input->post('id_restoran'));
		redirect('restoran');
	}
	function form_update($id)
	{
		$data['list']=$this->m_restoran->getById($id);
		$this->load->view('page_ubah_restoran', $data);
	
		
	}
}
