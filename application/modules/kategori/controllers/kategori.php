<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori');
	}
	public function index()
	{
		$data['judul']="Kategori";
		$data['value']=$this->getData();
		$this->load->view('template/_head',$data);
		$this->load->view('page_index',$data);
		$this->load->view('template/_footer');		
	}
	function getData()
	{
		$kategori=$this->m_kategori->getKategori();
		$arr=array();
		foreach($kategori as $kat){
			$data['id_mesin_kategori']=$kat->id_mesin_kategori;
			$data['nama_mesin_kategori']=$kat->nama_mesin_kategori;
			$data['jumlah_mesin']=$this->m_kategori->getJumlahMesin($kat->id_mesin_kategori);
			array_push($arr, (object)$data);
		}
		return $arr;
	}
	function add()
	{
		$data=array('nama_mesin_kategori'=>$this->input->post('nama'));
		$this->db->insert('mesin_kategori', $data);
		$this->session->set_flashdata('msg', "<div class='alert alert-success fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Kategori baru berhasil ditambahkan</strong> .</div>");
		redirect('kategori');
	}
	function edit(){
		//$data=array('nama_mesin_kategori'=>$this->input->post('nama'));
		$this->db->where('id_mesin_kategori', $this->input->post('id'));
		$this->db->update('mesin_kategori', array('nama_mesin_kategori'=>$this->input->post('nama')));
		$this->session->set_flashdata('msg', "<div class='alert alert-success fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Data Kategori berhasil diubah</strong> .</div>");
		redirect('kategori');
	}
	function hapus()
	{
		$this->db->where('id_mesin_kategori', $this->input->post('id'));
		$this->db->delete('mesin_kategori');
		$this->session->set_flashdata('msg', "<div class='alert alert-success fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Data Kategori berhasil dihapus</strong> .</div>");
		redirect('kategori');
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