@extends('layouts.app')

@section('title', 'Pembeli')

@section('content')
<a href="/pembelis/create" class="card-link btn-primary">TAMBAH DATA</a>
@foreach ($pembelis as $pembeli)
<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
    </div>
      <div class="card-body">
        <a href="/pembelis/{{ $pembeli['id']}}"class="card-title">{{ $pembeli['nama_user'] }}</a>
        <p class="card-text">{{ $pembeli['no_telp'] }}.</p>
        <p class="card-text">{{ $pembeli['alamat'] }}.</p>

        <a href="/pembelis/{{ $pembeli['id']}}/edit" class="card-link btn-primary">EDIT DATA</a>
        <form action="/pembelis/{{ $pembeli['id'] }}" method="POST">
        @csrf
    @method('DELETE')
    <button class="card-link btn-danger">DELETE DATA</a>
      </div>
    </div>
  </div>
</div>
@endforeach
<div>
        {{ $pembelis->links() }}
</div>
@endsection