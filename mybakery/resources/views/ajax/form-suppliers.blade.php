<div class="modal-header">
	<h5 class="modal-title" id="modalCreateEditLabel">{{$data != null ? "Edit" : "Create"}} Data</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<div class="mb-3">
		<label for="nama_supplier" class="form-label">Nama Supplier</label>
		<input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required value="{{$data != null ? $data->nama_supplier : ''}}">
	</div>
	<div class="mb-3">
		<label for="alamat_supplier" class="form-label">Alamat Supplier</label>
		<input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier" required value="{{$data != null ? $data->alamat_supplier : ''}}">
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="saveForm({{$data != null ? $data->id : 0}})">Save changes</button>
</div>