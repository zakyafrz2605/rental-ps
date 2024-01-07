@extends('layout.admin')
@section('title', 'Edit User')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col md:-pt-4 py-6 px-6 lg:px-8" id="particles-js">
  <div class="sm:mx-auto sm:w-full sm:max-w-md sm:--mt-4 z-10">
    <h2 class="text-center text-3xl font-extrabold text-gray-900">Register</h2>
  </div>

  @error('error')
  <div class="bg-red-100 w-fit h-[50px] px-2 mt-4 place-self-center flex items-center rounded-md border border-solid border-red-300 z-10">
    <p>{{$message}}</p>
  </div>
  @enderror

  <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-md z-10">
    <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
      <form class="mb-0 space-y-6" method="POST">
        @csrf
        <div>
          <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
          <div class="mt-1">
            <input id="nama" name="nama" type="text" value="{{$user[0]['nama']}}" class="border h-8 w-full p-2" required/>
          </div>
        </div>

        <div>
          <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">No. Telepon</label>
          <div class="mt-1">
            <input id="nomor_telepon" name="nomor_telepon" type="number" value="{{$user[0]['nomor_telepon']}}" class="border h-8 w-full p-2" required/>
          </div>
        </div>

        <div>
          <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
          <div class="mt-1">
            <textarea class="border w-full p-2" name="alamat" id="alamat" rows="2">{{$user[0]['alamat']}}</textarea>
          </div>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <div class="mt-1">
            <input id="email" name="email" type="email" autocomplete="email" value="{{$user[0]['email']}}" class="border h-8 w-full p-2" required/>
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <div class="mt-1">
            <input id="password" name="password" type="password" autocomplete="current-password" class="border h-8 w-full p-2" required/>
          </div>
        </div>

        <div>
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection