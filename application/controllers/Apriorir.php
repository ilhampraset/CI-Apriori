<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apriorir extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library(array('session', 'form_validation'));
		   
		if ($this->session->userdata('username')=="" ) {
			$this->session->sess_destroy();
			redirect('auth');
		}
		

		$this->load->model('transaksi_model');
		//$this->load->model('barang_model');
		$this->load->model('apriori_model');
		$this->load->library('Malasngoding');
		$this->load->library('Apriori');
	}

	public function index()
	{
	
		$data = array();

        $query = $this->db->query("select kd_barang from barang");


        foreach ($query->result() as $a) {
        	
        
		$data['items'] = $this->apriori_model->read_count_item($a->kd_barang);

		
		}

		$this->load->view('count_item_view', $data);
	}


	public function test(){
		$data['transaksi'] = $this->transaksi_model->read_all_transaksi();
		$data['db'] = $this->apriori_model->read_db_transaksi();
		$data['td'] = $this->apriori_model->read_db_tdetail();
		$this->load->view('test_view', $data);
	}

}
