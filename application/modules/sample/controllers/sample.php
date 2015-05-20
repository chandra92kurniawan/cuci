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
		$str="admin";
		echo do_hash($str,'md5');
	}

}

/* End of file sample.php */
/* Location: ./application/modules/sample/controllers/sample.php */