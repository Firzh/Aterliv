<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen px-4">
    @include('layouts.guest-nav')

    <div class="flex justify-center pt-12">
        <form method="POST" action="{{ route('login.admin.attempt') }}"
              class="bg-white p-6 rounded shadow-md w-full max-w-sm">
            @csrf

            <h1 class="text-xl font-semibold mb-4 text-center">Login Admin</h1>

            <label class="block mb-2 text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" required
                   class="w-full px-3 py-2 border border-gray-300 rounded mb-4 text-sm">

            <label class="block mb-2 text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" required
                   class="w-full px-3 py-2 border border-gray-300 rounded mb-4 text-sm">

            <button type="submit"
                    style="background-color: #4f46e5; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; width: 100%; font-size: 14px;">
                Masuk
            </button>
        </form>
    </div>
</body>
</html>
