<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Log;


//Controller used for Admin Authentication
class AdminController extends \App\Http\Controllers\Controller
{
    /**
     *Register Function
     *param : Request from view (name, email, password)
     */

    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        // Log the user in
        Auth::login($user);

        return response()->json(['message' => 'Admin registered successfully.'], 201);
    }

    /**
     *Login Function
     *param : Request from view (email, password)
     */
    public function login(Request $request)
    {
        try {
            // Validate the request
            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            // Attempt to authenticate the user
            if (Auth::attempt(array_merge($credentials, ['role' => 'admin']))) {
                $request->session()->regenerate();

                return response()->json(['message' => 'Admin logged in successfully.'], 200);
            }

            // Authentication failed
            return response()->json(['message' => 'Invalid credentials.'], 401);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Admin login error: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred during login.', 'error' => $e->getMessage()], 500);
        }
    }

    // Logout Function
    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();
        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Return a response
        return response()->json(['message' => 'Admin logged out successfully.'], 200);
    }

    public function dashboard()
    {
        // Check if the user is authenticated as an admin
        if (!Auth::guard('web')->check()) {
            return redirect()->route('adminlogin');
        }

        // Return the admin dashboard view
        return view('dashboard/admin');
    }
}
