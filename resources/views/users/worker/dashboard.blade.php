<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="max-w-4xl mx-auto p-6">

        <!-- Header -->
        <h1 class="text-3xl font-bold mb-6">👤Welcome, {{ $user->name}}</h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="mb-4 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
        </form>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Meal Credit -->
            <div class="bg-white">
                <h2 class="text-gray-500">Meal Credit</h2>
                <p class="text-2xl font-bold text-blue-600"> {{ $user->meal_credit }}</p>
            </div>

            <!-- Today Code -->
            <div class="text-xl font-mono font-bold text-green-600">
                <h2 class="text-gray-500">Today's Code</h2>

                <p class="text-xl font-mono font-bold text-green-600"> {{ $todayCode->code ?? 'No code yet'}}</p>
            </div>
            <!-- Status -->
            <div class="bg-white">
                <h2>Status</h2>

                @if($todayCode)
                    @if($todayCode->is_used)
                        <p style="text-red-500 font-bold">Already Used</p>
                    @else
                        <p style="text-green-500 font-bold">Available</p>
                    @endif
                @else
                    <p class="text-grave-400">No code generated for today !!</p>
                @endif
            </div>

            
        </div>
    </div>



</body>
</html>