<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sample extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('security');
	}
	public function index()
	{
		$data['judul']="TEST";
		$this->load->view('template/_head',$data);
		$this->load->view('template/_page');
		$this->load->view('template/_footer');
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
            array('width' => 40, 'title' => 'Harga'),
            array('width' => 30, 'title' => 'Gambar')
        );
	      	foreach ($field as $value) {
        	 $pdf->Cell($value['width'],10,$value['title'],'TB',0,'L');
        	}

        	
	      $pdf -> setFont ('times','B','20');
	      $pdf -> write (10,"Description");
	     
	      $pdf -> output ('your_file_pdf.pdf','D');     
	  }
	  function tes()
	  {
	  	$ip = $_SERVER['REMOTE_ADDR'];
		echo $ip;
		print_r($this->session->all_userdata());
	  }
}

/* End of file sample.php */
/* Location: ./application/modules/sample/controllers/sample.php */