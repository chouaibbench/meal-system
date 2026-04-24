<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reception Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md text-center">
        <h1 class="text-2xl font-bold mb-6">Meal Validaton</h1>

        <!-- Validation Form -->
        <form method="POST" action="{{ route('reception.validate') }}">
            @csrf

            <input type="text" name="code" placeholder="Enter code" class="w-full p-3 border rounded-lg text-center text-lg tracking-wedset focus:outline-none focuse:ring-2 focus:ring-blue-500" required>
            <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">Validate</button>
        </form>
    
        @if(session('success'))
            <p style="color:green">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p style="color:red">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-gray-500 hover:text-red-500">Logout</button>
        </form>
    </div>
</body>
</html>