<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    @include('layouts.guest-nav')

    <div class="mx-auto mt-6 bg-white p-6 rounded-md shadow-md" style="width: 90%; max-width: 800px;">

        {{-- HEADER --}}
        <div class="flex justify-center mb-4">
            <h1 class="text-xl font-semibold mb-6 text-center text-gray-800">Forgot Your Password?</h1>
        </div>

        {{-- Description --}}
        <div class="mb-4 text-sm text-gray-600 text-center">
            Forgot your password? No problem. Just enter your email address and we'll send you a link to reset it.
        </div>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600 text-center">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
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

            {{-- Submit Button --}}
            <div class="flex justify-end mt-6">
                <button type="submit"
                        style="padding: 0.5rem 1rem; background-color: #4f46e5; color: white; font-size: 0.875rem; font-weight: 500; border-radius: 0.375rem; border: none; cursor: pointer;"
                        onmouseover="this.style.backgroundColor='#4338ca'"
                        onmouseout="this.style.backgroundColor='#4f46e5'">
                    Email Password Reset Link
                </button>
            </div>
        </form>

    </div>

</body>
</html>
