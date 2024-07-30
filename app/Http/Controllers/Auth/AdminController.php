<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Log;

class AdminController extends \App\Http\Controllers\Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        Auth::login($user);

        return response()->json(['message' => 'Admin registered successfully.'], 201);
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
                $request->session()->regenerate();

                return response()->json(['message' => 'Admin logged in successfully.'], 200);
            }

            return response()->json(['message' => 'Invalid credentials.'], 401);
        } catch (\Exception $e) {
            Log::error('Admin login error: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred during login.', 'error' => $e->getMessage()], 500);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Admin logged out successfully.'], 200);
    }

    public function dashboard()
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('adminlogin');
        }

        return view('dashboard/admin');
    }
}
