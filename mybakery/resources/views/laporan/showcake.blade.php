@extends('layouts.admin')

@section('title')
Produk dengan Kategori : {{ucwords($category->nama_kategori)}}
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Laporan</li>
	<li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a></li>
	<li class="breadcrumb-item active">Produk Kategori {{ucwords($category->nama_kategori)}}</li>
@endsection

@section('content')
{{-- <a class="btn btn-light" href="{{route('categories.index')}}">&Lt; Back to Previous Page</a>
<div class="my-4"></div>
<h1>Produk dengan Kategori : {{ucwords($category->nama_kategori)}}</h1>

<hr> --}}
<table class="table">
	<thead>
		<tr class="table-active">
			<th>#</th>
			<th>Nama Produk</th>
			<th>Harga Produk</th>
			<th>Stok Produk</th>
			<th>Foto Produk</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($category->products as $product)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$product->nama_produk}}</td>
				<td>{{$product->harga_produk}}</td>
				<td>{{$product->stok_produk}}</td>
				<td><img src="{{asset('products_image/'.$product->foto_produk)}}" height="100" alt=""></td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection