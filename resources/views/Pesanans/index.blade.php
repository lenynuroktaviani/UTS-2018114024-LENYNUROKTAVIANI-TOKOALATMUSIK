@extends('layouts.app')

@section('title', 'Pesanan')

@section('content')
<a href="/pesanans/create" class="card-link btn-primary">TAMBAH PESANAN</a>
@foreach ($pesanans as $pesanan)
<div class="card mb-3" style="max-width: 540px;">
      <div class="card-body">
        <a href="/pesanans/{{ $pesanan['id']}}"class="card-title">NAMA PESANAN : {{ $pesanan['nama_barang'] }}</a>
        <p class="card-text">MERK : {{ $pesanan['merk'] }}.</p>
        <p class="card-text">JUMLAH : {{ $pesanan['jumlah'] }}.</p>

        <a href="/pesanans/{{ $pesanan['id']}}/edit" class="card-link btn-primary">EDIT PESANAN</a>
        <form action="/pesanans/{{ $pesanan['id'] }}" method="POST">
        @csrf
    @method('DELETE')
    <button class="card-link btn-danger">DELETE PESANAN</a>
      </div>
    </div>
  </div>
</div>
@endforeach
<div>
        {{ $pesanans->links() }}
</div>
@endsection