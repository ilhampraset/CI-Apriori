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
$this->apriori->setMinSup(5);         //Minimum support 1, 2, 3, ...
$this->apriori->setMinConf(50);       //Minimum confidence - Percent 1, 2, ..., 100
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


echo "<br>Result<br>";
//print_r($result);


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

$test1 = array();
$test1 = array('Kampas Kopling', 'oli mesin', 'kampas rem depan', 'ban depan');
$test1[] = array('lampu belakang', 'oli mesin', 'oli gear', 'aki', 'busi');
$test1[]= array('kampas rem depan', 'aki', 'air aki');
$test1[] = array('oli mesin', 'oli gear', 'busi');
$test1[] = array('Kampas Kopling', 'Tali Kopling', 'lampu depan', 'piston');
$test1[] = array('lampu belakang', 'oli', 'mesin aki', 'air aki');
$test1[] = array('Tali Kopling', 'lampu depan', 'lampu belakang', 'ban belakang', 'aki');
$test1[] = array('Kampas Kopling', 'Tali Kopling', 'oli mesin', 'oli gear', 'kampas rem depan', 'ban depan');
$test1[] = array('oli mesin', 'aki', 'air aki', 'busi');
$test1[] = array('Kampas Kopling', 'oli mesin', 'oli gear', 'busi', 'piston', 'top set');
$test1[]= array('oli mesin', 'oli gear', 'ban depan', 'busi');
$test1[] = array('oli mesin','oli gear', 'air aki', 'busi', 'piston', 'top set');
//var_dump($dataset);

echo '<br><br>';
//print_r($test1);

$this->apriori->process($da);


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
