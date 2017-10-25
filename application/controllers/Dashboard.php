<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library(array('session', 'form_validation'));
		$this->load->helper('apriori_helper');
		   
		if ($this->session->userdata('username')=="" ) {
			$this->session->sess_destroy();
			redirect('auth');
		}
		

		$this->load->helper('apriori_helper');
		
		
	}

	public function index()
	{
		$data['a'] = test();
		$this->load->view('dashboard_view', $data);
	}

	public function date(){
		$this->load->view('datetimpicker');
	}

	
}
