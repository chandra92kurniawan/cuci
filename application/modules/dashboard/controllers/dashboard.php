<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
	}
	public function index()
	{
		//pengaturan pagination
		 $config['base_url'] = base_url().'dashboard/index/';		 
		 $config['per_page'] = '12';
		 $config['first_page'] = 'Awal';
		 $config['last_page'] = 'Akhir';
		 $config['next_page'] = '«';
		 $config['prev_page'] = '»';
		 $config['total_rows'] = $this->m_dashboard->getAllMesin(0,0)->num_rows();
		 //inisialisasi config
		 $this->pagination->initialize($config);

		//buat pagination
		 $data['halaman'] = $this->pagination->create_links();

		//tamplikan data
		 $data['query'] = $this->m_dashboard->getAllMesin($config['per_page'], $this->uri->segment(3));
		$data['judul']="Dashboard";
		//print_r($data['halaman']);
		$this->load->view('template/_head',$data);
		$this->load->view('page_index',$data);
		$this->load->view('template/_footer');    
	}

}

/* End of file dashboard.php */
/* Location: ./application/modules/dashboard/controllers/dashboard.php */