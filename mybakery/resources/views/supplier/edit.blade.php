@extends('layouts.admin')

@section('title')
Edit Supplier Page
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Master</li>
	<li class="breadcrumb-item"><a href="{{route('suppliers.index')}}">Supplier</a></li>
	<li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<form action="{{route('suppliers.update', $supplier)}}" method="post">
				@csrf
				@method("PUT")
				<div class="mb-3">
					<label for="nama_supplier" class="form-label">Nama Supplier</label>
					<input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required value="{{$supplier->nama_supplier}}">
				</div>
				<div class="mb-3">
					<label for="alamat_supplier" class="form-label">Alamat Supplier</label>
					<input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier" required value="{{$supplier->alamat_supplier}}">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@endsection