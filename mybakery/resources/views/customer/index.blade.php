@extends('layouts.admin')

@section('title')
Customers Page
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Master</li>
	<li class="breadcrumb-item active">Customers</li>
@endsection

@section('content')
<button class="btn btn-primary" data-toggle="modal" data-target="#modalAddCustomer">Add New Data</button>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nama Customer</th>
			<th>Alamat Customer</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $customer)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{ucwords($customer->nama_customer)}}</td>
				<td>{{ucwords($customer->alamat_customer)}}</td>
				<td>
					<button class="btn btn-warning btn-sm">Edit</button>&nbsp;<button class="btn btn-danger btn-sm">Hapus</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection

@section('modal')
<div class="modal fade" id="modalAddCustomer" tabindex="-1" aria-labelledby="modalAddCustomerLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAddCustomerLabel">Tambah Data Customer</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="modalAddCustomerContent">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
	
@endsection
