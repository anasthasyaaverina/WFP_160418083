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
	<button type="button" class="btn btn-sm btn-outline-primary mb-2" data-toggle="modal" data-target="#modalCreateEdit" onclick="getForm(0)">Add New Data Ajax</button>
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
	<tbody id="list_supplier">
		@foreach ($data as $supplier)
			<tr id="supplier_{{$supplier->id}}">
				<td>{{$loop->iteration}}</td>
				<td id="nama_supplier_{{$supplier->id}}">{{$supplier->nama_supplier}}</td>
				<td id="alamat_supplier_{{$supplier->id}}">{{$supplier->alamat_supplier}}</td>
				<td>
					<a type="button" class="btn btn-sm btn-success" href="{{route('suppliers.edit', $supplier)}}">Edit</a>
					<button type="button" class="btn btn-sm btn-outline-success" data-target="#modalCreateEdit" data-toggle="modal" onclick="getForm({{$supplier->id}})">Edit Ajax</button>
					<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalProducts" onclick="getProducts({{$supplier->id}})">Show Products</button>
					<form style="display: inline" action="{{route('suppliers.destroy', $supplier)}}" method="post">@csrf @method("DELETE")
						<button type="submit" class="btn btn-sm btn-danger" onclick="if(!confirm('Apakah mau dihapus?')) {return false;}">Delete</button>
					</form>
					<button class="btn btn-sm btn-outline-danger" onclick="if(confirm('Apakah mau dihapus?')) {deleteItem({{$supplier->id}})}">Delete Ajax</button>
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
	function getForm(supplier_id) {
		$('#modalCreateEditBody').html("<div class=\"w-100 my-4 text-center\"><div class=\"spinner-border\" role=\"status\"><span class=\"sr-only\">Loading...</span></div></div>");
		$.ajax({
			type:'POST',
			url:'{{route("suppliers.form.ajax")}}',
			data:{'_token':'<?php echo csrf_token() ?>',
				'supplier_id':supplier_id,
				},
			success: function(data){
				$('#modalCreateEditBody').html(data.msg);
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}

	function saveForm(supplier_id) {
		$.ajax({
			type:'POST',
			url:'{{route("suppliers.save.ajax")}}',
			data:{'_token':'<?php echo csrf_token() ?>',
				'supplier_id':supplier_id,
				'nama_supplier':$('#nama_supplier').val(),
				'alamat_supplier':$('#alamat_supplier').val(),
				},
			success: function(data){
				if (supplier_id == 0) {
					$('#list_supplier').append(data.msg);
					alert("{{Config::get('success_add')}}");
				} else {
					$('#nama_supplier_'+supplier_id).html($('#nama_supplier').val());
					$('#alamat_supplier_'+supplier_id).html($('#alamat_supplier').val());
					alert("{{Config::get('success_edit')}}");
				}
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}

	function deleteItem(supplier_id) {
		$.ajax({
			type:'POST',
			url:'{{route("suppliers.delete.ajax")}}',
			data:{'_token':'<?php echo csrf_token() ?>',
				'supplier_id':supplier_id,
				},
			success: function(data){
				$('#supplier_'+supplier_id).remove();
				alert("{{Config::get('success_delete')}}");
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}

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