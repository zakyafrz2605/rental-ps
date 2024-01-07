@extends(auth()->check() && auth()->user()->isAdmin() ? 'layout.admin' : 'layout.layout')

@section('title', 'Edit Pembayaran')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col md:-pt-4 py-6 px-6 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-md sm:--mt-4">
    <h2 class="text-center text-3xl font-extrabold text-gray-900">Edit Pembayaran</h2>
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
        <input type="hidden" name="gambar" value="{{$pembayaran['bukti_pembayaran']}}">
        <div>
          <label for="nominal" class="block text-sm font-medium text-gray-700">Nominal</label>
          <div class="mt-1">
            <input type="text" id="nominal" name="nominal" class="input input-bordered w-full" value="{{$pembayaran['nominal']}}" required/>
          </div>
        </div>

        <div class="flex flex-col gap-5">
          <div class="flex items-center gap-2">
            <label for="pending" class="text-sm font-medium text-gray-700">Pending</label>
            <div class="mt-1">
              <input type="radio" name="status" id="pending" value="pending" class="radio" checked />
            </div>
          </div>
          <div class="flex items-center gap-2">
            <label for="lunas" class="text-sm font-medium text-gray-700">Lunas</label>
            <div class="mt-1">
              <input type="radio" name="status" id="lunas" value="lunas" class="radio" />
            </div>
          </div>
        </div>

        <div>
          <label for="bukti_pembayaran" class="block text-sm font-medium text-gray-700">Bukti</label>
          <div class="mt-1">
            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="file-input file-input-bordered w-full" accept="image/*"/>
          </div>
          @if(!empty($pembayaran['bukti_pembayaran']))
            <p>Gambar Terakhir</p>
            <div class="avatar">
              <div class="w-24 rounded">
                <img src="{{ asset('storage/bukti/' . $pembayaran['bukti_pembayaran']) }}" />
              </div>
            </div>
          @endif
        </div>

        <div>
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection