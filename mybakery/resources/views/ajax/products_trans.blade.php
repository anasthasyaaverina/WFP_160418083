<h5>ID Transaksi : {{$data->id}}</h5>
<div class="row">
	@foreach ($data->products as $product)
		<div class="col-4 mb-3">
			<a href="{{route('products.show', $product->id)}}" style="all: unset; cursor: pointer;">
				<div class="card">
					<div class="card-header text-center">
						<h5>{{$product->nama_produk}}</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-5">
								<img src="{{asset('products_image/'.$product->foto_produk)}}" style="max-width: 100%" alt="">
							</div>
							<div class="col align-self-center">
								<b>Subtotal Beli : </b>Rp {{number_format($product->pivot->harga_produk)}} <br>
								<b>Jumlah Beli : </b>{{$product->pivot->quantity}} <br>
								<b>Kategori : </b>{{ucwords($product->category->nama_kategori)}}
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
	@endforeach
</div>