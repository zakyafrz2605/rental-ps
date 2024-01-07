@extends(auth()->check() && auth()->user()->isAdmin() ? 'layout.admin' : 'layout.layout')
@section('title', 'Rental PS')

@section('title', 'Register')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col py-6 px-6 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-md sm:--mt-4">
    <h2 class="text-center text-3xl font-extrabold text-gray-900">Rental</h2>
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
        <div>
          <label for="konsol" class="block text-sm font-medium text-gray-700">Konsol</label>
          <select class="select select-bordered max-w-xs" name="konsol" id="konsol">
          @foreach($konsol as $k)
          @if($k['status'] != 'nonaktif')
            <option value="{{$k['id']}}">{{$k['id']}}</option>
          @endif
          @endforeach
          </select>
        </div>
        
        <div>
          <label for="mulai" class="block text-sm font-medium text-gray-700">Waktu Mulai</label>
          <div class="mt-1">
            <input type="datetime-local" class="input input-bordered w-full" id="mulai" name="mulai" required>
          </div>
        </div>

        <div>
          <label for="selesai" class="block text-sm font-medium text-gray-700">Waktu Sewa</label>
          <div class="mt-1">
            <input type="datetime-local" class="input input-bordered w-full" id="selesai" name="selesai" required>
          </div>
        </div>

        <div>
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Rental</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection