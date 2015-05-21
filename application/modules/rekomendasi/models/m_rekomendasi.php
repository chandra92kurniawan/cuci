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
}

/* End of file m_rekomendasi.php */
/* Location: ./application/modules/rekomendasi/models/m_rekomendasi.php */