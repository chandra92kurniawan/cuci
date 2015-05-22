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
	function getDtlKategori($id)
	{
		$this->db->where('id_mesin_kategori', $id);
		return $this->db->get('mesin_kategori')->row();
	}
	function getAllMesin($page,$mulai,$id)
	{
		$this->db->join('mesin_kategori', 'mesin_kategori.id_mesin_kategori = mesin.id_mesin_kategori and mesin_kategori.id_mesin_kategori="'.$id.'"');
		$this->db->join('mesin_dtl', 'mesin_dtl.id_mesin = mesin.id_mesin and id_parameter="1"');
		if($page!=0 or $mulai!=0){
			return $this->db->get('mesin', $page, $mulai);
		}else{
			return $this->db->get('mesin');
		}
	}
}

/* End of file m_kategori.php */
/* Location: ./application/modules/kategori/models/m_kategori.php */
