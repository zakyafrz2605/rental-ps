@extends('layout.layout')
@section('title', 'Login')

@section('content')

<div class="min-h-screen bg-gray-100 flex flex-col md:-pt-4 py-6 px-6 lg:px-8 mt-12" id="particles-js">
  <div class="sm:mx-auto sm:w-full sm:max-w-md sm:--mt-4 z-10">
    <!-- <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" /> -->
    <h2 class="text-center text-3xl font-extrabold text-gray-900">Login</h2>
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
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <div class="mt-1">
            <input id="email" name="email" type="email" autocomplete="email" required class="border h-8 w-full p-2" />
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <div class="mt-1">
            <input id="password" name="password" type="password" autocomplete="current-password" required class="border h-8 w-full p-2" />
          </div>
        </div>

        <!-- <div>
          <label for="company-size" class="block text-sm font-medium text-gray-700">Company size</label>
          <div class="mt-1">
            <select name="company-size" id="company-size" class="">
              <option value="">Please select</option>
              <option value="small">1 to 10 employees</option>
              <option value="medium">11 to 50 employees</option>
              <option value="large">50+ employees</option>
            </select>
          </div>
        </div> -->

        <!-- <div class="flex items-center">
          <input id="terms-and-privacy" name="terms-and-privacy" type="checkbox" class="" />
          <label for="terms-and-privacy" class="ml-2 block text-sm text-gray-900"
            >I agree to the
            <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms</a>
            and
            <a href="#" class="text-indigo-600 hover:text-indigo-500">Privacy Policy</a>.
          </label>
        </div> -->

        <div>
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Login</button>
        </div>
      </form>
    </div>
  </div>
  <div class="sm:mx-auto sm:w-full sm:max-w-md sm:--mt-4 z-10">
    <p class="mt-2 text-center text-sm text-gray-600 max-w">
      Belum punya akun?
      <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Register</a>
    </p>
  </div>
</div>
<script src="{{ asset('js/particles.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection