<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Invalid credentials.');
        }
    
        // Store user in session
        $request->session()->put('user', $user);
    
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
