@extends(auth()->check() && auth()->user()->isAdmin() ? 'layout.admin' : 'layout.layout')

@section('title', 'Edit Game')

@php
    $genre = json_decode($game['genre'], true);
@endphp

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col md:-pt-4 py-6 px-6 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-md sm:--mt-4">
    <h2 class="text-center text-3xl font-extrabold text-gray-900">Edit Game</h2>
  </div>

  @error('error')
  <div class="bg-red-100 w-fit h-[50px] px-2 m-auto mt-4 flex items-center rounded-md border border-solid border-red-300">
    <p>{{$message}}</p>
  </div>
  @enderror

  <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
      <form class="mb-0 space-y-6" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="gambar" value="{{$game['image']}}">
        <div>
          <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
          <div class="mt-1">
            <input type="text" id="judul" name="judul" class="input input-bordered w-full" value="{{$game['judul']}}" required/>
          </div>
        </div>
        
        <div>
          <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
          <div class="mt-1">
            <input type="text" id="genre" name="genre" class="input input-bordered w-full" value="{{$genre['genre']}}" />
          </div>
        </div>

        <div>
          <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
          <div class="mt-1">
            <textarea class="textarea textarea-bordered w-full" name="deskripsi" id="deskripsi">{{$game['deskripsi']}}</textarea>
          </div>
        </div>

        <div>
          <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
          <div class="mt-1">
            <input type="file" id="image" name="image" class="file-input file-input-bordered w-full" accept="image/*"/>
          </div>
          @if(!empty($game['image']))
            <p>Gambar Terakhir</p>
            <div class="avatar">
              <div class="w-24 rounded">
                <img src="{{ asset('storage/img/' . $game['image']) }}" />
              </div>
            </div>
          @endif
        </div>

        <div>
          <label for="link" class="block text-sm font-medium text-gray-700">Link Youtube</label>
          <div class="mt-1">
            <input type="text" id="link" name="link" class="input input-bordered w-full" value="{{$game['link']}}"/>
          </div>
        </div>

        <div>
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection