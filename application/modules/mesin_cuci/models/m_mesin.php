<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mesin extends CI_Model {

	function update($gambar,$id_mesin)
	{
		$this->db->where('id_mesin', $id_mesin);
		$this->db->update('mesin', $gambar);
	}
	function getDtMesin()
	{
		$this->db->join('mesin_kategori', 'mesin_kategori.id_mesin_kategori = mesin.id_mesin_kategori');
		$this->db->join('mesin_dtl', 'mesin_dtl.id_mesin = mesin.id_mesin and id_parameter="1"');
		return $this->db->get('mesin')->result();
	}
	function insert($data)
	{
		$this->db->insert('mesin', $data);
		return $this->db->insert_id();
	}
	function getMsnById($id_mesin)
	{
		$this->db->where('id_mesin', $id_mesin);
		$this->db->join('mesin_kategori', 'mesin_kategori.id_mesin_kategori = mesin.id_mesin_kategori');
		return $this->db->get('mesin')->row();
	}
	function paramById($id_mesin)
	{
		$this->db->where('id_mesin', $id_mesin);
		$this->db->join('tran_parameter', 'tran_parameter.id_parameter = mesin_dtl.id_parameter');
		return $this->db->get('mesin_dtl')->result();
	}
	function dellDtl($id_mesin)
	{
		$this->db->where('id_mesin', $id_mesin);
		$this->db->delete('mesin_dtl');
	}
	function dell($id_mesin)
	{
		$this->db->where('id_mesin', $id_mesin);
		$this->db->delete('mesin');
	}
	function getValueBobot($id_parameter,$id_mesin)
	{
		$this->db->where('id_parameter', $id_parameter);
		$this->db->where('id_mesin', $id_mesin);
		return $this->db->get('mesin_bobot_nilai')->row();
	}
}

/* End of file m_mesin.php */
/* Location: ./application/modules/mesin_cuci/models/m_mesin.php */