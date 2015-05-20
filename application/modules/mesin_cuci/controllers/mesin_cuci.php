<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin_cuci extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_mesin');
		$this->load->helper('string');
	}
	public function index()
	{
		$data['judul']="Data Mesin Cuci";
		$kategori=$this->db->get('mesin_kategori')->result();
		$k['']="- Pilih Kategori -";
		$data['parameter']=$this->db->get('tran_parameter')->result();
		foreach($kategori as $kat){
			$k[$kat->id_mesin_kategori]=$kat->nama_mesin_kategori;
		}
		$data['kategori']=$k;
		$data['value']=$this->m_mesin->getDtMesin();
		$this->load->view('template/_head',$data);
		$this->load->view('page_index',$data);
		$this->load->view('template/_footer');
	}
	function add()
	{
		$parameter=$this->db->get('tran_parameter')->result();
		$data=array('id_mesin_kategori'=>$this->input->post('kategori'),
					'gambar'=>'',
					//'harga'=>$this->input->post('harga'),
					'jenis_tabung'=>$this->input->post('jenis_tabung'),
					'fitur_lainya'=>$this->input->post('fitur'),
					'nama_mesin'=>$this->input->post('nama'));
		$this->db->trans_begin();
		$id_mesin=$this->m_mesin->insert($data);
		//echo $id_mesin;
		$name=random_string('alnum', 7);
		$config['upload_path']          = './uploads/mesin/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']			=  $name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('gambar'))
        {
            $error = array('error' => $this->upload->display_errors());
            //print_r($error);
        }
        else
        {
            $upload= $this->upload->data();
    		$ext = $upload['file_ext'];
    		$namex=$name.$ext;
    		//echo $namex;
    		$gambar=array('gambar'=>$namex);
            $this->m_mesin->update($gambar,$id_mesin);
        }

		$arr=array();
		foreach($parameter as $param){
			$dt=array('id_parameter'=>$param->id_parameter,
						'value'=>$this->input->post('param_'.$param->id_parameter),
						'id_mesin'=>$id_mesin);
			array_push($arr, $dt);
		}
		$this->db->insert_batch('mesin_dtl', $arr);
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('msg', "<div class='alert alert-danger fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Data mesin baru gagal ditambahkan</strong> .</div>");
		}
		else
		{
		    $this->db->trans_commit();
		    $this->session->set_flashdata('msg', "<div class='alert alert-success fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Data mesin baru berhasil ditambahkan</strong> .</div>");
		}
		redirect('mesin_cuci');
	}
	function edit()
	{
		$id_mesin=$this->input->post('id');
		$parameter=$this->db->get('tran_parameter')->result();
		$data=array('id_mesin_kategori'=>$this->input->post('kategori'),
					'jenis_tabung'=>$this->input->post('jenis_tabung'),
					'fitur_lainya'=>$this->input->post('fitur'),
					'nama_mesin'=>$this->input->post('nama'));
		$this->db->trans_begin();
		$this->m_mesin->update($data,$id_mesin);

		$name=random_string('alnum', 7);
		$config['upload_path']          = './uploads/mesin/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']			=  $name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('gambar'))
        {
            $error = array('error' => $this->upload->display_errors());
            //print_r($error);
        }
        else
        {
            $upload= $this->upload->data();
    		$ext = $upload['file_ext'];
    		$namex=$name.$ext;
    		//echo $namex;
    		$gambar=array('gambar'=>$namex);
            $this->m_mesin->update($gambar,$id_mesin);
        }
        $this->m_mesin->dellDtl($id_mesin);
        $arr=array();
		foreach($parameter as $param){
			$dt=array('id_parameter'=>$param->id_parameter,
						'value'=>$this->input->post('param_'.$param->id_parameter),
						'id_mesin'=>$id_mesin);
			array_push($arr, $dt);
		}
		$this->db->insert_batch('mesin_dtl', $arr);
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('msg', "<div class='alert alert-danger fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Data mesin gagal diubah</strong> .</div>");
		}
		else
		{
		    $this->db->trans_commit();
		    $this->session->set_flashdata('msg', "<div class='alert alert-success fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Data mesin berhasil diubah</strong> .</div>");
		}

		redirect('mesin_cuci');
	}
	function form_edit($id_mesin)
	{	
		$kategori=$this->db->get('mesin_kategori')->result();
		$k['']="- Pilih Kategori -";
		$data['parameter']=$this->m_mesin->paramById($id_mesin);
		foreach($kategori as $kat){
			$k[$kat->id_mesin_kategori]=$kat->nama_mesin_kategori;
		}
		$data['kategori']=$k;
		$data['id_mesin']=$id_mesin;
		$data['value']=$this->m_mesin->getMsnById($id_mesin);
		$this->load->view('page_edit', $data);
	}
	function hapus()
	{
		$id_mesin=$this->input->post('id');
		$this->db->trans_begin();
		$this->m_mesin->dellDtl($id_mesin);
		$this->m_mesin->dell($id_mesin);
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $this->session->set_flashdata('msg', "<div class='alert alert-danger fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Data mesin gagal dihapus</strong> .</div>");
		}
		else
		{
		    $this->db->trans_commit();
		    $this->session->set_flashdata('msg', "<div class='alert alert-success fade in'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><strong>Data mesin berhasil dihapus</strong> .</div>");
		}

		redirect('mesin_cuci');
	}
	function form_detail($id_mesin)
	{
		$data['id_mesin']=$id_mesin;
		$data['value']=$this->m_mesin->getMsnById($id_mesin);
		$data['parameter']=$this->m_mesin->paramById($id_mesin);
		$this->load->view('page_detail', $data);
	}
	function form_nilai($id_mesin)
	{
		$data['value']=$this->m_mesin->getMsnById($id_mesin);
		$data['nilai']=$this->getNilai($id_mesin);
		$this->load->view('page_nilai', $data);
	}
	function getNilai($id_mesin)
	{
		$parameter=$this->db->get('tran_parameter')->result();
		$arr=array();
		foreach($parameter as $param)
		{
			$data['nama']=$param->nama_parameter." (".$param->satuan.")";
			$cek=$this->m_mesin->getValueBobot($param->id_parameter,$id_mesin);
			if($cek){
				$data['kecil']=$cek->nilai_1;
				$data['sedang']=$cek->nilai_2;
				$data['tinggi']=$cek->nilai_3;
			}else{
				$data['kecil']="0";
				$data['sedang']="0";
				$data['tinggi']="0";
			}
			array_push($arr, (object)$data);
		}
		return $arr;
	}
}

/* End of file mesin_cuci.php */
/* Location: ./application/modules/mesin_cuci/controllers/mesin_cuci.php */