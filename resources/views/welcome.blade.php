<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <!--
  This example requires updating your template:

  ```
  <html class="h-full">
  <body class="h-full">
  ```
-->
<div class="min-h-full">
    <nav class="border-b border-gray-200 bg-white">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
          <div class="flex">
            <div class="flex flex-shrink-0 items-center">
              <img class="block h-8 w-auto lg:hidden rounded-lg" src="https://play-lh.googleusercontent.com/zCniKxijUXmw8CDvWTNMLad0mOWJkgmthvtaZNlYLipragveSxigapwvEm4KctJ72g" alt="Your Company">
              <img class="hidden h-8 w-auto lg:block rounded-lg" src="https://play-lh.googleusercontent.com/zCniKxijUXmw8CDvWTNMLad0mOWJkgmthvtaZNlYLipragveSxigapwvEm4KctJ72g" alt="Your Company">
            </div>
            <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
              <!-- Current: "border-blue-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
              <a href="#" class="border-red-500 text-gray-900 inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium" aria-current="page">Authorization</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div class="py-10">
      <header>

      </header>
      <main>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<div class="flex min-h-full flex-col justify-center mt-10 px-6 py-20 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto h-20 w-auto rounded-lg" src="https://play-lh.googleusercontent.com/zCniKxijUXmw8CDvWTNMLad0mOWJkgmthvtaZNlYLipragveSxigapwvEm4KctJ72g" alt="Your Company">
      <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">OAuth 2.0 Authorization</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('redirect') }}" method="GET">
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
                    <input id="password" name="client_secret" type="text" autocomplete="current-password" required class="block w-full rounded-lg border-0 p-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus: sm:text-sm sm:leading-6">
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
  </div>

</body>
</html>
