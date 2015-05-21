<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kriteria');
	}
	public function index()
	{
		$data['parameter']=$this->db->get('tran_parameter');
		$data['ceked']=$this->db->query("SELECT DISTINCT(id_parameter) FROM `mesin_bobot`")->num_rows();
		$data['judul']="Pengaturan / Kriteria Variable";

		$this->load->view('template/_head',$data);
		$this->load->view('kriteria/page_index');
		$this->load->view('template/_footer');	
	}
	function simpan(){
		$id_parameter=$this->input->post('id');
		$arr=array();$z=0;
		$this->db->trans_begin();

		for($a=1;$a<=3;$a++){
			if($a==1){
				$data=array('id_parameter'=>$id_parameter,
							'nilai'=>$a,
							'nilai_1'=>$this->input->post('kecil_a'),
							'nilai_2'=>$this->input->post('kecil_b'));
			}elseif ($a==2) {
				$data=array('id_parameter'=>$id_parameter,
							'nilai'=>$a,
							'nilai_1'=>$this->input->post('sedang_a'),
							'nilai_2'=>$this->input->post('sedang_b'),
							'nilai_3'=>$this->input->post('sedang_c'));
			}else{
				$data=array('id_parameter'=>$id_parameter,
							'nilai'=>$a,
							'nilai_1'=>$this->input->post('tinggi_a'),
							'nilai_2'=>$this->input->post('tinggi_b'));
			}

			$cek=$this->m_kriteria->cekForValue($id_parameter,$a);			
			if($cek->num_rows()==0){
				$z=1;
				//
				$this->db->insert('mesin_bobot', $data);
			}else{
				$this->m_kriteria->update($cek->row()->id_mesin_bobot,$data);
			}
		}
		$this->kecil($this->input->post('kecil_a'),$this->input->post('kecil_b'),$id_parameter);
		$this->sedang($this->input->post('sedang_a'),$this->input->post('sedang_b'),$this->input->post('sedang_c'),$id_parameter);
		$this->tinggi($this->input->post('tinggi_a'),$this->input->post('tinggi_b'),$id_parameter);
		//$this->db->insert_batch('mesin_bobot', $arr);
		if ($this->db->trans_status() === FALSE)
		{
		    $this->db->trans_rollback();
		    $pesan="data gagal disimpan";
		}
		else
		{
		    $this->db->trans_commit();
		    $pesan="data berhasil disimpan";
		}
		echo $pesan;
	}
	function tinggi($n1,$n2,$id_parameter){
		$data_mesin=$this->m_kriteria->getDtMesinByParameter($id_parameter);
		foreach($data_mesin as $data){			
			if($data->value<=$n1){
				$hasil=0;
			}else if($data->value>=$n1 and $data->value<=$n2){
				$hasil=($n2-$data->value)/($n2-$n1);
			}else{
				$hasil=1;
			}
			//echo $hasil."<br>";
			$cek=$this->m_kriteria->cekBobotNilai($data->id_mesin,$id_parameter);
			$dd=array('id_mesin'=>$data->id_mesin,
						'id_parameter'=>$id_parameter,
						'nilai_3'=>$hasil);
			if($cek->num_rows()==0){
				$this->db->insert('mesin_bobot_nilai', $dd);
			}else{
				$this->m_kriteria->updateBobotNilai($dd,$cek->row()->id_bobot_nilai);
			}
		}
	}
	
	function sedang($n1,$n2,$n3,$id_parameter){
		$data_mesin=$this->m_kriteria->getDtMesinByParameter($id_parameter);
		foreach($data_mesin as $data){
			if($data->value<=$n1 or $data->value>=$n3){
				$hasil=0;
			}else if($data->value>=$n1 and $data->value<=$n2){
				$hasil=($data->value-$n1)/($n2-$n1);
			}else if($data->value>=$n2 and $data->value<=$n3){
				$hasil=($data->value>=$n2)/($n3-$n2);
			}
			//echo $hasil;
			$cek=$this->m_kriteria->cekBobotNilai($data->id_mesin,$id_parameter);
			$dd=array('id_mesin'=>$data->id_mesin,
						'id_parameter'=>$id_parameter,
						'nilai_2'=>$hasil);
			if($cek->num_rows()==0){
				$this->db->insert('mesin_bobot_nilai', $dd);
			}else{
				$this->m_kriteria->updateBobotNilai($dd,$cek->row()->id_bobot_nilai);
			}
		}
	}
	function test(){
		$this->sedang('9','12','15','2');
	}
	function kecil($n1,$n2,$id_parameter)
	{
		$data_mesin=$this->m_kriteria->getDtMesinByParameter($id_parameter);
		foreach($data_mesin as $data){			
			if($data->value<=$n1){
				$hasil=1;
			}else if($data->value>=$n1 and $data->value<=$n2){
				$hasil=($n2-$data->value)/($n2-$n1);
			}else{
				$hasil=0;
			}
			//echo $hasil;
			$cek=$this->m_kriteria->cekBobotNilai($data->id_mesin,$id_parameter);
			$dd=array('id_mesin'=>$data->id_mesin,
						'id_parameter'=>$id_parameter,
						'nilai_1'=>$hasil);
			if($cek->num_rows()==0){
				$this->db->insert('mesin_bobot_nilai', $dd);
			}else{
				$this->m_kriteria->updateBobotNilai($dd,$cek->row()->id_bobot_nilai);
			}
		}
	} 
	function setAll()
	{
		$this->load->model('all_kriteria');
		$this->all_kriteria->master_bobot_kriteria();
		redirect('pengaturan/kriteria');
	}
	function my_function()
	{
	    $this->load->driver('cache');

		if ( ! $foo = $this->cache->get('foo'))
		{
		     echo 'Saving to the cache!<br />';
		     $foo = 'foobarbaz!';

		     // Save into the cache for 5 minutes
		     $this->cache->save('foo', $foo, 300);
		}
		var_dump($this->cache->get_metadata('foo'));
		echo $foo;
	}
}

/* End of file kriteria.php */
/* Location: ./application/modules/pengaturan/controllers/kriteria.php */