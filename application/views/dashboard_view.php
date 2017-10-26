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
		<?
			$barang = $this->db->query(" SELECT * FROM barang ");
			$transaksi = $this->db->query(" SELECT * FROM transaksi_master "); 
		?>
		<h3>Jumlah Data Barang : <?= count($barang->result())?></h3>
		<h3>Jumlah Data Penjualan: <?= count($transaksi->result()) ?> </h3>
		

		</div>
	</div>
</div>



<?php $this->load->view('include/footer'); ?>