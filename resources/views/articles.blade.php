@extends('layouts.master')

@push('styles')
.card{
	margin-bottom: 20px;
}
form{
	float: right;
}
@endpush

@section('content')

@foreach($data as $key => $item)
<div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title">{{$item->judul}}</h5>
    <h6 class="card-subtitle mb-2 text-muted">slug: {{$item->slug}}</h6><hr>
    <p class="card-text">{{$item->isi}}</p>
    @foreach((array)json_decode($item->tag) as $a => $b)
    <button class="btn btn-info">{{$b}}</button>
    @endforeach
    <!-- <a href="#" class="card-link">Another link</a> -->
	<form action="/artikel/{{ $item->id }}" method="POST">
      @method('DELETE')
      @csrf
      <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
	<form action="/artikel/{{ $item->id }}/edit" method="GET">
      <button type="submit" class="btn btn-warning">Edit</button>
    </form>
	<form action="/artikel/{{ $item->id }}" method="GET">
	  <button type="submit" class="btn btn-success">Detail</button>
	</form>
  </div>
</div>
@endforeach

@endsection