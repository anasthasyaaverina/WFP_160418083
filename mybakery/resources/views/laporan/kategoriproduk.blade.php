@extends('layouts.base')

@section('content')
<a class="btn btn-light" href="{{url('/')}}">&Lt; Back to Main Page</a>
<div class="my-4"></div>
<h1>Laporan Kategori Produk</h1>

<hr>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama Kategori</th>
			<th>Harga Produk Minimum</th>
			<th>Harga Rata-Rata Produk</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($arr_data as $category)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{ucwords($category['category']->nama_kategori)}}</td>
				@if ($category['min'] == null)
					<td>Rp 0</td>
				@else
					<td>Rp {{number_format($category['min']->harga_produk)}}</td>
				@endif
				<td>Rp {{number_format($category['avg'])}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection