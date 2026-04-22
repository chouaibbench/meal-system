<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>User Dashboard</h1>

    <p><strong>Name:</strong> {{ $user->name}}</p>
    <p><strong>Remaining Credit:</strong> {{ $user->meal_credit }}</p>

    <hr>

    @if($todayCode)
        <h2>Your Code Today</h2>
        <h1 style="color:blue">{{ $todayCode->code }}</h1>

        @if($todayCode->is_used)
            <p style="color:red">Already Used</p>
        @else
            <p style="color:green">Not Used Yet</p>
        @endif
    @else
        <p>No code generated for today</p>
    @endif
</body>
</html>