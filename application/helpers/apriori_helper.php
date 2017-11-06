<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('test')){
	function test()
	{

		$ci =& get_instance();
		$ci->load->database();
		$sql = "Select * from barang";
		$q = $ci->db->query($sql);

	}
}

function nama_barang($items)
{

	$pisah = explode(', ', $items);
	$ci =& get_instance();
	$ci->load->database();
	$sql = "Select * from barang";
	$q = $ci->db->query($sql);

	$c = array();
	for($i=0;$i<count($pisah);$i++)
	{
		$tmp = '';
		foreach ($q->result() as $key) {

			if($key->kd_barang == $pisah[$i]){





				echo $key->kd_barang.' = '.$key->nama_barang.'<br>';
			 //print_r($b);
			 //echo $c;

			}

		}



	}
	//echo implode(', ', $c);


}

if (!function_exists('exdot')){
	function exdot($a)
	{
		$separate = explode('.', $a);
		$join = implode('', $separate);
		return $join;

	}
}

if (!function_exists('adot')){
	function adot($a)
	{
		 	 $front = substr($a, 0, 3);
			 $middle =substr($a, 3, 6);
			 $bottom =substr($a, 9, 11);
			 $join = $front.".".$middle.".".$bottom;

		return $join;

	}
}
