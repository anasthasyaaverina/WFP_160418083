@extends('layouts.admin')

@section('title')
Transaction Page
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Master</li>
	<li class="breadcrumb-item active">Transactions</li>
@endsection

@section('content')
<button class="btn btn-primary" data-toggle="modal" data-target="#modalAddTransaction">Add New Transaction</button>
<hr>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Pembeli</th>
			<th>Kasir</th>
			<th>Tanggal Transaksi</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($data as $trans)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{ucwords($trans->customer->nama_customer)}}</td>
				<td>{{ucwords($trans->user->name)}}</td>
				<td>{{ date('d F Y, H:i:s', strtotime($trans->transaction_date)) }}</td>
				<td>
					<button class="btn btn-light btn-sm">Lihat Rincian Pembelian</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection

@section('modal')
	
@endsection

@section('script')
	
@endsection
