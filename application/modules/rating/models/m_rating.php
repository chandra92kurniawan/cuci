<?php 
class M_rating extends CI_Model{

	function getRating()
	{
	    $qry = "SELECT
				Username, nama_restoran, rating_point 
				FROM rating JOIN member JOIN tbl_restoran 
				WHERE member.MemberID = rating.uid 
				AND tbl_restoran.id_restoran = rating.id_restoran";
		return $this->db->query($qry)->result();
		
	}
	function hapus_data($id){
		$this->db->where('id_rating', $id);
		$this->db->delete('rating'); 
	}
	
}
