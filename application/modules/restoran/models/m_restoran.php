<?php 
class M_restoran extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function getRestoran()
	{
		$db = $this->db->get('tbl_restoran')->result();
		return $db;
		/*if($query->num_rows > 0) {  //cek jika data ada alias jml baris lbh dari 0

            return $query->result(); //mengembalikan hasil query
        }else {
            return NULL; //jika data tidak ada mengembalikan nilai koson (NULL)
        }*/
	}
	function tambah(){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
		$config['file_name']     = 'foto_restoran';
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto_restoran'))
		{
			$error = array('error' => $this->upload->display_errors());
			
			$this->load->view('upload_form', $error);
		}
		else
		{
			$upload=$this->upload->data();
			$ext = $upload['file_ext'];
			$name="foto_restoran".$ext;
			$data = array('upload_data' => $this->upload->data());
			$data=array(
				'nama_restoran'=>$this->input->post('nama_restoran'),
				'alamat_restoran'=>$this->input->post('alamat_restoran'),
				'telp_restoran'=>$this->input->post('telp_restoran'),
				'foto_restoran'=>$this->input->post('foto_restoran'),
				'jenis_masakan'=>$this->input->post('jenis_masakan'),
				'latitude'=>$this->input->post('latitude'),
				'longitude'=>$this->input->post('longitude'),
				'rating'=>$this->input->post('rating')
				);
			$this->load->view('restoran', $data);
		}
		$this->db->insert('tbl_restoran',$data);
	}
	function hapus_data($id){
		$this->db->where('id_restoran', $id);
		$this->db->delete('tbl_restoran'); 
	}
	function getById($id)
	{
		$this->db->where('id_restoran', $id);
		return $this->db->get('tbl_restoran')->row();
	}
	function update($data,$id)
	{
		$this->db->where('id_restoran', $id);
		$this->db->update('tbl_restoran', $data);
	}
	
}