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

		  <button type="button" id="btnSave" onclick="add_transaksi()" class="btn btn-primary">Tambah Transaksi</button><br><br>
     
       
		 
		    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Item</th>
                        
                    <th style="width:200px;">Action</th>
                </tr>
            </thead>
            <tbody>
            
            	<?php $no = 1; $kode; foreach ($transaksi as $transaksi) { ?>            	
            	<tr>
            		<td><?= $no++ ?></td>
            		<td><?= $transaksi->kd_transaksi?></td>
            		<td><? $query = $this->db->query("select * from transaksi_detail inner join barang on transaksi_detail.kd_barang =  barang.kd_barang where kd_transaksi='$transaksi->kd_transaksi'  ORDER BY transaksi_detail.kd_barang ASC "); foreach($query->result() as $d){
                           
                           echo $d->nama_barang."<br>" ;

                        }?></td>
            		<td>
            			
                                             
                       <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="delete_transaksi('<?=$transaksi->kd_transaksi?>')" title="Hapus"><i class="fa fa-remove"></i>Hapus</a>
                    </td>
            	</tr>
            	<?php }   ?>
            </tbody>

            <tfoot>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Nama Barang</th>
            </tr>
            </tfoot>
        </table>
                   
		</div>
	</div>

</div>
<?php $this->load->view('modal_transaksi')?>

<script>
  $(document).ready(function() {
  $('#table').DataTable({});
});</script>
<script type="text/javascript">
    var save_method; //for save method string
    var table;

   

    function addInput(divName){

        

              var newdiv = document.createElement('div');

              newdiv.innerHTML =   "<div class='form-group'>" +"<label class='control-label col-md-3'></label>"+" <div class='col-md-9'><br> <select name='kd_barang[]' class='form-control'> <?php foreach($barang as $barang){ ?><option value='<?= $barang->kd_barang ?>'><?= $barang->nama_barang?></option><?php } ?></select> </div>";

              document.getElementById(divName).appendChild(newdiv);

              counter++;

         

    }

    function add_transaksi()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Transaksi'); // Set Title to Bootstrap modal title
    }

    function edit_barang(id)
    {
    save_method = 'edit';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('barang/edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="kd_barang"]').val(data.kd_barang);
            $('[name="nama_barang"]').val(data.nama_barang);
           	 $('[name="old_kode"]').val(data.kd_barang);
              

             
            
           
           
          
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit barang'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
  }


    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('transaksi/store')?>";
      }
      else
      {
        url = "<?php echo site_url('barang/update')?>";
      }
 
       // ajax adding data to database
         var formData = new FormData($('#form')[0]);
          $.ajax({
            url : url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data)
            {

              if(data.status) //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              document.location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }


    function delete_transaksi(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('transaksi/destroy')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
               document.location.reload()
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}
  </script>


<?php $this->load->view('include/footer'); ?>