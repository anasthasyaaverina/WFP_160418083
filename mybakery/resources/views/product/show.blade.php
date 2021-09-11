@extends('layouts.base')

@section('content')
	<a class="btn btn-light" href="{{route('products.index')}}">&Lt; Back to Previous Page</a>
	<div class="my-4"></div>
	<h1>Product Detail Page</h1>

	<h4>{{$product->nama_produk}}</h4>
	<hr>
	<table class="table">
		<tbody>
			<tr>
				<td colspan="2" class="text-center"><img src="{{asset('products_image/'.$product->foto_produk)}}" height="500" alt=""></td>
			</tr>
			<tr>
				<th>Nama Produk :</th>
				<td>{{$product->nama_produk}}</td>
			</tr>
			<tr>
				<th>Harga Produk :</th>
				<td>Rp {{number_format($product->harga_produk)}}</td>
			</tr>
			<tr>
				<th>Stok Produk :</th>
				<td>{{$product->stok_produk}}</td>
			</tr>
			<tr>
				<th>Kategori Produk :</th>
				<td>{{$product->category->nama_kategori}}</td>
			</tr>
			<tr>
				<th>Supplier Produk :</th>
				<td>{{$product->supplier->nama_supplier}}</td>
			</tr>
		</tbody>
	</table>
@endsection