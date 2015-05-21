<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_zadeh extends CI_Model {

	function getOperator($aa,$bb)
	{
		$this->db->where('id_parameter_1', $aa);
		$this->db->where('id_parameter_2', $bb);
		return $this->db->get('tran_zadeh')->row();
	}
	function delAl()
	{
		$this->db->empty_table('tran_zadeh');
	}
}

/* End of file m_zadeh.php */
/* Location: ./application/modules/pengaturan/models/m_zadeh.php */