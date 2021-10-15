<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Supplier;
use DB;

class LaporanController extends Controller
{
    public function kategoriproduk(){
        $data = Category::all();
        $arr_data = array();
        foreach ($data as $category) {
            $product_min = Product::where('category_id', $category->id)->orderBy('harga_produk', 'asc')->first();
            $product_avg = Product::where('category_id', $category->id)->average('harga_produk');
            $arr_data[$category->id]['category'] = $category;
            $arr_data[$category->id]['min'] = $product_min;
            $arr_data[$category->id]['avg'] = $product_avg;
        }
        // dd($arr_data);
        return view('laporan.kategoriproduk', compact('arr_data'));
    }

    public function reratajumlahstok(){
        $data = Supplier::all();
        $products = Product::all();
        $arr_data = array();
        foreach ($data as $supplier) {
            $arr_data[$supplier->id]['supplier'] = $supplier;
            foreach ($products as $product) {
                $arr_data[$supplier->id]['products'][$product->id]['id'] = $product->id;
                $arr_data[$supplier->id]['products'][$product->id]['nama'] = $product->nama_produk;
                if ($product->supplier_id == $supplier->id) {
                    $arr_data[$supplier->id]['products'][$product->id]['stok'] = $product->stok_produk;
                } else {
                    $arr_data[$supplier->id]['products'][$product->id]['stok'] = 0;
                }
            }
        }
        // dd($arr_data);
        return view('laporan.reratajumlahstok', compact('data', 'arr_data'));
    }

    public function showcake($id){
        $category = Category::find($id);
        return view('laporan.showcake', compact('category'));
    }

    public function produktransaksi(){
        $products = Product::all();
        return view('laporan.produktransaksi', compact('products'));
    }

    public function showproduktransaksi(Request $request){
        $data = Product::find($request->product_id);
        $gtotal = DB::table('product_transaction')->where('product_id', $request->product_id)->sum('harga_produk');
        return response()->json(array(
			'msg'=>view('ajax.produktransaksi', compact('data', 'gtotal'))->render()
		),200);
    }
}
