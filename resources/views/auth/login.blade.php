<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    @include('layouts.guest-nav')

    <div class="mx-auto mt-6 bg-white p-6 rounded-md shadow-md" style="width: 90%; max-width: 800px;">
        
        {{-- LOGO (Placeholder) --}}
        <div class="flex justify-center mb-4">
            <h1 class="text-xl font-semibold mb-6 text-center text-gray-800">Login to Your Account</h1>
        </div>
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/LATERLIV.png') }}" alt="Logo" class="h-[102px] w-[102px] object-contain opacity-100">
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" required autofocus
                       class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300"
                       value="{{ old('email') }}">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                       class="mt-1 block w-full px-3 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-300">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                style="width: 100%; padding: 0.5rem 1rem; background-color: #4f46e5; color: white; font-size: 0.875rem; font-weight: 500; border-radius: 0.375rem; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='#4338ca'"
                onmouseout="this.style.backgroundColor='#4f46e5'">
                Login
            </button>

            <br>
            <br>

            {{-- Divider --}}
            <div class="flex items-center my-4">
                <div class="flex-grow h-px bg-gray-300"></div>
                <span class="mx-2 text-sm text-gray-400" style="display: block; text-align: center; width: 800px;">or</span>
                <div class="flex-grow h-px bg-gray-300"></div>
            </div>
            <br>

            {{-- Google Login --}}
            <a href="{{ route('google.login') }}"
                style="display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; width: 100%; padding: 0.5rem 1rem; background-color: white; border: 1px solid #d1d5db; border-radius: 0.375rem; font-size: 0.875rem; color: #374151; text-decoration: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='#f9fafb'"
                onmouseout="this.style.backgroundColor='white'">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" style="height: 1.25rem; width: 1.25rem;">
                Continue with Google
            </a>
            
            <!-- {{-- Remember Me --}}
            <div class="flex items-center mb-4">
                <input id="remember_me" name="remember" type="checkbox"
                       class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                <label for="remember_me" class="ml-2 text-sm text-gray-700">
                    Remember me
                </label>
            </div> -->
            
            {{-- Actions --}}
            <div class="flex flex-col items-center space-y-2">
                @if (Route::has('password.request'))
                <br>
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:underline">
                        Forgot password?
                    </a>
                @endif

                @if (Route::has('register'))
                    <p class="text-sm text-gray-600 hover:underline">Don’t have an account? </p>
                    <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:underline">
                        <span class="text-indigo-600">Register</span>
                    </a>
                @endif
            </div>
        </form>
    </div>

</body>
</html>
