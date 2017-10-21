<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct() {

		parent::__construct();

		 $this->load->helper(array('form'));


		$this->load->library(array('session', 'form_validation'));


              
		   
		if ($this->session->userdata('username')=="" ) {
			$this->session->sess_destroy();
			redirect('auth');
		}
		

		$this->load->model('barang_model');
		
		
	}

	public function index()
	{
		$data['barang'] = $this->barang_model->read_all();
		
		$this->load->view('barang_view', $data);
	}

	public function show(){
		$data['barang'] = $this->barang_model->read_all();
		echo json_encode($data);
	}

	public function store(){
		 $this->form_validation->set_rules('kd_barang', 'Kode Barang', 'required');
                $this->form_validation->set_rules('nama_barang', 'Nama Brang', 'required');
		$data =  array('kd_barang' => $this->input->post('kd_barang') ,
						'nama_barang' => $this->input->post('nama_barang'),

		 );
		$this->barang_model->create($data);
		echo json_encode(array('status' => TRUE ));
	}

	public function edit($id){
		$data= $this->barang_model->read_id($id);
		echo json_encode($data);
	}

	public function update(){

		$data = array('kd_barang'=> $this->input->post('kd_barang'),
					  'nama_barang' => $this->input->post('nama_barang'),
			);
		$this->barang_model->update(array('kd_barang' => $this->input->post('old_kode')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function destroy($id){
		$this->barang_model->delete($id);
		echo json_encode(array("status" => TRUE));
	}
}
