<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kriteria extends CI_Model {

	function cekForValue($id_parameter,$a)
	{
		$this->db->where('id_parameter', $id_parameter);
		$this->db->where('nilai', $a);
		return $this->db->get('mesin_bobot');
	}
	function update($id_mesin_bobot,$data)
	{
		$this->db->where('id_mesin_bobot', $id_mesin_bobot);
		$this->db->update('mesin_bobot', $data);
	}
	function dataDtl($id_parameter)
	{
		$kecil=$this->getValue('1',$id_parameter);
		if($kecil){
			$data['kecil_1']=$kecil->nilai_1;
			$data['kecil_2']=$kecil->nilai_2;
		}else{
			$data['kecil_1']="0";
			$data['kecil_2']="0";
		}

		$sedang=$this->getValue('2',$id_parameter);
		if($sedang){
			$data['sedang_1']=$sedang->nilai_1;
			$data['sedang_2']=$sedang->nilai_2;
			$data['sedang_3']=$sedang->nilai_3;
		}else{
			$data['sedang_1']="0";
			$data['sedang_2']="0";
			$data['sedang_3']="0";
		}

		$besar=$this->getValue('3',$id_parameter);
		if($besar){
			$data['besar_1']=$besar->nilai_1;
			$data['besar_2']=$besar->nilai_2;
		}else{
			$data['besar_1']="0";
			$data['besar_2']="0";
		}
		return (object)$data;
	}
	function getValue($nilai,$parameter)
	{
		$this->db->where('id_parameter', $parameter);
		$this->db->where('nilai', $nilai);
		return $this->db->get('mesin_bobot')->row();
	}
	function cekValue($id_parameter)
	{
		$this->db->where('id_parameter', $id_parameter);
		$cekparam=$this->db->get('mesin_bobot')->num_rows();
		if($cekparam==0){$data['cek']="0";}else{$data['cek']="1";}
		$countMesin=$this->db->get('mesin')->num_rows();
		$countNilai=$this->db->query("SELECT DISTINCT(id_mesin) FROM `mesin_bobot_nilai` where id_parameter='$id_parameter'")->num_rows();
		$hasil=$countMesin-$countNilai;
		$data['hasil']=$hasil;
		return (object)$data;
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
}

/* End of file m_kriteria.php */
/* Location: ./application/modules/pengaturan/models/m_kriteria.php */