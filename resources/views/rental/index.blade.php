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
      <td>
        <a href="/rental/{{$r['id']}}">
          <button class="btn btn-primary">Edit</button>
        </a>
      </td>
    </tr>
    @endforeach
    </tbody>
  </table>
</div>
@endsection