<tr id="product_{{$data->id}}">
	<td>#</td>
	<td id="nama_produk_{{$data->id}}">{{$data->nama_produk}}</td>
	<td id="harga_produk_{{$data->id}}">{{$data->harga_produk}}</td>
	<td id="stok_produk_{{$data->id}}">{{$data->stok_produk}}</td>
	<td id="kategori_produk_{{$data->id}}">{{ucwords($data->category->nama_kategori)}}</td>
	<td id="foto_produk_{{$data->id}}"><img src="{{asset('products_image/'.$data->foto_produk)}}" height="100" alt=""></td>
	<td>
		<a type="button" class="btn btn-sm btn-success" href="{{route('products.edit', $data)}}">Edit</a>
		<button type="button" class="btn btn-sm btn-outline-success" data-target="#modalCreateEdit" data-toggle="modal" onclick="getForm({{$data->id}})">Edit Ajax</button>
		<form style="display: inline" action="{{route('products.destroy', $data)}}" method="post">@csrf @method("DELETE")
			<button type="submit" class="btn btn-sm btn-danger" onclick="if(!confirm('Apakah mau dihapus?')) {return false;}">Delete</button>
		</form>
		<button class="btn btn-sm btn-outline-danger" onclick="if(confirm('Apakah mau dihapus?')) {deleteItem({{$data->id}})}">Delete Ajax</button>
	</td>
</tr>