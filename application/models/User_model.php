<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class User_model extends CI_Model {

		public function cek_auth($data) {
			$query = $this->db->get_where('users', $data);
			return $query;
		}

		public function get_user_data($id){
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id_user', $id);
			$query = $this->db->get();
			return $query->result();
		}

	}

?>