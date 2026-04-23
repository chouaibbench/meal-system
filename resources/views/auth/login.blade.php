<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meal System Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .fade-in {
            animation: fadeIn 0.7s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="fade-in bg-white p-8 rounded-2xl shadow-xl w-96"
     x-data="{ showPassword: false }">

    <!-- Logo -->
    <div class="text-center mb-6">
        <div class="text-4xl">🍽️</div>
        <h2 class="text-2xl font-bold text-gray-800">Meal System</h2>
        <p class="text-sm text-gray-500">Login to continue</p>
    </div>

    <!-- Errors -->
    @if ($errors->any())
        <div class="mb-4 text-red-500 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-sm mb-1">Email</label>
            <input type="email" name="email" required
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
        </div>

        <!-- Password -->
        <div class="mb-4 relative">
            <label class="block text-sm mb-1">Password</label>

            <input :type="showPassword ? 'text' : 'password'" name="password" required
                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">

            <!-- 👁️ show password -->
            <span 
                @click="showPassword = !showPassword"
                class="absolute right-3 top-9 cursor-pointer text-gray-500"
            >
                👁️
            </span>
        </div>

        <!-- Button -->
        <button type="submit"
            class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition transform hover:scale-105">
            Login
        </button>
    </form>

</div>

</body>
</html>