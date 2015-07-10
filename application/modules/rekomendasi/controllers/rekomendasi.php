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
	/*function rekomended()
	{
		$parameter=$this->db->get('tran_parameter')->result();
		$sess=random_string('alnum', 16);
		//$this->m_rekomendasi->delbefore();

		$data=array('on_session'=>$sess,'date'=>date('Y:m:d H:i:s'),
					'nama_lengkap'=>$this->input->post('nama_lengkap'),
					'alamat'=>$this->input->post('alamat'),
					'usia'=>$this->input->post('usia'));
		$this->db->insert('tran_fuzzy', $data);
		$id_tran_fuzzy=$this->db->insert_id();
		$table_user=array('id_tran_fuzzy'=>$id_tran_fuzzy,
						'nama'=>$this->input->post('nama_lengkap'),
						'alamat'=>$this->input->post('alamat'),
						'usia'=>$this->input->post('usia'));
		$this->db->insert('tabel_user', $table_user);
		$array = array(
			'user' => $sess,
			'id_tran_fuzzy'=>$id_tran_fuzzy
		);		
		$this->session->set_userdata( $array );

		/*$mesin=$this->m_rekomendasi->getMesin();
		foreach($mesin as $m){
			$na='';$nb='';$nh='';$a='';$b='';$no=0;
			foreach($parameter as $param){
				if($no!=0){
					$b=$param->id_parameter;
					$nb=$this->input->post('option_'.$param->id_parameter);
					$nilai_b=$this->m_rekomendasi->getNilaiBobot($b,$m->id_mesin);
					$nilai2=$nilai_b['nilai_'.$nb];
					$operator=$this->m_rekomendasi->getOperator($a,$b);
					echo "Nilai 2 atas ".$nilai2."<br>";
					if($operator->operator==2){
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
					echo "Nilai awal ".$hasil;
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
	}*/
	function rekomended()
	{
		$parameter=$this->db->get('tran_parameter')->result();
		$sess=random_string('alnum', 16);
		//$this->m_rekomendasi->delbefore();

		$data=array('on_session'=>$sess,'date'=>date('Y:m:d H:i:s'),
					'nama_lengkap'=>$this->input->post('nama_lengkap'),
					'alamat'=>$this->input->post('alamat'),
					'usia'=>$this->input->post('usia'));
		$this->db->insert('tran_fuzzy', $data);
		$id_tran_fuzzy=$this->db->insert_id();
		$table_user=array('id_user'=>$id_tran_fuzzy,
						'nama'=>$this->input->post('nama_lengkap'),
						'alamat'=>$this->input->post('alamat'),
						'usia'=>$this->input->post('usia'));
		$this->db->insert('tabel_user', $table_user);
		$array = array(
			'user' => $sess,
			'id_tran_fuzzy'=>$id_tran_fuzzy
		);		
		$this->session->set_userdata( $array );
		foreach($parameter as $p){
			if(isset($_POST['option_'.$p->id_parameter])){
				$pr[]=$p->id_parameter;	
			}
			//echo $this->input->post('option_'.$p->id_parameter)." <br>";
		}
		//print_r($pr);
		$mesin=$this->m_rekomendasi->getMesin();
		foreach($mesin as $m){
			$na='';$nb='';$nh='';$a='';$b='';$no=0;
			foreach($pr as $param){
				if($no!=0){
					$b=$param;
					$nb=$this->input->post('option_'.$param);
					$nilai_b=$this->m_rekomendasi->getNilaiBobot($b,$m->id_mesin);
					$nilai2=$nilai_b['nilai_'.$nb];
					$b=$no+1;
					//echo "operator ".$no." dengan operator ".$b."<br>";
					$operator=$this->m_rekomendasi->getOperator($no,$b);
					//echo "Nilai 2 atas ".$nilai2."<br>";
					if($operator->operator==2){
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
				$na=$this->input->post('option_'.$param);
				$a=$param;
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
		$data['mesin']=$this->db->get('mesin_kategori')->result();
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
	function prometheeRT()
	{
		$id_fuzzy=$this->session->userdata('id_tran_fuzzy');		
		$pr=$this->input->post('pr');
		$this->m_rekomendasi->delAllProm($id_fuzzy);
		$no=1;
		foreach($pr as $p){
			$urut[]=array('no_urut'=>$no,'urut'=>$p,'id_tran_fuzzy'=>$id_fuzzy,'persentase'=>$this->m_rekomendasi->persentase($no));
			$no++;
		}
		$this->db->insert_batch('prom_urut', $urut);
		$garansi=$this->input->post('garansi');
		foreach($garansi as $garansi){
			$gar[]=array('garansi'=>$garansi,'id_tran_fuzzy'=>$id_fuzzy);
		}
		$this->db->insert_batch('prom_garansi', $gar);
		$merk=$this->input->post('merk');
		foreach($merk as $m){
			$mer[]=array('id_tran_fuzzy'=>$id_fuzzy,'id_mesin_kategori'=>$m);	
		}
		$this->db->insert_batch('prom_pilih_mesin', $mer);
		$rekomen=$this->m_rekomendasi->getRekomendasi();
		foreach($rekomen as $rek){
			for($a=1;$a<=5;$a++){
				if($a==1){	
					$bobot=1;//kategori mesin yang tidak terpilih
					$masukOrTidak=$this->m_rekomendasi->masukOrTidak($id_fuzzy,$rek->id_mesin_kategori);
					if($masukOrTidak!=0){
						$bobot=3;//kategori mesin yang terpilih
					}					
				}else if($a==2){
					$air=$this->input->post('air');
					if($air==1){//melimpah
						$bobot=2;//untuk jenis satu tabung
						if($rek->jenis_tabung==2){
							$bobot=3;//untuk jenis 2 tabung
						}
					}else{// tidak melimpah
						$bobot=1;//untuk jenis 2 tabung
						if($rek->jenis_tabung==1){
							$bobot=3;//untuk jenis 1 tabung
						}
					}
				}else if($a==3){
					$bobot=1;//garansi mesin yang tidak dipilih
					$getGaransi=$this->m_rekomendasi->getGaransi($id_fuzzy,$rek->garansi);
					if($getGaransi!=0){
						$bobot=3;
					}
				}else if($a==4){
					$jmlOrang=$this->input->post('orang');
					$getKapasitas=$this->m_rekomendasi->getKapasitas($rek->id_mesin);
					if($jmlOrang<=5){
						if($getKapasitas<=6){
							$bobot=3;
						}else if($getKapasitas==7){
							$bobot=2;
						}else if($getKapasitas>=8){
							$bobot=1;
						}
					}else{
						if($getKapasitas<=6){
							$bobot=1;
						}else if($getKapasitas==7){
							$bobot=2;
						}else if($getKapasitas>=8){
							$bobot=3;
						}
					}
				}else  if($a==5){
					$waktu=$this->input->post('waktu');
					if($waktu=='s'){
						$bobot=1;
						if($rek->jenis_tabung==1){
							$bobot=3;
						}
					}else if($waktu=='b'){
						$bobot=3;
						if($rek->jenis_tabung=1){
							$bobot=1;
						}
					}
				}
				$prs=$this->m_rekomendasi->getPresentase($a,$id_fuzzy);
				$hasil=($bobot*$prs)/100;
				$data[]=array(  'kriteria'=>$a,
								'id_mesin'=>$rek->id_mesin,
								'nilai'=>$bobot,
								'hasil'=>$hasil,
								'id_tran_fuzzy'=>$id_fuzzy);
			}
		}
		$this->db->insert_batch('prom_prosentase', $data);

		$rekomen=$this->m_rekomendasi->getRekomendasi();
		$rekomendasi=$this->m_rekomendasi->getRekomendasi();
		$no=0;$n1=0;$n2=0;
		for($a=1;$a<=5;$a++){
			$param=$this->m_rekomendasi->getParameter($a);
			//else if($a==2){$param=}	
			foreach($rekomen as $rek){
				$nilai1=$this->m_rekomendasi->getHasil($a,$rek->id_mesin,$id_fuzzy);				
				foreach($rekomendasi as $rr){
					$nilai2=$this->m_rekomendasi->getHasil($a,$rr->id_mesin,$id_fuzzy);
					$d=$nilai1-$nilai2;
					if($d>= -abs($param) and $d<=$param){
						$hasil=0;
						if($a==3 or $a==4)
						{
							$hasil=$d/$param;
						}	
					}else if($d< -abs($param) and $d>$param){
						$hasil=1;
					}
					$preferensi[]=array('id_mesin1'=>$rek->id_mesin,
										'id_mesin2'=>$rr->id_mesin,
										'preferensi'=>$hasil,
										'id_tran_fuzzy'=>$id_fuzzy);
						
				}
			}
		}
		$this->db->insert_batch('prom_preferensi', $preferensi);

		//menentukan preferensi indeks
		foreach($rekomen as $rek){
			$entering=$this->m_rekomendasi->getLeavingOrEntering($rek->id_mesin,$id_fuzzy,'id_mesin1');
			$leaving=$this->m_rekomendasi->getLeavingOrEntering($rek->id_mesin,$id_fuzzy,'id_mesin2');
			$indeks[]=array('leaving_flow'=>$leaving,
							'entering_flow'=>$entering,
							'id_tran_fuzzy'=>$id_fuzzy,
							'id_mesin'=>$rek->id_mesin);
		}
		$this->db->insert_batch('prom_preferensi_indeks', $indeks);
		redirect('rekomendasi/form_for_promethee');
	}
	function prometheeBS()
	{
		$id_fuzzy=$this->session->userdata('id_tran_fuzzy');		
		$pr=$this->input->post('bi');
		$this->m_rekomendasi->delAllProm($id_fuzzy);
		$merk=$this->input->post('merk');
		foreach($merk as $m){
			$mer[]=array('id_tran_fuzzy'=>$id_fuzzy,'id_mesin_kategori'=>$m);	
		}
		$this->db->insert_batch('prom_pilih_mesin', $mer);
		$garansi=$this->input->post('garansi');
		foreach($garansi as $garansi){
			$gar[]=array('garansi'=>$garansi,'id_tran_fuzzy'=>$id_fuzzy);
		}
		$this->db->insert_batch('prom_garansi', $gar);
		$no=1;
		foreach($pr as $p){
			$urut[]=array('no_urut'=>$no,'urut'=>$p,'id_tran_fuzzy'=>$id_fuzzy,'persentase'=>$this->m_rekomendasi->persentase($no));
			$no++;
		}
		$this->db->insert_batch('prom_urut', $urut);
		
		
		$rekomen=$this->m_rekomendasi->getRekomendasi();
		foreach($rekomen as $rek){
			for($a=1;$a<=5;$a++){
				if($a==1){	
					$bobot=1;//kategori mesin yang tidak terpilih
					$masukOrTidak=$this->m_rekomendasi->masukOrTidak($id_fuzzy,$rek->id_mesin_kategori);
					if($masukOrTidak!=0){
						$bobot=2;//kategori mesin yang terpilih
					}
					if($rek->id_mesin_kategori==6){
						$bobot=3;//kategori mesin electrolux
					}					
				}else if($a==2){
					$bobot=1;//untuk jenis 2 tabung
					if($rek->jenis_tabung==1){
						$bobot=3;//untuk jenis 1 tabung
					}					
				}else if($a==3){
					$bobot=1;//garansi mesin yang tidak dipilih
					$getGaransi=$this->m_rekomendasi->getGaransi($id_fuzzy,$rek->garansi);
					if($getGaransi!=0){
						$bobot=3;
					}
				}else if($a==4){
					$getKapasitas=$this->m_rekomendasi->getKapasitas($rek->id_mesin);
					if($getKapasitas<=6){
						$bobot=1;
					}else if($getKapasitas>=7 and $getKapasitas<=10){
						$bobot=2;
					}else if($getKapasitas>=11){
						$bobot=3;
					}					
				}else  if($a==5){
					if($rek->bukaan_pintu==1){
						$bobot=1;
					}else if($rek->bukaan_pintu==2){
						$bobot=3;
					}
				}
				$prs=$this->m_rekomendasi->getPresentase($a,$id_fuzzy);
				$hasil=($bobot*$prs)/100;
				$data[]=array(  'kriteria'=>$a,
								'id_mesin'=>$rek->id_mesin,
								'nilai'=>$bobot,
								'hasil'=>$hasil,
								'id_tran_fuzzy'=>$id_fuzzy);
			}
		}
		$this->db->insert_batch('prom_prosentase', $data);

		$rekomen=$this->m_rekomendasi->getRekomendasi();
		$rekomendasi=$this->m_rekomendasi->getRekomendasi();
		$no=0;$n1=0;$n2=0;
		for($a=1;$a<=5;$a++){
			$param=$this->m_rekomendasi->getParameter($a);
			//else if($a==2){$param=}	
			foreach($rekomen as $rek){
				$nilai1=$this->m_rekomendasi->getHasil($a,$rek->id_mesin,$id_fuzzy);				
				foreach($rekomendasi as $rr){
					$nilai2=$this->m_rekomendasi->getHasil($a,$rr->id_mesin,$id_fuzzy);
					$d=$nilai1-$nilai2;
					if($d>= -abs($param) and $d<=$param){
						$hasil=0;
						if($a==1)
						{
							$hasil=$d/$param;
						}	
					}else if($d< -abs($param) and $d>$param){
						$hasil=1;
					}
					$preferensi[]=array('id_mesin1'=>$rek->id_mesin,
										'id_mesin2'=>$rr->id_mesin,
										'preferensi'=>$hasil,
										'id_tran_fuzzy'=>$id_fuzzy);
						
				}
			}
		}
		$this->db->insert_batch('prom_preferensi', $preferensi);

		//menentukan preferensi indeks
		foreach($rekomen as $rek){
			$entering=$this->m_rekomendasi->getLeavingOrEntering($rek->id_mesin,$id_fuzzy,'id_mesin1');
			$leaving=$this->m_rekomendasi->getLeavingOrEntering($rek->id_mesin,$id_fuzzy,'id_mesin2');
			$indeks[]=array('leaving_flow'=>$leaving,
							'entering_flow'=>$entering,
							'id_tran_fuzzy'=>$id_fuzzy,
							'id_mesin'=>$rek->id_mesin);
		}
		$this->db->insert_batch('prom_preferensi_indeks', $indeks);
		redirect('rekomendasi/form_for_promethee');
	}
	function form_for_promethee()
	{
		$data['promethee']=$this->m_rekomendasi->getPromethee();
		$data['rekomen']=$this->m_rekomendasi->getRekomendasi();
		$data['judul']="Hasil Rekomendasi (Fuzy Tahani)";
		$this->load->view('template/_head',$data);
		$this->load->view('page_promethee',$data);
		$this->load->view('template/_footer');
	}
}

/* End of file rekomendasi.php */
/* Location: ./application/modules/rekomendasi/controllers/rekomendasi.php */