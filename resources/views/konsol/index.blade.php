@extends('layout.admin')
@section('title', 'Console List')

@section('content')
@error('error')
<div class="row m-4">
  <div class="alert alert-error w-fit">
    {{$message}}
  </div>
</div>
@enderror
<form action="/konsol/add" method="post">
  @csrf
  <button class="btn btn-primary m-4">Tambah Konsol</button>
</form>
  <div class="overflow-x-auto">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No. Konsol</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach($konsol as $k)
    <tr>
      <td>{{$k['id']}}</td>
      <td>{{$k['status']}}</td>
      <td class="flex gap-2">
        <button class="btn btn-error" onclick="modal_{{$k['id']}}.showModal()">Hapus</button>
        <a href="/konsol/{{$k['id']}}">
          <button class="btn btn-primary">Edit</button>
        </a>
      </td>
    </tr>
    <dialog id="modal_{{$k['id']}}" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Peringatan!</h3>
            <p class="py-4">Ingin menghapus {{$k['id']}}?</p>
            <div class="modal-action">
            <form method="post" action="/konsol/{{$k['id']}}/delete">
                @csrf
                <button class="btn btn-error">Hapus</button>
            </form>
            <form method="dialog">
                <button class="btn">Close</button>
            </form>
            </div>
        </div>
        </dialog>
    @endforeach
    </tbody>
  </table>
</div>
@endsection