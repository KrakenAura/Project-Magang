<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

//Controller used for Visitor Authentication
class VisitorController extends \App\Http\Controllers\Controller
{
    // Register Function
    //@param : Request from view (name, email, password)
    public function register(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            // Create a new user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'visitor',
            ]);

            // Log the user in
            Auth::login($user);
            return redirect()->route('home');


        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'visitor']))) {
            $request->session()->regenerate();

            return response()->json(['message' => 'Visitor logged in successfully.'], 200);
        }

        return response()->json(['message' => 'Invalid credentials.'], 401);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
