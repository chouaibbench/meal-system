<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $todayCode = Code::where('user_id', $user->id)
            ->whereDate('date', Carbon::today())
            ->first();

        return view('users.worker.dashboard', compact('user','todayCode'));
    }
}
