<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_latihan1 extends CI_Model {

	function getData()
	{	
		
		return $this->db->get('user')->result();
		  
	}
	function update($data,$user)
	{
		$this->db->where('username', $user);
		$this->db->update('user', $data);
	}
	function hapus($user)
	{
		$this->db->where('username', $user);
		$this->db->delete('user');
	}
}

/* End of file m_latihan1.php */
/* Location: ./application/models/m_latihan1.php */