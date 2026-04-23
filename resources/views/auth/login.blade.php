<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm">
        <h2 class="text-2xl font-bold mb-6 text-center">🍽️ Meal System</h2>

        @if ($errors->any())
            <div class="mb-4 text-red-500 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm mb-1">Email</label>
                <input type="email" name="email" required
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <div class="mb-6">
                <label class="block text-sm mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg font-semibold">
                Login
            </button>
        </form>

        
    </div>

</body>
</html>
