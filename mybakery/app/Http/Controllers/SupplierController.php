<?php

namespace App\Http\Controllers;

use Auth;
use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::all();
        return view('supplier.index', compact('data'));
    }

    public function get_products(Request $request)
    {
        $supplier = Supplier::find($request->supplier_id);
        $data = $supplier->products;
        return response()->json(array(
			'msg'=>view('ajax.products', compact('data'))->render()
		),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = new Supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->save();
        return redirect(route('suppliers.index'))->with('success', 'Data baru berhasil ditambahkan !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->save();
        return redirect(route('suppliers.index'))->with('success', 'Data berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $this->authorize('delete-permission');
        $supplier->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }

    public function form_ajax(Request $request)
    {
        if ($request->supplier_id == 0) {
            $data = null;
        } else {
            $data = Supplier::find($request->supplier_id);
        }
        return response()->json(array(
            'msg'=>view('ajax.form-suppliers', compact('data'))->render()
        ),200);
    }

    public function save_ajax(Request $request)
    {
        if ($request->supplier_id == 0) {
            $data = new Supplier;
        } else {
            $data = Supplier::find($request->supplier_id);
        }
        $data->nama_supplier = $request->nama_supplier;
        $data->alamat_supplier = $request->alamat_supplier;
        $data->save();
        return response()->json(array(
            'msg'=>view('ajax.tr_supplier', compact('data'))->render()
        ),200);
    }

    public function delete_ajax(Request $request)
    {
        $supplier = Supplier::find($request->supplier_id);
        $supplier->delete();
    }
}
