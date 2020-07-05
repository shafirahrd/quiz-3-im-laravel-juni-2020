@extends('layouts.master')

@section('content')

	<form action="/artikel" method="POST">
	@csrf
  <div class="form-group">
    <label for="judul">Judul</label>
    	<input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul">
  </div>
  <div class="form-group">
    <label for="isi">Isi</label>
    	<input type="text" class="form-control" id="isi" name="isi" placeholder="Masukkan isi">
  </div>
  <div class="form-group">
    <label for="tag">Tag</label>
    	<input type="text" class="form-control" id="tag" name="tag" placeholder="Masukkan tag dengan batasan koma (ex. satu,dua,tiga)">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection