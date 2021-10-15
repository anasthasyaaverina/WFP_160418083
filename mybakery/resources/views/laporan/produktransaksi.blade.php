@extends('layouts.admin')

@section('title')
Produk Transaksi
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Laporan</li>
	<li class="breadcrumb-item active">Produk Transaksi</li>
@endsection

@section('content')
<div class="row">
	<div class="col-2 d-flex align-items-center justify-content-end">
		<span>Pilih Produk</span>
	</div>
	<div class="col-6">
		<select name="product_id" id="product_id" class="form-control" onchange="getDetailData(this.value)">
			<option disabled selected value="0">-- Pilih Produk --</option>
			@foreach ($products as $product)
				<option value="{{$product->id}}">{{$product->nama_produk}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mt-5">
	<div class="col">
		<table class="table">
			<thead>
				<tr>
					<th>Tanggal Transaksi</th>
					<th>Jumlah</th>
					<th>Harga Jual</th>
					<th>Subtotal</th>
				</tr>
			</thead>
			<tbody id="tabelProdukTransaksi">
				<tr class="text-center">
					<td colspan="4">-- Pilihlah produk terlebih dahulu --</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('script')
<script>
	function getDetailData(product_id) {
		$.ajax({
			type:'POST',
			url:'{{route("laporan.showproduktransaksi")}}',
			data:{'_token':'<?php echo csrf_token() ?>',
				'product_id':product_id,
				},
			success: function(data){
				$('#tabelProdukTransaksi').html(data.msg);
			},
			error: function(xhr) {
				console.log(xhr);
			}
		});
	}
</script>
@endsection