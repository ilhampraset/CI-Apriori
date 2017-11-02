<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Apriori_model extends CI_Model {


 		public function read_transaction(){
 			$this->db->select('kd_transaksi');
 			$this->db->from('transaksi_detail');
 			$query = $this->db->get();
 			return $query->result();

 		}

		public function read_db_transaksi(){ //count itemset

			$query = $this->db->query("select kd_transaksi from transaksi_master");
			/*$arr = array();

			foreach ($query->result() as $a) {
				$arr[] = $a->kd_transaksi;
			}*/


			return $query->result();


		}

		public function read_db_tdetail(){
			$dt = array();

				$q = $this->db->query('select kd_transaksi from transaksi_master');

				foreach ($q->result() as $key) {
					# code...

				$query = $this->db->query("select  barang.kd_barang from transaksi_detail inner join barang on barang.kd_barang = transaksi_detail.kd_barang where transaksi_detail.kd_transaksi = '$key->kd_transaksi' ");
				$dt[] = $query->result_array();
			}



			return $dt ;
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
