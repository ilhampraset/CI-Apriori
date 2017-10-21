<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library(array('session', 'form_validation'));
		   
		if ($this->session->userdata('username')=="" ) {
			$this->session->sess_destroy();
			redirect('auth');
		}
		

		//$this->load->model('transaksi_model');
		
		
	}

	public function index()
	{
		$this->load->view('dashboard_view');
	}

	
}
