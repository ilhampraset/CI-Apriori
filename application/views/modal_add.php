<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Book Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" method="post" id="form" class="form-horizontal">
               
                    
                     <input name="old_kode"  placeholder="Kode Barang" class="form-control" type="hidden">

                     <div class="form-body">
                        <div class="form-group">
                         <input type="hidden" value="" name="harga">
                            <label class="control-label col-md-3">kode barang</label>
                            <div class="col-md-9">
                                <input name="kd_barang"  placeholder="Kode Barang" class="form-control" type="text" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Nama Barang</label>
                            <div class="col-md-9">
                                <input name="nama_barang"  placeholder="Nama Barang" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                       
                       
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->