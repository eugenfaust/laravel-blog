<div class="max-w-52 w-full border-l h-screen p-2">

    @unless (Auth::check())
        <form method="POST" action="{{ route('login') }}">
            @csrf
            @error('email')
                <span class="mb-2 text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <!-- Email Address -->
            <div class="flex flex-col items-center">
                <span for="email">E-mail</span>
                <input id="email" class="border block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />

            </div>

            <!-- Password -->
            <div class="mt-2 flex flex-col items-center">
                <span for="password">Password</span>

                <input id="password" class="border block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>
            <div class="flex flex-col items-center mt-2">
                <button type="submit" class="h-8 border p-1 w-full bg-green-500 text-white">
                    {{ __('Log in') }}
                </button>
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('register') }}">
                    {{ __('Register') }}
                </a>
            </div>
            <div class="flex items-center justify-end mt-4">



            </div>
        </form>
    @else
        <div class="flex flex-col justify-between h-96">
            <div class="flex flex-col gap-2">
                <span class="inline-flex self-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    {{ explode('@', auth()->user()->email)[0] }}</span>
                <a href="{{ route('posts/create') }}" class="p-1 border-2 border-green-500">Create post</a>
                <a href="{{ route('user', ['user' => auth()->user()->id]) }}" class="p-1 border-2 border-green-500">My
                    profile</a>
            </div>

            <a href="{{ route('logout') }}" type="button" class="border-2 p-1 border-red-500">Log Out</a>
        </div>

    @endunless
    </dv>
