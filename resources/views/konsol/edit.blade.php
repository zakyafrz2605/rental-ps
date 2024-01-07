@extends(auth()->check() && auth()->user()->isAdmin() ? 'layout.admin' : 'layout.layout')

@section('title', 'Edit Detail Konsol')

@php
  $idGame = explode(',', $konsol['id_game']);
@endphp

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col py-6 px-6 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-md sm:--mt-4">
    <h2 class="text-center text-3xl font-extrabold text-gray-900">Edit Konsol</h2>
  </div>

  @error('error')
  <div class="bg-red-100 w-fit h-[50px] px-2 mt-4 place-self-center flex items-center rounded-md border border-solid border-red-300 z-10">
    <p>{{$message}}</p>
  </div>
  @enderror

  <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
      <form class="mb-0 space-y-6" method="POST">
        @csrf

        <div class="flex flex-col gap-5">
          <div class="flex items-center gap-2">
            <label for="aktif" class="text-sm font-medium text-gray-700">Aktif</label>
            <div class="mt-1">
              <input type="radio" name="status" id="aktif" value="aktif" class="radio" checked />
            </div>
          </div>
          <div class="flex items-center gap-2">
            <label for="nonaktif" class="text-sm font-medium text-gray-700">Nonaktif</label>
            <div class="mt-1">
              <input type="radio" name="status" id="nonaktif" value="nonaktif" class="radio" />
            </div>
          </div>
        </div>

        @if(!empty($games))
        @foreach($games as $game)
          @if(in_array($game['id'], $idGame))
          <div class="form-control">
            <label class="label cursor-pointer">
              <span class="label-text">{{$game['judul']}}</span> 
              <input type="checkbox" name="games[]" value="{{$game['id']}}" id="{{$game['id']}}" class="checkbox" checked/>
            </label>
          </div>
          @else
          <div class="form-control">
            <label class="label cursor-pointer">
              <span class="label-text">{{$game['judul']}}</span> 
              <input type="checkbox" name="games[]" value="{{$game['id']}}" id="{{$game['id']}}" class="checkbox"/>
            </label>
          </div>
          @endif
        @endforeach
        @endif

        <div>
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Rental</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection