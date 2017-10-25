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