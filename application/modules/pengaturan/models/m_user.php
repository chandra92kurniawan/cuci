<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	function getDtUser()
	{
		$this->db->where('id_role !=', '1');
		return $this->db->get('adm_user')->result();
	}
	function CekUsername($user)
	{
		$this->db->where('username', $user);
		return $this->db->get('adm_user')->num_rows();
	}
}

/* End of file m_user.php */
/* Location: ./application/modules/pengaturan/models/m_user.php */