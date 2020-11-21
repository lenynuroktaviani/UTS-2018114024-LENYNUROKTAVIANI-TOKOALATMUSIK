@extends('layouts.app')
@section('title', 'LenyNurOktaviani')
@section('content')
<form action="/pembelis" method="POST">
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Nama User</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_user" aria-describedby="emailHelp" value="{{ old('nama_user') }}">
    @error('nama_user')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">No Telepon</label>
    <input type="text" class="form-control" name="no_telp" id="exampleInputPassword1"  value="{{ old('no_telp') }}">
    @error('no_telp')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputPassword1"  value="{{ old('alamat') }}">
    @error('alamat')
    <div class="alert alert-danger">{{ $message }}</div>
  @enderror
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
