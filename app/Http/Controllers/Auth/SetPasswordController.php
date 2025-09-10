<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SetPasswordController extends Controller
{
    public function showForm(Request $request)
    {
        return view('auth.set-password', ['token' => $request->token]);
    }

    public function submit(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('reset_token', $request->token)
                    ->where('reset_token_expires_at', '>', now())
                    ->firstOrFail();

        $user->update([
            'password' => Hash::make($request->password),
            'reset_token' => null,
            'reset_token_expires_at' => null,
        ]);

        return redirect('/login')->with('success', 'Password set successfully!');
    }
}
