@extends('layouts.admin')

@section('title')
Supplier Page
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Master</li>
	<li class="breadcrumb-item active">Supplier</li>
@endsection

@section('content')
{{-- <a class="btn btn-light" href="{{url('/')}}">&Lt; Back to Main Page</a>
<div class="my-4"></div>
<h1>Supplier Page</h1> --}}

<h4>Table View :</h4>
<hr>
<div class="text-right">
	<a type="button" class="btn btn-sm btn-primary mb-2" href="{{route('suppliers.create')}}">Add New Data</a>
</div>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama Supplier</th>
			<th>Alamat Supplier</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $supplier)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$supplier->nama_supplier}}</td>
				<td>{{$supplier->alamat_supplier}}</td>
				<td>
					<a type="button" class="btn btn-sm btn-success" href="{{route('suppliers.edit', $supplier)}}">Edit</a>
					<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalProducts" onclick="getProducts({{$supplier->id}})">Show Products</button>
					<form style="display: inline" action="{{route('suppliers.destroy', $supplier)}}" method="post">@csrf @method("DELETE")
						<button type="submit" class="btn btn-sm btn-outline-danger" onclick="if(!confirm('Apakah mau dihapus?')) {return false;}">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection

@section('modal')
	<div class="modal fade" id="modalProducts" tabindex="-1" aria-labelledby="modalProductsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalProductsLabel">Detail Produk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="modalProductsContent">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script>
	function getProducts(supplier_id) {
		$.ajax({
			type:'POST',
			url:'{{route("suppliers.get_products")}}',
			data:{'_token':'<?php echo csrf_token() ?>',
				'supplier_id':supplier_id,
				},
			success: function(data){
				$('#modalProductsContent').html(data.msg);
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}
</script>
@endsection