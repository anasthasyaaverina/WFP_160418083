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
					<button data-toggle="modal" data-target="#modalDetailData" class="btn btn-light btn-sm" onclick="getDetailData({{$trans->id}})">Lihat Rincian Pembelian</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection

@section('modal')
<div class="modal fade" id="modalDetailData" tabindex="-1" aria-labelledby="modalDetailDataLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalDetailDataLabel">Detail Transaksi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="modalDetailDataContent">
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
<script>
	function getDetailData(trans_id) {
		$.ajax({
			type:'POST',
			url:'{{route("transactions.get_detail_data")}}',
			data:{'_token':'<?php echo csrf_token() ?>',
				'trans_id':trans_id,
				},
			success: function(data){
				$('#modalDetailDataContent').html(data.msg);
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}
</script>
@endsection
