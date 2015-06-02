<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekomendasi extends CI_Model {
	function getOperator($a,$b)
	{
		$this->db->where('id_parameter_1', $a);
		$this->db->where('id_parameter_2', $b);
		$this->db->limit(1);
		return $this->db->get('tran_zadeh')->row();
	}
	function delbefore(){
		$this->db->where('date(date) <', date('Ymd'));
		$this->db->join('tran_fuzzy_dtl', 'tran_fuzzy_dtl.id_tran_fuzzy = tran_fuzzy.id_tran_fuzzy');
		$this->db->delete('tran_fuzzy');
	}
	function getMesin()
	{
		return $this->db->query("SELECT DISTINCT(mesin.id_mesin) as id_mesin from mesin join mesin_dtl on mesin.id_mesin=mesin_dtl.id_mesin where id_parameter in (select id_parameter from tran_parameter)")->result();
	}
	function getNilaiBobot($id_parameter,$id_mesin)
	{
		$this->db->where('id_parameter', $id_parameter);
		$this->db->where('id_mesin', $id_mesin);
		return $this->db->get('mesin_bobot_nilai')->row_array();
	}
	function getRekomendasi()
	{
		$this->db->where('id_tran_fuzzy', $this->session->userdata('id_tran_fuzzy'));
		$this->db->where('nilai_rekomendasi !=','0');
		$this->db->join('mesin', 'mesin.id_mesin = tran_fuzzy_dtl.id_mesin');
		$this->db->join('mesin_kategori', 'mesin_kategori.id_mesin_kategori = mesin.id_mesin_kategori');
		$this->db->join('mesin_dtl', 'mesin_dtl.id_mesin = mesin.id_mesin and id_parameter="1"');
		$this->db->order_by('nilai_rekomendasi', 'desc');
		return $this->db->get('tran_fuzzy_dtl')->result();
	}
}

/* End of file m_rekomendasi.php */
/* Location: ./application/modules/rekomendasi/models/m_rekomendasi.php */