@extends('layouts.app')

@section('title', 'LenyNurOktaviani')

@section('content')

<form action="/pesanans/{{ $pesanan['id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Barang</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_barang" aria-describedby="emailHelp" value="{{ old('nama_barang') ? old('nama_barang') : $pesanan['nama_barang'] }}">
    @error('nama_barang')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Merk</label>
    <input type="text" class="form-control" name="merk" id="exampleInputPassword1" value="{{ old('merk') ? old('merk') : $pesanan['merk'] }}">
    @error('merk')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Jumlah</label>
    <input type="text" class="form-control" name="jumlah" id="exampleInputPassword1" value="{{ old('jumlah') ? old('jumlah') : $pesanan['jumlah'] }}" >
    @error('jumlah')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection