@extends(auth()->check() && auth()->user()->isAdmin() ? 'layout.admin' : 'layout.layout')

@section('title', 'Rental PS')

@section('content')
<a href="/rental/sewa">
  <button class="btn btn-primary m-4">Tambah Rental</button>
</a>
<div class="overflow-x-auto">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No. Konsol</th>
        <th scope="col">Waktu Mulai</th>
        <th scope="col">Waktu selesai</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach($rental as $r)
    <tr>
      <td>{{$r['id_konsol']}}</td>
      <td>{{$r['mulai']}}</td>
      <td>{{$r['selesai']}}</td>
      <td class="flex gap-2">
      <button class="btn btn-error" onclick="modal_{{$r['id']}}.showModal()">Hapus</button>
        <a href="/rental/{{$r['id']}}">
          <button class="btn btn-primary">Edit</button>
        </a>
      </td>
    </tr>
    <dialog id="modal_{{$r['id']}}" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Peringatan!</h3>
        <p class="py-4">Ingin menghapus rental {{$r['id']}}?</p>
        <div class="modal-action">
        <form method="post" action="/rental/{{$r['id']}}/delete">
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