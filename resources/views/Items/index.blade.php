@extends('layouts.app')

@section('title', 'LenyNurOktaviani')

@section('content')
<a href="/items/create" class="card-link btn-primary">TAMBAH ITEM</a>
@foreach ($items as $item)

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <a href="/items/{{ $item['id']}}"class="card-title">{{ $item['nama_barang'] }}</a>
        <p class="card-text"><small class="text-muted">{{ $item['merk'] }}</small></p>
        <p class="card-text"><small class="text-muted">harga {{ $item['harga'] }}</small></p>

        <a href="/items/{{ $item['id']}}/edit" class="card-link btn-primary">EDIT ITEM</a>
        <form action="/items/{{ $item['id'] }}" method="POST">
        @csrf
    @method('DELETE')
    <button class="card-link btn-danger">DELETE ITEM</a>
      </div>
    </div>
  </div>
</div>
@endforeach
<div>
        {{ $items->links() }}
</div>
@endsection