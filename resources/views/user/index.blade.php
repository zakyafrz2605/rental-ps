@extends('layout.admin')
@section('title', 'Customer Rental')

@section('content')
@error('error')
    <div class="row m-4 mt-12">
      <div class="alert alert-error w-fit">
        {{$message}}
      </div>
    </div>
@enderror
  <div class="overflow-x-auto">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nama</th>
        <th scope="col">Nomor Telepon</th>
        <th scope="col">Alamat</th>
        <th scope="col">Email</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user['id']}}</td>
      <td>{{$user['nama']}}</td>
      <td>{{$user['nomor_telepon']}}</td>
      <td>{{$user['alamat']}}</td>
      <td>{{$user['email']}}</td>
      <td class="flex gap-2">
      <button class="btn btn-error" onclick="modal_{{$user['id']}}.showModal()">Hapus</button>
        <a href="/user/{{$user['id']}}">
          <button class="btn btn-primary">edit</button>
        </a>
      </td>
    </tr>
    <dialog id="modal_{{$user['id']}}" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Peringatan!</h3>
            <p class="py-4">Ingin menghapus {{$user['nama']}}?</p>
            <div class="modal-action">
            <form method="post" action="/user/{{$user['id']}}/delete">
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