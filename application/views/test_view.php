<?php $this->load->view('include/header')?>
<?php $this->load->view('include/navbar')?>

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
$this->apriori->setMinConf(75);       //Minimum confidence - Percent 1, 2, ..., 100
$this->apriori->setDelimiter(',');    //Delimiter 

$dataa = array();
$dataa[] = array('Lampu Depan');
$dataa[] = array('Busi');
$dataa[] = array('Oli Mesin');
$dataa[] = array('Oli Mesin', 'Kampas Rem Depan');
$dataa[] = array('Lampu Depan', 'Oli Mesin');
$dataa[] = array('Oli Mesin', 'Oli Gear');
$dataa[] = array('Lampu Depan', 'Seal', 'Lampu WB');
$dataa[] = array('Oli Mesin', 'Oli Gear', 'Piece Slide', 'Seal');
$dataa[] = array('Lampu Depan', 'Oli Mesin');
$dataa[] = array('Kampas Kopling', 'Lampu Belakang');
$dataa[] = array('Kampas Kopling', 'Kampas Rem Depan');
$dataa[] = array('Lampu Depan', 'Oli Mesin');
$dataa[] = array('Cairan Pendingin Radiator');
$dataa[] = array('Lampu Depan', 'Oli Mesin');





$query = $this->db->query('select items from transaksi_master');
$da =  array();
foreach ($query->result() as $value) {

	$da[]= $value->items;
}




/*$dataset   = array();
$dataset[] = array('J001', 'J002', 'J004'); 
$dataset[] = array('J001', 'J003', 'J004', 'J007');  
$dataset[] = array('J004', 'J007'); 
$dataset[] = array('J005', 'J004', 'J005'); 
$dataset[] = array('J005', 'J004', 'J002');
$dataset[] = array('J002', 'J004', 'J005'); 
$a = array();
$a[] =  array('a', 'b', 'c');
$a[] =  array('a', 'b', 'c');
$a[] =  array('a', 'b', 'c');*/

/*$data = array();
echo "<br><h1> Dataset </h1>";
echo "<table id='table' class='table table-striped table-bordered' cellspacing='0' width='10%'>
	<thead>
	<th>No</th> <th>Items</th>
	<thead>
	";
$no = 1 ;
for($baris=0;$baris<count($dataa);$baris++)
{
	
echo "<tr>";
	echo "<td>". $no++."</td>";	
echo "<td>";
 for($kolom=0;$kolom<count($dataa[$baris]);$kolom++)
 {
 
 	$dataa[$baris][$kolom];
  echo $dataa[$baris][$kolom]."<br>";
}
 echo "</td>";

}


echo "</table>";*/





//var_dump($dataset);

$this->apriori->process($da);


//$Apriori->process('dataset.txt');

//Frequent Itemsets
echo '<h1>Frequent Itemsets</h1>';
$this->apriori->printFreqItemsets();




echo '<h1>Association Rules</h1>';
echo " <table id='table' class='table table-striped table-bordered' cellspacing='0' width='80%'><th width='500'>Rule</th> <th>Confidend</th>";
$this->apriori->printAssociationRules();
echo "</table>";
/*echo '<h3>Association Rules Array</h3>';
print_r($this->apriori->getAssociationRules()); */

//Save to file

?>  
<?php $this->load->view('include/footer'); ?>
