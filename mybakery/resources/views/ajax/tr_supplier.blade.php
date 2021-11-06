<tr id="supplier_{{$data->id}}">
	<td>#</td>
	<td id="nama_supplier_{{$data->id}}">{{$data->nama_supplier}}</td>
	<td id="alamat_supplier_{{$data->id}}">{{$data->alamat_supplier}}</td>
	<td>
		<a type="button" class="btn btn-sm btn-success" href="{{route('suppliers.edit', $data)}}">Edit</a>
		<button type="button" class="btn btn-sm btn-outline-success" data-target="#modalCreateEdit" data-toggle="modal" onclick="getForm({{$data->id}})">Edit Ajax</button>
		<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalProducts" onclick="getProducts({{$data->id}})">Show Products</button>
		<form style="display: inline" action="{{route('suppliers.destroy', $data)}}" method="post">@csrf @method("DELETE")
			<button type="submit" class="btn btn-sm btn-danger" onclick="if(!confirm('Apakah mau dihapus?')) {return false;}">Delete</button>
		</form>
	</td>
</tr>