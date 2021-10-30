@extends('layouts.admin')

@section('title')
Create Products Page
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Master</li>
	<li class="breadcrumb-item"><a href="{{route('products.index')}}">Products</a></li>
	<li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<form action="{{route('products.store')}}" method="post">
				@csrf
				<div class="mb-3">
					<label for="nama_produk" class="form-label">Nama Produk</label>
					<input type="text" class="form-control" id="nama_produk" name="nama_produk" required placeholder="Isikan dengan nama produk">
				</div>
				<div class="mb-3">
					<label for="harga_produk" class="form-label">Harga Produk</label>
					<input type="number" class="form-control" id="harga_produk" name="harga_produk" required>
				</div>
				<div class="mb-3">
					<label for="stok_produk" class="form-label">Stok Produk</label>
					<input type="number" class="form-control" id="stok_produk" name="stok_produk" required>
				</div>
				<div class="mb-3">
					<label for="category_id" class="form-label">Kategori</label>
					<select name="category_id" id="category_id" class="form-control" required>
						<option disabled selected>-- Pilih Kategori --</option>
						@foreach ($categories as $item)
							<option value="{{$item->id}}">{{ucwords($item->nama_kategori)}}</option>
						@endforeach
					</select>
				</div>
				<div class="mb-3">
					<label for="supplier_id" class="form-label">Supplier</label>
					<select name="supplier_id" id="supplier_id" class="form-control" required>
						<option disabled selected>-- Pilih Supplier --</option>
						@foreach ($suppliers as $item)
							<option value="{{$item->id}}">{{$item->nama_supplier}}</option>
						@endforeach
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@endsection