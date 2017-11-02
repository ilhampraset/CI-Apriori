<?php $this->load->view('include/header')?>


<style>
.footer {
	margin-bottom: 22px;
}
.panel-primary .form-group {
	margin-bottom: 10px;
}
.form-control {
	border-radius: 0px;
	box-shadow: none;
}
.error_validasi { margin-top: 0px; }
</style>


<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-body">




<?php

$this->apriori->setMaxScan(10);       //Scan 2, 3, ...
$this->apriori->setMinSup(2);         //Minimum support 1, 2, 3, ...
$this->apriori->setMinConf(50);       //Minimum confidence - Percent 1, 2, ..., 100
$this->apriori->setDelimiter(',');    //Delimiter







$c = array();
foreach ($td as $td) {
	$c[]=$td['nama_barang'];
}

$q = $this->db->query('SELECT kd_transaksi  FROM transaksi_master ');


$result = array();
foreach ($q->result() as $key ) {
	$query = $this->db->query("SELECT COUNT(kd_transaksi) AS cp FROM transaksi_detail WHERE kd_transaksi = '$key->kd_transaksi' ");
		//$tmp = array();
	foreach ($query->result() as $cp) {
		//echo $cp->cp;

		$ap = array();
		//$count = count($cp->cp);
		for ($i=0; $i < $cp->cp ; $i++) {
		//$tmp =  array();
		  $ap[] = $c[$i];

		 $result[] = $ap;
		 //var_dump($g);
		//$result[] = $tmp;
		}



	}



}









$this->apriori->process($result);






echo '<h1>Association Rules</h1>';
echo " <table id='table' class='table table-striped table-bordered' cellspacing='0' width='80%'><th width='800'>Rule</th> <th>Confidend</th>";
$this->apriori->printAssociationRules();
echo "</table>";
// /echo '<h3>Association Rules Array</h3>';
print_r($this->apriori->getAssociationRules());

//Save to file

?>
<?php $this->load->view('include/footer'); ?>
