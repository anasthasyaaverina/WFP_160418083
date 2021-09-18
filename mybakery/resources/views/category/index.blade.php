@extends('layouts.base')

@section('content')
<a class="btn btn-light" href="{{url('/')}}">&Lt; Back to Main Page</a>
<div class="my-4"></div>
<h1>Categories Page</h1>

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
				<td><a href="{{route('laporan.showcake', $category->id)}}" class="btn btn-sm btn-success">View Products</a></td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection