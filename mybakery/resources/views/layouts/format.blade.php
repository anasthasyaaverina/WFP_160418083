@extends('layouts.admin')

@section('title')

@endsection

@section('breadcrumb')
	<li class="breadcrumb-item"><a href="{{route('index')}}">Dashboard</a></li>
	<li class="breadcrumb-item active">Laporan</li>
	<li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a></li>
	<li class="breadcrumb-item active">Produk Kategori {{ucwords($category->nama_kategori)}}</li>
@endsection

@section('content')
	
@endsection

@section('modal')
	
@endsection

@section('script')
	
@endsection
