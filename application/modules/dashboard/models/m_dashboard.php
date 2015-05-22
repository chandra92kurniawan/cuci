<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	function getAllMesin($page,$mulai)
	{
		$this->db->join('mesin_kategori', 'mesin_kategori.id_mesin_kategori = mesin.id_mesin_kategori');
		$this->db->join('mesin_dtl', 'mesin_dtl.id_mesin = mesin.id_mesin and id_parameter="1"');
		if($page!=0 or $mulai!=0){
			return $this->db->get('mesin', $page, $mulai);
		}else{
			return $this->db->get('mesin');
		}
	}

}

/* End of file m_dashboard.php */
/* Location: ./application/modules/dashboard/models/m_dashboard.php */