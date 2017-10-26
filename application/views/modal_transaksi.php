<style type="text/css">
    

</style>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Book Form</h3>
            </div>
            <div class="modal-body form">
                <form method="POST" id="form" action="<?= base_url('transaksi/store') ?>" >
              

                     <div class="form-body">
                        <div class="form-group">
                         <input type="hidden" value="" name="harga">
                            <label class="control-label col-md-3">kode Transaksi</label>
                            <div class="col-md-9">
                                <input name="kd_transaksi"  value="SRV." class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                         <input type="hidden" value="" name="harga">
                            <label class="control-label col-md-3">Tanggal</label>
                            <div class="col-md-9">
                                <input name="tgl"  id="datepicker" placeholder="Tanggal" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>

                        
                         <div class="form-group" id="dynamicInput">
                            <label class="control-label col-md-3">Barang</label>
                             <div class="col-md-9">
                               <select name="kd_barang[]" class="form-control">
                                <?php foreach($barang as $barang){?>
                                  <option value="<?= $barang->nama_barang ?>"><?= $barang->nama_barang?></option>
                                <?php } ?>
                                </select>
                            </div>

                         </div>
                         <br>
                       <div align="center">
                        <button type="button" class="btn btn-default btn-circle" onClick="addInput('dynamicInput');"><i class="glyphicon glyphicon-plus"></i> Tambah Barang</button></div>
                     
     

</form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->