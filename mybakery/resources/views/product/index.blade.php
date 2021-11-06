@extends('layouts.admin')

@section('title')
Product Page
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Master</li>
	<li class="breadcrumb-item active">Products</li>
@endsection

@section('content')
{{-- <a class="btn btn-light" href="{{url('/')}}">&Lt; Back to Main Page</a>
<div class="my-4"></div>
<h1>Product Page</h1> --}}

<h4>Table View :</h4>
<hr>
<div class="text-right">
	<a type="button" class="btn btn-sm btn-primary mb-2" href="{{route('products.create')}}">Add New Data</a>
	<button type="button" class="btn btn-sm btn-outline-primary mb-2" data-toggle="modal" data-target="#modalCreateEdit" onclick="getForm(0)">Add New Data Ajax</button>
</div>
<table class="table">
	<thead>
		<tr class="table-active">
			<th>#</th>
			<th>Nama Produk</th>
			<th>Harga Produk</th>
			<th>Stok Produk</th>
			<th>Kategori Produk</th>
			<th>Foto Produk</th>
			<th></th>
		</tr>
	</thead>
	<tbody id="list_produk">
		@foreach ($data as $product)
			<tr id="product_{{$product->id}}">
				<td>{{$loop->iteration}}</td>
				<td id="nama_produk_{{$product->id}}">{{$product->nama_produk}}</td>
				<td id="harga_produk_{{$product->id}}">{{$product->harga_produk}}</td>
				<td id="stok_produk_{{$product->id}}">{{$product->stok_produk}}</td>
				<td id="kategori_produk_{{$product->id}}">{{ucwords($product->category->nama_kategori)}}</td>
				<td id="foto_produk_{{$product->id}}"><img src="{{asset('products_image/'.$product->foto_produk)}}" height="100" alt=""></td>
				<td>
					<a type="button" class="btn btn-sm btn-success" href="{{route('products.edit', $product)}}">Edit</a>
					<button type="button" class="btn btn-sm btn-outline-success" data-target="#modalCreateEdit" data-toggle="modal" onclick="getForm({{$product->id}})">Edit Ajax</button>
					<form style="display: inline" action="{{route('products.destroy', $product)}}" method="post">@csrf @method("DELETE")
						<button type="submit" class="btn btn-sm btn-danger" onclick="if(!confirm('Apakah mau dihapus?')) {return false;}">Delete</button>
					</form>
					<button class="btn btn-sm btn-outline-danger" onclick="if(confirm('Apakah mau dihapus?')) {deleteItem({{$product->id}})}">Delete Ajax</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

<div class="my-4"></div>

<h4>Grid View : </h4>
<hr>
<div class="row">
	@foreach ($data as $product)
		<div class="col-4 mb-3">
			<a href="{{route('products.show', $product->id)}}" style="all: unset; cursor: pointer;">
				<div class="card">
					<div class="card-header text-center">
						<h5>{{$product->nama_produk}}</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-6">
								@if ($product->foto_produk == "noimage")
									<img src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png" alt="" style="max-width: 100%">
								@else
									<img src="{{asset('products_image/'.$product->foto_produk)}}" style="max-width: 100%" alt="">
								@endif
							</div>
							<div class="col align-self-center">
								<b>Harga : </b>Rp {{number_format($product->harga_produk)}} <br>
								<b>Stok : </b>{{$product->stok_produk}} <br>
								<b>Kategori : </b>{{ucwords($product->category->nama_kategori)}}
								{{-- <b>Supplier : </b>{{$product->supplier->nama_supplier}} --}}
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
	@endforeach
</div>

@endsection

@section('script')
<script>
	function getForm(product_id) {
		$('#modalCreateEditBody').html("<div class=\"w-100 my-4 text-center\"><div class=\"spinner-border\" role=\"status\"><span class=\"sr-only\">Loading...</span></div></div>");
		$.ajax({
			type:'POST',
			url:'{{route("products.form.ajax")}}',
			data:{'_token':'<?php echo csrf_token() ?>',
				'product_id':product_id,
				},
			success: function(data){
				$('#modalCreateEditBody').html(data.msg);
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}

	function saveForm(product_id) {
		$.ajax({
			type:'POST',
			url:'{{route("products.save.ajax")}}',
			data:{'_token':'<?php echo csrf_token() ?>',
				'product_id':product_id,
				'nama_produk':$('#nama_produk').val(),
				'harga_produk':$('#harga_produk').val(),
				'stok_produk':$('#stok_produk').val(),
				'category_id':$('#category_id').val(),
				'supplier_id':$('#supplier_id').val(),
				},
			success: function(data){
				if (product_id == 0) {
					$('#list_produk').append(data.msg);
					alert("{{Config::get('success_add')}}");
				} else {
					$('#nama_produk_'+product_id).html($('#nama_produk').val());
					$('#harga_produk_'+product_id).html($('#harga_produk').val());
					$('#stok_produk_'+product_id).html($('#stok_produk').val());
					$('#kategori_produk_'+product_id).html(data.kategori);
					alert("{{Config::get('success_edit')}}");
				}
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}

	function deleteItem(product_id) {
		$.ajax({
			type:'POST',
			url:'{{route("products.delete.ajax")}}',
			data:{'_token':'<?php echo csrf_token() ?>',
				'product_id':product_id,
				},
			success: function(data){
				$('#product_'+product_id).remove();
				alert("{{Config::get('success_delete')}}");
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}
</script>
@endsection