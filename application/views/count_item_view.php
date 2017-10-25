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
		 <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ItemSet</th>
                    <th>SupportCount</th>
                    <th>Support</th>
                   
                    
                </tr>
            </thead>
            <tbody>
            	    <?php $no = 1; $query = $this->db->query("select * from barang");
            		foreach ($query->result() as $as) 
            		{   ?>     	
            	<tr>

            		<td><?=$no++?></td>
            		

            		<td><?= $as->nama_barang?></td>
            		
            		<?
            			$query2=$this->db->query("SELECT COUNT(kd_barang) AS SP FROM transaksi_detail WHERE kd_barang = '$as->kd_barang' ");
            			foreach ($query2->result() as $c) {
            				echo "<td>".$c->SP."</td>";
            			}

            		?>
            			

            		
            		<td></td>
            	</tr>
            	<?php } ?>
            	<?php echo $this->malasngoding->nama_saya();?>
            </tbody>

            <tfoot>
            <tr>
                <th>No</th>
                
                <th>Kode Barang</th>
                <th>Nama Barang</th>
            </tr>
            </tfoot>
        </table>

		</div>
	</div>
</div>



<?php $this->load->view('include/footer'); ?>