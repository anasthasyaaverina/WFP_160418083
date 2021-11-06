<div class="modal-header">
	<h5 class="modal-title" id="modalCreateEditLabel">{{$data != null ? "Edit" : "Create"}} Data</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<div class="mb-3">
		<label for="nama_produk" class="form-label">Nama Produk</label>
		<input type="text" class="form-control" id="nama_produk" name="nama_produk" required placeholder="Isikan dengan nama produk" value="{{$data != null ? $data->nama_produk : ''}}">
	</div>
	<div class="mb-3">
		<label for="harga_produk" class="form-label">Harga Produk</label>
		<input type="number" class="form-control" id="harga_produk" name="harga_produk" required value="{{$data != null ? $data->harga_produk : ''}}">
	</div>
	<div class="mb-3">
		<label for="stok_produk" class="form-label">Stok Produk</label>
		<input type="number" class="form-control" id="stok_produk" name="stok_produk" required value="{{$data != null ? $data->stok_produk : ''}}">
	</div>
	<div class="mb-3">
		<label for="category_id" class="form-label">Kategori</label>
		<select name="category_id" id="category_id" class="form-control" required>
			<option disabled selected>-- Pilih Kategori --</option>
			@foreach ($categories as $item)
				<option value="{{$item->id}}" @if($data != null && $data->category_id == $item->id) selected @endif>{{ucwords($item->nama_kategori)}}</option>
			@endforeach
		</select>
	</div>
	<div class="mb-3">
		<label for="supplier_id" class="form-label">Supplier</label>
		<select name="supplier_id" id="supplier_id" class="form-control" required>
			<option disabled selected>-- Pilih Supplier --</option>
			@foreach ($suppliers as $item)
				<option value="{{$item->id}}" @if($data != null && $data->supplier_id == $item->id) selected @endif>{{$item->nama_supplier}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="saveForm({{$data != null ? $data->id : 0}})">Save changes</button>
</div>