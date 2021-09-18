@extends('layouts.admin')

@section('title')
Laporan Rerata Jumlah Stok
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Laporan</li>
	<li class="breadcrumb-item active">Rerata Jumlah Stok</li>
@endsection

@section('content')
{{-- <a class="btn btn-light" href="{{url('/')}}">&Lt; Back to Main Page</a>
<div class="my-4"></div>
<h1>Laporan Rerata Jumlah Stok per Supplier</h1> --}}

<h4>Versi 2	 : </h4>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama Supplier</th>
			<th>List Produk dan Stok</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($arr_data as $supplier)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$supplier['supplier']->nama_supplier}}</td>
				<td>
					@foreach ($supplier['products'] as $product)
						{{$product['id']}} - {{$product['nama']}} - Stok : {{$product['stok']}} <br>
					@endforeach
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

<h4>Versi 1 : </h4>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama Supplier</th>
			<th>List Produk dan Stok</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $supplier)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$supplier->nama_supplier}}</td>
				<td>
					@foreach ($supplier->products as $product)
						{{$product->id}} - {{$product->nama_produk}} - Stok {{$product->stok_produk}} <br>
					@endforeach
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection