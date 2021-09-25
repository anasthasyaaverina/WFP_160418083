<div class="row">
	@foreach ($data as $product)
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
								<b>Harga : </b>Rp {{number_format($product->harga_produk)}} <br>
								<b>Stok : </b>{{$product->stok_produk}} <br>
								<b>Kategori : </b>{{ucwords($product->category->nama_kategori)}}
							</div>
						</div>
					</div>
				</div>
			</a>
		</div>
	@endforeach
</div>