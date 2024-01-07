@extends('layout.admin')
@section('title', 'Rental PS')

@section('content')
<table class="table mt-16 max-w-screen">
  <thead>
    <tr>
      <th scope="col">No. Konsol</th>
      <th scope="col">Penyewa</th>
      <th scope="col">Waktu Mulai</th>
      <th scope="col">Waktu selesai</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($rental as $r)
    <tr>
      <td>{{$r['id_konsol']}}</td>
      @foreach($id_customer as $i => $id)
       @if($id == $r['id_customer'])
        <td>{{$nama[$i]}}</td>
        @break
       @endif
      @endforeach
      <td>{{$r['mulai']}}</td>
      <td>{{$r['selesai']}}</td>
      @if($perbedaan[$i])
      <td>Selesai</td>
      @else
      <td>Berlangsung</td>
      @endif
      <td>
        <form method="post" action="/rental/{{$r['id']}}/delete">
            @csrf
            <button class="btn btn-danger">Hapus</button>
        </form>
        <a href="/rental/{{$r['id']}}">
          <button class="btn btn-primary">edit</button>
        </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>        
@endsection