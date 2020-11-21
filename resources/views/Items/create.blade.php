@extends('layouts.app')
@section('title', 'LenyNurOktaviani')
@section('content')
<form action="/items" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nama Barang</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_barang" aria-describedby="emailHelp" value="{{ old('nama_barang') }}">
    @error('nama_barang')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Merk</label>
    <input type="text" class="form-control" name="merk" id="exampleInputPassword1"  value="{{ old('merk') }}">
    @error('merk')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Harga</label>
    <input type="text" class="form-control" name="harga" id="exampleInputPassword1"  value="{{ old('harga') }}">
    @error('harga')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
