<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_member extends CI_Model {

	function getMember()
	{
		return $this->db->get('member')->result();
	}
	function hapus($id)
	{
		$this->db->where('MemberID', $id);
		$this->db->delete('member');
	}
	function getById($id)
	{
		$this->db->where('MemberID', $id);
		return $this->db->get('member')->row();
	}
}

/* End of file m_barang.php */
/* Location: ./application/modules/barang/models/m_barang.php */