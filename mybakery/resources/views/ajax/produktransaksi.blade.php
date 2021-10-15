@foreach ($data->transactions as $trans)
	<tr>
		<td>{{date('d F Y', strtotime($trans->transaction_date))}}</td>
		<td>{{$trans->pivot->quantity}}</td>
		<td>Rp {{number_format($trans->pivot->harga_produk / $trans->pivot->quantity) }}</td>
		<td>Rp {{number_format($trans->pivot->harga_produk)}}</td>
	</tr>
@endforeach
<tr>
	<td colspan="3" class="text-right"><b>Grand Total : </b></td>
	<td>Rp {{number_format($gtotal)}}</td>
</tr>