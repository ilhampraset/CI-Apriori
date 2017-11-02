<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library(array('session', 'form_validation'));

		if ($this->session->userdata('username')=="" ) {
			$this->session->sess_destroy();
			redirect('auth');
		}
		$this->load->helper('apriori_helper');
		$this->load->library('apriori');

		$this->load->model('transaksi_model');
		$this->load->model('barang_model');
		$this->load->model('apriori_model');

	}



	public function index()
	{
		$data['transaksi'] = $this->transaksi_model->read_all_transaksi();
		$data['barang'] = $this->barang_model->read_all();
		//$data['transaksi'] = $this->transaksi_model->read_all_transaksi();
		//$data['db'] = $this->apriori_model->read_db_transaksi();
		$data['td'] = $this->apriori_model->read_db_tdetail();
		$this->load->view('transaksi_view', $data);
	}

	public function store(){
		//$kdbarang = implode(", ", $this->input->post('kd_barang'));
		 $kdbarang= $this->input->post('kd_barang');

		 $data =  array('kd_transaksi' => $this->input->post('kd_transaksi') ,
			 );
		 for ($i=0; $i < count($kdbarang); $i++) {

		 	$data2 =  array('kd_transaksi' => $this->input->post('kd_transaksi') ,
						'kd_barang' => $kdbarang[$i],
			 );
		 	//$query $this->db->query()
		//
			$this->transaksi_model->create_transaksi('transaksi_detail', $data2);
		 }
		$this->transaksi_model->create_transaksi('transaksi_master', $data);

		echo json_encode(array('status' => TRUE ));


	}


	public function edit($id){

	}

	public function update(){

	}

	public function destroy($id){
		$this->transaksi_model->delete_transaksi_master($id);
		$this->transaksi_model->delete_transaksi_detail($id);
		echo json_encode(array("status" => TRUE));
	}


}
