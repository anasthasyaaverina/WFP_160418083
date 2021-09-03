@extends('layouts.base')

@section('content')
<a class="btn btn-light" href="{{url('/')}}">&Lt; Back to Main Page</a>
<div class="my-4"></div>
<h1>Product Page</h1>

<h4>Grid View : </h4>
<hr>
<div class="row">
	@foreach ($data as $product)
		<div class="col-4 mb-3">
			<div class="card">
				<div class="card-header text-center">
					<h5>{{$product->nama_produk}}</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-6">
							<img src="{{asset('products_image/'.$product->foto_produk)}}" style="max-width: 100%" alt="">
						</div>
						<div class="col align-self-center">
							<b>Harga : </b>Rp {{number_format($product->harga_produk)}} <br>
							<b>Stok : </b>{{$product->stok_produk}}
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach
</div>

<div class="my-4"></div>

<h4>Table View :</h4>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama Produk</th>
			<th>Harga Produk</th>
			<th>Stok Produk</th>
			<th>Foto Produk</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $product)
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