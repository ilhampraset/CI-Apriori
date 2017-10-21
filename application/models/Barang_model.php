<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Barang_model extends CI_Model {

		
		private $table = 'barang';

		public function create($data) {
			$this->db->insert($this->table, $data);
			return $this->db->insert_id();
		}

		public function read_all(){
			$this->db->select('*');
			$this->db->from($this->table);
			$query = $this->db->get();
			return $query->result();
		}

		public function read_id($id){
			$this->db->select('*');
			$this->db->from($this->table);
			$this->db->where('kd_barang', $id);
			$query = $this->db->get();
			return $query->row();
		}



		public function update($where, $data){
			$this->db->update($this->table, $data, $where);
			return $this->db->affected_rows();
		}

		public function delete($id){

			$this->db->where('kd_barang', $id);
			$this->db->delete($this->table);
		}

	}

?>