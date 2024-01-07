@extends(auth()->check() && auth()->user()->isAdmin() ? 'layout.admin' : 'layout.layout')

@section('title', 'Daftar Game')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <h1 class="text-center text-4xl font-semibold mb-5">Daftar Game</h1>
    @if(auth()->check() && auth()->user()->isAdmin())
    <a href="/game/add" class="btn btn-primary">Tambah Game</a>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-5">
        @foreach($games as $g)
        <div class="rounded-xl shadow-xl min-h-min bg-slate-50">
            <div class="p-5 flex flex-col">
                @if(!empty($g['image']))
                <div class="rounded-xl overflow-hidden h-56 max-w-full m-auto">
                    <img src="{{ asset('storage/img/' . $g['image']) }}" alt="...">
                </div>
                @else
                <div class="rounded-xl overflow-hidden h-56 m-auto w-full flex items-center justify-center border">
                    <p>Tidak ada gambar.</p>
                </div>
                @endif
                <h5 class="text-2xl md:text-3xl font-medium mt-3">{{$g['judul']}}</h5>
                @if(empty($g['deskripsi']))
                <p class="text-slate-500 text-lg mt-3">Tidak ada deskripsi.</p>
                @else
                <p class="text-slate-500 text-lg mt-3 truncate">{{$g['deskripsi']}}</p>
                @endif
                <a href="/game/{{$g['id']}}" class="text-center bg-blue-400 text-blue-700 py-2 rounded-lg font-semibold mt-4 hover:bg-blue-300 focus:scale-95 transition-all duration-200 ease-out">Detail</a>
                @if(auth()->check() && auth()->user()->isAdmin())
                <a href="/game/{{$g['id']}}/edit" class="text-center bg-amber-200 text-amber-500 py-2 rounded-lg font-semibold mt-4 hover:bg-amber-300 focus:scale-95 transition-all duration-200 ease-out">Edit</a>
                
                <button class="text-center bg-red-400 text-red-900 py-2 rounded-lg font-semibold mt-4 hover:bg-red-500 focus:scale-95 transition-all duration-200 ease-out" onclick="modal_{{$g['id']}}.showModal()">Hapus</button>
                @endif
            </div>
        </div>
        <dialog id="modal_{{$g['id']}}" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Peringatan!</h3>
            <p class="py-4">Ingin menghapus {{$g['judul']}}?</p>
            <div class="modal-action">
            <form method="dialog">
                <a href="/game/{{$g['id']}}/delete" class="btn btn-error">Hapus</a>
                <button class="btn">Close</button>
            </form>
            </div>
        </div>
        </dialog>
        @endforeach
    </div>
@endsection