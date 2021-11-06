<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('product.create', compact('categories', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->nama_produk = $request->nama_produk;
        $product->harga_produk = $request->harga_produk;
        $product->stok_produk = $request->stok_produk;
        $product->foto_produk = "noimage";
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->save();
        return redirect(route('products.index'))->with('success', 'Data baru berhasil ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('product.edit', compact('product', 'categories', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->nama_produk = $request->nama_produk;
        $product->harga_produk = $request->harga_produk;
        $product->stok_produk = $request->stok_produk;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->save();
        return redirect(route('products.index'))->with('success', 'Data berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }

    public function form_ajax(Request $request)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        if ($request->product_id == 0) {
            $data = null;
        } else {
            $data = Product::find($request->product_id);
        }
        return response()->json(array(
            'msg'=>view('ajax.form-products', compact('data', 'categories', 'suppliers'))->render()
        ),200);
    }

    public function save_ajax(Request $request)
    {
        if ($request->product_id == 0) {
            $data = new Product;
            $data->foto_produk = "noimage";
        } else {
            $data = Product::find($request->product_id);
        }
        $data->nama_produk = $request->nama_produk;
        $data->harga_produk = $request->harga_produk;
        $data->stok_produk = $request->stok_produk;
        $data->category_id = $request->category_id;
        $data->supplier_id = $request->supplier_id;
        $data->save();
        return response()->json(array(
            'msg'=>view('ajax.tr_product', compact('data'))->render(),
            'kategori'=>ucwords($data->category->nama_kategori),
        ),200);
    }

    public function delete_ajax(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->delete();
    }
}
