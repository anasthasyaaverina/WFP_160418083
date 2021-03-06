@extends('layouts.admin')

@section('title')
Dashboard
@endsection

@section('breadcrumb')
	<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<div class="d-flex justify-content-center">
    <div class="d-flex align-items-center">
        <img src="{{asset('main-animation.gif')}}" alt="">
        <h2>~ My Bakery ~</h2>
        <img src="{{asset('main-animation-2.gif')}}" alt="">
    </div>
</div>
@endsection

{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="{{asset('shortcake-icon.png')}}">
        <title>My Bakery</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('fontawesome/css/all.css')}}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{asset('main-animation.gif')}}" alt="">
                    ~ My Bakery ~
                    <img src="{{asset('main-animation-2.gif')}}" alt="">
                </div>

                <div class="links">
                    <a href="{{route('categories.index')}}"><i class="fas fa-boxes"></i> Categories</a>
                    <a href="{{route('products.index')}}"><i class="fas fa-cookie-bite"></i> Products</a>
                    <a href="{{route('suppliers.index')}}"><i class="fas fa-parachute-box"></i> Suppliers</a>
                    <a href="{{route('laporan.kategoriproduk')}}">Laporan 1</a>
                    <a href="{{route('laporan.reratajumlahstok')}}">Laporan 2</a>
                </div>
            </div>
        </div>
    </body>
</html> --}}
