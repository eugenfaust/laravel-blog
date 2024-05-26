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
        <span>Hello, {{ explode('@', auth()->user()->email)[0] }}!</span>
        <a href="{{ route('logout') }}" type="button" class="border p-1">Log Out</a>
    @endunless
    </dv>
