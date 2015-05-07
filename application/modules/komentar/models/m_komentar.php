<?php 
class M_komentar extends CI_Model{

	function getKomentar()
	{
	    $qry = "SELECT id_komen,
				Username, isi, nama_restoran, tgl_komen 
				FROM komen JOIN member JOIN tbl_restoran 
				WHERE member.MemberID = komen.uid 
				AND tbl_restoran.id_restoran = komen.id_restoran";
		return $this->db->query($qry)->result();
		
	}
	function hapus_data($id){
		$this->db->where('id_komen', $id);
		$this->db->delete('komen'); 
	}
	function getById($id)
	{
		$this->db->where('id_komen', $id);
		return $this->db->get('komen')->row();
	}
}
