@extends(auth()->check() && auth()->user()->isAdmin() ? 'layout.admin' : 'layout.layout')

@section('title', 'Dashboard Pembayaran')

@section('content')
<a href="/rental/sewa">
  <button class="btn btn-primary m-4">Tambah Rental</button>
</a>
<div class="overflow-x-auto">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nominal</th>
        <th scope="col">Status</th>
        <th scope="col">Bukti</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    @foreach($pembayaran as $p)
    <tr>
      <td>{{$p['id']}}</td>
      <td>{{$p['nominal']}}</td>
      <td>{{$p['status']}}</td>
      @if(!empty($p['bukti_pembayaran']))
      <td>
        <button onclick="modal_{{$p['id']}}.showModal()">
          <img class="max-w-36" src="{{asset('storage/bukti/' . $p['bukti_pembayaran'])}}" alt="">
        </button>
      </td>
      @else
      <td>
        <p>Kosong</p>
      </td>
      @endif
      <td>
        <a href="/pembayaran/{{$p['id']}}">
          <button class="btn btn-primary">Edit</button>
        </a>
      </td>
    </tr>
    <dialog id="modal_{{$p['id']}}" class="modal">
      <div class="modal-box">
      <img src="{{asset('storage/bukti/' . $p['bukti_pembayaran'])}}" alt="">
        <div class="modal-action">
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