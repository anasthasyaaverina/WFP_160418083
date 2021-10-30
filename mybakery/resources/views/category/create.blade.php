@extends('layouts.admin')

@section('title')
Create Categories Page
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Master</li>
	<li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a></li>
	<li class="breadcrumb-item active">Create</li>
@endsection

@section('content')
	<div class="row">
		<div class="col">
			<form action="{{route('categories.store')}}" method="post">
				@csrf
				<div class="mb-3">
					<label for="nama_kategori" class="form-label">Nama Kategori</label>
					<input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
@endsection