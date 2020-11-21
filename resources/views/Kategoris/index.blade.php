@extends('layouts.app')

@section('title', 'LenyNurOktaviani')

@section('content')
<a href="/kategoris/create" class="card-link btn-primary">TAMBAH KATEGORI</a>
@foreach ($kategoris as $kategori)

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <a href="/kategoris/{{ $kategori['id']}}"class="card-title">{{ $kategori['name'] }}</a>
        <p class="card-text"><small class="text-muted">{{ $kategori['description'] }}</small></p>

        <hr>
        <a href="" class="card-link btn-primary">Tambah List Kategori</a>
        @foreach ($kategori->Items as $item)
        <li> {{$item->nama}} </li>
       @endforeach

      <hr>
        <a href="/kategoris/{{ $kategori['id']}}/edit" class="card-link btn-primary">EDIT KATEGORI</a>
        <form action="/kategoris/{{ $kategori['id'] }}" method="POST">
        @csrf
    @method('DELETE')
    <button class="card-link btn-danger">DELETE KATEGORI</button>
      </div>
    </div>
  </div>
</div>
@endforeach
<div>
        {{ $kategoris->links() }}
</div>
@endsection