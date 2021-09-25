@extends('layouts.admin')

@section('title')
Categories Page
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Master</li>
	<li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
{{-- <a class="btn btn-light" href="{{url('/')}}">&Lt; Back to Main Page</a>
<div class="my-4"></div>
<h1>Categories Page</h1> --}}

<h4>Table View :</h4>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama Kategori</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $category)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{ucwords($category->nama_kategori)}}</td>
				<td>
					<a href="{{route('laporan.showcake', $category->id)}}" class="btn btn-sm btn-success">View Products</a>
					<button data-toggle="modal" data-target="#modalProducts" class="btn btn-sm btn-warning" onclick="getProducts({{$category->id}})">View Products with Ajax</button>
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
	function getProducts(category_id) {
		$.ajax({
			type:'POST',
			url:'{{route("categories.get_products")}}',
			data:{'_token':'<?php echo csrf_token() ?>',
				'category_id':category_id,
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