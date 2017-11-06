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
		  <button type="button" id="btnSave" onclick="add_barang()" class="btn btn-primary">Tambah Barang</button><br><br>

		    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>

                    <th style="width:200px;">Action</th>
                </tr>
            </thead>
            <tbody>
            	<?php $no = 1; foreach ($barang as $barang) { ?>
            	<tr>
            		<td><?= $no++ ?></td>
            		<td><?= $barang->kd_barang?></td>
            		<td><?= $barang->nama_barang?></td>
            		<td>
            			<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_barang('<?=$barang->kd_barang?>')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>

                       <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="delete_barang('<?=$barang->kd_barang?>')" title="Hapus"><i class="fa fa-remove"></i>Hapus</a>
                    </td>
            	</tr>
            	<?php } ?>
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
<?php $this->load->view('modal_add')?>
<script>
  $(document).ready(function() {
  $('#table').DataTable({});
});</script>
<script type="text/javascript">
    var save_method; //for save method string
    var table;

    function add_barang()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Produk'); // Set Title to Bootstrap modal title
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
          url = "<?php echo site_url('barang/store')?>";
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


    function delete_barang(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('barang/destroy')?>/"+id,
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
