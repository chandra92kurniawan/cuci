<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	function cekpass($user,$pass){
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		return $this->db->get('adm_user')->num_rows();
	}	

}

/* End of file m_login.php */
/* Location: ./application/models/m_login.php */