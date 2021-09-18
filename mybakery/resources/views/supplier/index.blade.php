@extends('layouts.base')

@section('content')
<a class="btn btn-light" href="{{url('/')}}">&Lt; Back to Main Page</a>
<div class="my-4"></div>
<h1>Supplier Page</h1>

<h4>Table View :</h4>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama Supplier</th>
			<th>Alamat Supplier</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $supplier)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$supplier->nama_supplier}}</td>
				<td>{{$supplier->alamat_supplier}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection