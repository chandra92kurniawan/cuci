<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->model('m_rekomendasi');
	}
	public function index()
	{
		$data['parameter']=$this->db->get('tran_parameter')->result();
		$data['judul']="Rekomendasi (Fuzy Tahani)";
		$this->load->view('template/_head',$data);
		$this->load->view('page_index',$data);
		$this->load->view('template/_footer');	
	}
	function rekomended()
	{
		$parameter=$this->db->get('tran_parameter')->result();
		$sess=random_string('alnum', 16);
		//$this->m_rekomendasi->delbefore();

		$data=array('on_session'=>$sess,'date'=>date('Y:m:d H:i:s'));
		$this->db->insert('tran_fuzzy', $data);
		$id_tran_fuzzy=$this->db->insert_id();
		$array = array(
			'user' => $sess,
			'id_tran_fuzzy'=>$id_tran_fuzzy
		);		
		$this->session->set_userdata( $array );

		$mesin=$this->m_rekomendasi->getMesin();
		foreach($mesin as $m){
			$na='';$nb='';$nh='';$a='';$b='';$no=0;
			foreach($parameter as $param){
				if($no!=0){
					$b=$param->id_parameter;
					$nb=$this->input->post('option_'.$param->id_parameter);
					$nilai_b=$this->m_rekomendasi->getNilaiBobot($b,$m->id_mesin);
					$nilai2=$nilai_b['nilai_'.$nb];
					$operator=$this->m_rekomendasi->getOperator($a,$b);
					//echo "Nilai 2 atas ".$nilai2."<br>";
					if($operator->operator==1){
						if($nilai2>=$hasil){
							$hasil=$nilai2;
							//echo "operator ".$operator->operator." nilai1:".$nilai1.", nilai2:".$nilai2." hasil ".$hasil."<br><br>";
						}else if($hasil>=$nilai2){
							$hasil=$hasil;
							//echo "operator ".$operator->operator." nilai1:".$nilai1.", nilai2:".$nilai2." hasil ".$hasil."<br><br>";
						}
					}else{
						if($nilai2<=$hasil){
							$hasil=$nilai2;
							//echo "operator ".$operator->operator." nilai1:".$nilai1.", nilai2:".$nilai2." hasil ".$hasil."<br><br>";
						}else if($hasil<=$nilai2){
							$hasil=$hasil;
							//echo "operator ".$operator->operator." nilai1:".$nilai1.", nilai2:".$nilai2." hasil ".$hasil."<br><br>";
						}

					}
				}
				$na=$this->input->post('option_'.$param->id_parameter);
				$a=$param->id_parameter;
				$nilai_a=$this->m_rekomendasi->getNilaiBobot($a,$m->id_mesin);
				$nilai1=$nilai_a['nilai_'.$na];
				
				if($no==0){
					$hasil=$nilai1;	
					//echo "Nilai awal ".$hasil;
				}//else{
				//echo "nilai 1 bawah ".$hasil."<br>";
				//}	
				$no++;			
			}
			//insert to db
			$dt=array('id_mesin'=>$m->id_mesin,
					  'id_tran_fuzzy'=>$id_tran_fuzzy,
					  'nilai_rekomendasi'=>$hasil);
			$this->db->insert('tran_fuzzy_dtl', $dt);
		}
		redirect('rekomendasi/hasil');
	}
	function hasil()
	{
		$data['rekomen']=$this->m_rekomendasi->getRekomendasi();
		$data['judul']="Hasil Rekomendasi (Fuzy Tahani)";
		$this->load->view('template/_head',$data);
		$this->load->view('page_rekomendasi',$data);
		$this->load->view('template/_footer');
	}
	function test()
	{
		$this->session->sess_expiration = 5;
        $this->session->sess_expire_on_close = TRUE;
		/*$array = array(
			'username' => 'chandra'
		);
		
		$this->session->set_userdata( $array );*/
		echo "<pre>";print_r($this->session->all_userdata());
		
	}
	function form_detail($id_mesin)
	{
		$this->load->model('m_mesin');
		$data['id_mesin']=$id_mesin;
		$data['value']=$this->m_mesin->getMsnById($id_mesin);
		$data['parameter']=$this->m_mesin->paramById($id_mesin);
		$this->load->view('page_detail', $data);
	}
	function view_pdf(){
	      define('FPDF_FONTPATH',APPPATH .'plugins/fpdf/font/');
	      require(APPPATH .'plugins/fpdf/fpdf.php');
	     
	      $pdf = new FPDF('p','mm','A4');
	      $pdf -> AddPage();
	     
	      $pdf -> setDisplayMode ('fullpage');
	     
	      $pdf -> setFont ('times','B',20);
	      $pdf -> cell(200,5,"Rekomendasi Fuzzy Tahani",0,1);
	      $pdf->line(10,17,200,17);
	    $field = array(
            array('width' => 15, 'title' => 'No'),
            array('width' => 30, 'title' => 'Kategori'),
            array('width' => 50, 'title' => 'Mesin Cuci'),
            array('width' => 40, 'title' => 'Tabung'),
            array('width' => 40, 'title' => 'Harga')
        );$pdf->ln();	$pdf->ln();	
	      	foreach ($field as $value) {
        	 $pdf->Cell($value['width'],10,$value['title'],'TB',0,'L');
        	}

        $rekomen=$this->m_rekomendasi->getRekomendasi();
        $no=0;
        $pdf->ln();	
        foreach($rekomen as $rek){
        	$pdf->Cell(15,10,++$no,'TB',0,'L');
        	$pdf->Cell(30,10,$rek->nama_mesin_kategori,'TB',0,'L');
        	$pdf->Cell(50,10,$rek->nama_mesin,'TB',0,'L');
        	$pdf->Cell(40,10,$rek->jenis_tabung." tabung",'TB',0,'L');
        	$pdf->Cell(40,10,"Rp ".number_format($rek->value,"0","","."),'TB',0,'L');
        	$pdf->ln();	
        }

	      $pdf -> setFont ('times','B','20');
	      //$pdf -> write (10,"Description");
	     
	      $pdf -> output ('your_file_pdf.pdf','D');     
	  }
	function test2()
	{
		echo "<pre>";print_r($this->session->all_userdata());
	}
}

/* End of file rekomendasi.php */
/* Location: ./application/modules/rekomendasi/controllers/rekomendasi.php */