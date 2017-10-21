<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Transaksi_model extends CI_Model {

		
		private $table = 'transaksi_detail';


		public function read_all_transaksi(){

			$this->db->select('*');
			$this->db->from('transaksi_master');
			//$this->db->join('transaksi_detail', 'transaksi_detail.kd_transaksi')
			$query = $this->db->get();
			return $query->result();
		}


		public function create_transaksi($table, $data){
			$this->db->insert($table, $data);
			return $this->db->insert_id();
		}


		public function save($id){

		}

		public function delete_transaksi_master($id){

			$this->db->where('kd_transaksi', $id);
			$this->db->delete('transaksi_master');
		}
		public function delete_transaksi_detail($id){

			$this->db->where('kd_transaksi', $id);
			$this->db->delete($this->table);
		}

	}

?>