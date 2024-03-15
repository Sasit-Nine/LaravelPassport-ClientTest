<nav class="border-b border-gray-200 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex">
                <div class="flex flex-shrink-0 items-center">
                    <img class="block h-8 w-auto lg:hidden rounded-lg" src="https://play-lh.googleusercontent.com/zCniKxijUXmw8CDvWTNMLad0mOWJkgmthvtaZNlYLipragveSxigapwvEm4KctJ72g" alt="Your Company">
                    <img class="hidden h-8 w-auto lg:block rounded-lg" src="https://play-lh.googleusercontent.com/zCniKxijUXmw8CDvWTNMLad0mOWJkgmthvtaZNlYLipragveSxigapwvEm4KctJ72g" alt="Your Company">
                </div>
                <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                    <a href="/" class="{{ request()->is('/') ? 'border-red-500' : '' }} text-gray-900 inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium" aria-current="page">Authorization Code Client</a>
                    <a href="{{ route('password') }}" class="{{ request()->is('password') ? 'border-red-500' : '' }} text-gray-900 inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium" aria-current="page">Password Grant Client</a>
                </div>
            </div>
        </div>
    </div>
</nav>
