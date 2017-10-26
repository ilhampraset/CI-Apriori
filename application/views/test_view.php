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



/*
for ($i=0; $i <count($db) ; $i++) { 
	$queri = $this->db->query("SELECT barang.nama_barang, transaksi_detail.kd_transaksi, transaksi_detail.kd_barang FROM transaksi_detail INNER JOIN barang ON transaksi_detail.kd_barang=barang.kd_barang WHERE transaksi_detail.kd_transaksi = '$db[$i]' ");

	foreach ( $queri->result_array() as $aa) {
		//$dt =  implode(',', $aa['kd_barang']);
		echo  $aa['kd_transaksi'].' ';
		echo $aa['kd_barang'].",";
		echo $aa['nama_barang'].",";
		echo "<br>";



		
	}

	
}

*/
/*$ab = array();
foreach ($db as $db) {
	$ab[]=$db->kd_transaksi;

	$as = array();
	
}

var_dump($td);

var_dump($ab);

echo implode(',', $ab);
*/
/*
$ab = array();
$i=0;
foreach($db as $db) {
	$ab[]=$db->kd_transaksi;

	$c =array();
	//$c[] = $db->kd_transaksi;
	foreach($td as $t) {
		
		
			$num = count($t['kd_transaksi']);

			echo $num;
		
	}	
	
}*/

$q = $this->db->query('SELECT kd_transaksi  FROM transaksi_master ');
$c =array();
foreach ($td as $td) {
	$c[]=$td['nama_barang'];
}
$bc = array();
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

	$bc[] = $result;
	
}

//var_dump($result);


//print_r($result);
//print json_encode($result);


//echo $result[0];
// print join(',', $result[0]); 


/*c =array();
foreach ($td as $td) {
	$c[]=$td['kd_barang'];
}	

var_dump($c);

$ap = array(); 
echo "<br>";
for($i=0; $i < 4 ;$i++){

	$ap[] =  $c[$i];
}

echo implode(',', $ap);
*/



//echo implode(',', $ab);

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
$a[] =  array('a', 'b', 'c');
*/
//print_r($dataset);
//print json_encode($dataset);
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

$this->apriori->process($result);


//$Apriori->process('dataset.txt');

//Frequent Itemsets
echo '<h1>Frequent Itemsets</h1>';
$this->apriori->printFreqItemsets();




echo '<h1>Association Rules</h1>';
echo " <table id='table' class='table table-striped table-bordered' cellspacing='0' width='80%'><th width='800'>Rule</th> <th>Confidend</th>";
$this->apriori->printAssociationRules();
echo "</table>";
/*echo '<h3>Association Rules Array</h3>';
print_r($this->apriori->getAssociationRules()); */

//Save to file

?>  
<?php $this->load->view('include/footer'); ?>
