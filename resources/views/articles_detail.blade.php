@extends('layouts.master')

@push('styles')
.card{
	margin-bottom: 20px;
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
    <hr><p class="card-text"> Tanggal dibuat: {{$item->created_at}}<br>Tanggal diubah: {{$item->updated_at}}</p>
  </div>
</div>
<br><p>oleh: </p>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">User</h5>
    <h6 class="card-subtitle mb-2 text-muted">{{$data[0]->name}}</h6><hr>
    <p class="card-text">Email: {{$data[0]->email}}</p>
  </div>
</div>
@endforeach

@endsection