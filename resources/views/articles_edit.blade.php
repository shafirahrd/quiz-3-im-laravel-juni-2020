@extends('layouts.master')

@section('content')

	<form action="/artikel/{{ $data[0]->id ?? ''}}" method="POST">
	@method('PUT')
  @csrf
  <div class="form-group">
    <label for="judul">Judul</label>
    	<input type="text" class="form-control" id="judul" value="{{$data[0]->judul ?? ''}}" name="judul" placeholder="Masukkan judul">
  </div>
  <div class="form-group">
    <label for="isi">Isi</label>
    	<input type="text" class="form-control" id="isi" value="{{$data[0]->isi ?? ''}}" name="isi" placeholder="Masukkan isi">
  </div>
  <div class="form-group">
    <label for="tag">Tag</label>
    	<input type="text" class="form-control" id="tag" value="{{$data[0]->tag ?? ''}}" name="tag" placeholder="Masukkan tag dengan batasan koma (ex. satu,dua,tiga)">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection