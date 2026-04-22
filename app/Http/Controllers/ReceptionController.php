<?php

namespace App\Http\Controllers;

use App\Models\Code;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{
    public function index()
    {
        return view('reception');
    }

    public function validateCode( Request $request )
    {
        $request->validate([
            'code' => 'required | string',
        ]);

        $code = Code::where('code', $request->code)->first();

        if (!$code) {
            return back()->with('error', 'Invalid code');
        }

        if ($code->is_used) {
            return back()->with('error', 'This code has already been used');
        }

        if ($code->date !== now()->toDateString()) {
            return back()->with('error', 'This code is not valid today');
        }

        $user = $code->user;

        if ($user->meal_credit <=0) {
            return back()->with('error', ' User has no meal credit left');
        }

        // VALID → consume meal
        $code->update([
            'is_used' => true
        ]);

        $user->decrement('meal_credit');
        return back()->with('success', 'Meal validated successfully ');
    }
}
