<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
	function getKategori()
	{
		return $this->db->get('mesin_kategori')->result();
	}
	function getJumlahMesin($id_mesin_kategori)
	{
		$this->db->where('id_mesin_kategori', $id_mesin_kategori);
		return $this->db->get('mesin')->num_rows();
	}

}

/* End of file m_kategori.php */
/* Location: ./application/modules/kategori/models/m_kategori.php */
