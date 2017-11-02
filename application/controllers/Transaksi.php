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
		$this->load->library('apriori');
		$this->load->helper('apriori_helper');

		$this->load->model('transaksi_model');
		$this->load->model('barang_model');

	}

	public function index()
	{
		$data['transaksi'] = $this->transaksi_model->read_all_transaksi();
		$data['barang'] = $this->barang_model->read_all();

		$this->load->view('transaksi_view', $data);
	}

	public function store(){
		$kdbarang = implode(", ", $this->input->post('kd_barang'));
		 //$kdbarang= $this->input->post('kd_barang');

		 $data =  array('kd_transaksi' => $this->input->post('kd_transaksi') ,
		 								'items' => $kdbarang

			 );

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
