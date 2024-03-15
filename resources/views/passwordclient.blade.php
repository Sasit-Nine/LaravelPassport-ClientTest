@extends('layouts.app')
@section('content')
<div class="py-10">
      <header>

      </header>
      <main>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
<div class="flex min-h-full flex-col justify-center mt-10 px-6 py-20 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-20 w-auto rounded-lg" src="https://play-lh.googleusercontent.com/zCniKxijUXmw8CDvWTNMLad0mOWJkgmthvtaZNlYLipragveSxigapwvEm4KctJ72g" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">OAuth 2.0</h2>
      <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Password Grant Client</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('passwordgrant') }}" method="GET">
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Client ID</label>
                <div class="mt-2">
                    <input id="email" name="client_id" type="text" autocomplete="email" required class="block w-full rounded-lg border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus: sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Secret Key</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="secret_key" type="text" required class="block w-full rounded-lg border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus: sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                </div>
                <div class="mt-2">
                    <input id="email" name="email" type="text" required class="block w-full rounded-lg border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus: sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="text" required class="block w-full rounded-lg border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus: sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-lg bg-red-600 px-3 py-3 mt-10 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">Authorization Request</button>
            </div>
        </form>


    </div>
  </div>

        </div>
      </main>
    </div>
@endsection


