<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All_kriteria extends CI_Model {
	function master_bobot_kriteria()
	{
		$bobot=$this->db->get('mesin_bobot')->result();
		foreach($bobot as $b){
			if($b->nilai==1){
				$this->kecil($b->nilai_1,$b->nilai_2,$b->id_parameter);
			}else if($b->nilai==2){
				$this->sedang($b->nilai_1,$b->nilai_2,$b->nilai_3,$b->id_parameter);
			}else if($b->nilai==3){
				$this->tinggi($b->nilai_1,$b->nilai_2,$b->id_parameter);
			}
		}
	}
	function getDtMesinByParameter($id_parameter)
	{
		$this->db->join('mesin_dtl', 'mesin_dtl.id_mesin = mesin.id_mesin');
		$this->db->where('id_parameter', $id_parameter);
		return $this->db->get('mesin')->result();
	}
	function cekBobotNilai($id_mesin,$id_parameter)
	{
		$this->db->where('id_mesin', $id_mesin);
		$this->db->where('id_parameter', $id_parameter);
		return $this->db->get('mesin_bobot_nilai');
	}
	function updateBobotNilai($data,$id_bobot_nilai)
	{
		$this->db->where('id_bobot_nilai', $id_bobot_nilai);
		$this->db->update('mesin_bobot_nilai', $data);
	}
	function tinggi($n1,$n2,$id_parameter){
		$data_mesin=$this->getDtMesinByParameter($id_parameter);
		foreach($data_mesin as $data){			
			if($data->value<=$n1){
				$hasil=0;
			}else if($data->value>=$n1 and $data->value<=$n2){
				$hasil=($n2-$data->value)/($n2-$n1);
			}else{
				$hasil=1;
			}
			//echo $hasil."<br>";
			$cek=$this->cekBobotNilai($data->id_mesin,$id_parameter);
			$dd=array('id_mesin'=>$data->id_mesin,
						'id_parameter'=>$id_parameter,
						'nilai_3'=>$hasil);
			if($cek->num_rows()==0){
				$this->db->insert('mesin_bobot_nilai', $dd);
			}else{
				$this->updateBobotNilai($dd,$cek->row()->id_bobot_nilai);
			}
		}
	}
	
	
	function sedang($n1,$n2,$n3,$id_parameter){
		$data_mesin=$this->getDtMesinByParameter($id_parameter);
		foreach($data_mesin as $data){
			if($data->value<=$n1 or $data->value>=$n3){
				$hasil=0;
			}else if($data->value>=$n1 and $data->value<=$n2){
				$hasil=($data->value-$n1)/($n2-$n1);
			}else if($data->value>=$n2 and $data->value<=$n3){
				$hasil=($data->value>=$n2)/($n3-$n2);
			}
			//echo $hasil;
			$cek=$this->cekBobotNilai($data->id_mesin,$id_parameter);
			$dd=array('id_mesin'=>$data->id_mesin,
						'id_parameter'=>$id_parameter,
						'nilai_2'=>$hasil);
			if($cek->num_rows()==0){
				$this->db->insert('mesin_bobot_nilai', $dd);
			}else{
				$this->updateBobotNilai($dd,$cek->row()->id_bobot_nilai);
			}
		}
	}
	
	function kecil($n1,$n2,$id_parameter)
	{
		$data_mesin=$this->getDtMesinByParameter($id_parameter);
		foreach($data_mesin as $data){			
			if($data->value<=$n1){
				$hasil=1;
			}else if($data->value>=$n1 and $data->value<=$n2){
				$hasil=($n2-$data->value)/($n2-$n1);
			}else{
				$hasil=0;
			}
			//echo $hasil;
			$cek=$this->cekBobotNilai($data->id_mesin,$id_parameter);
			$dd=array('id_mesin'=>$data->id_mesin,
						'id_parameter'=>$id_parameter,
						'nilai_1'=>$hasil);
			if($cek->num_rows()==0){
				$this->db->insert('mesin_bobot_nilai', $dd);
			}else{
				$this->updateBobotNilai($dd,$cek->row()->id_bobot_nilai);
			}
		}
	} 

}

/* End of file all_kriteria.php */
/* Location: ./application/models/all_kriteria.php */