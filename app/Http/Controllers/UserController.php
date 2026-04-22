<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard($id)
    {
        $user = \App\Models\User::findOrFail($id);

        $todayCode = Code::where('user_id', $user->id)
            ->latest()
            ->first();

        return view('users.dashboard', compact('user','todayCode'));
    }
}
