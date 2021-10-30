@extends('layouts.admin')

@section('title')
Create Supplier Page
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Master</li>
	<li class="breadcrumb-item"><a href="{{route('suppliers.index')}}">Supplier</a></li>
	<li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<form action="{{route('suppliers.store')}}" method="post">
				@csrf
				<div class="mb-3">
					<label for="nama_supplier" class="form-label">Nama Supplier</label>
					<input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
				</div>
				<div class="mb-3">
					<label for="alamat_supplier" class="form-label">Alamat Supplier</label>
					<input type="text" class="form-control" id="alamat_supplier" name="alamat_supplier" required>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@endsection