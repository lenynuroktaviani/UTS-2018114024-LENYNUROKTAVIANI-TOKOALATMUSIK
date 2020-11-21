@extends('layouts.app')

@section('title', 'cobaaaa')

@section('content')
<div class="card">
    <div class="card-body">
            <h3>Nama Barang : {{ $item['nama_barang'] }}</h3>
            <h3>merk item : {{ $item['merk'] }}</h3>
            <h3>Harga item : {{ $item['harga'] }}</h3>
    </div>
</div>
@endsection 
