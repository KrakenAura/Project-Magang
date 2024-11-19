<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class VisitorController extends \App\Http\Controllers\Controller
{
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ], [
                'name.required' => 'Name is required',
                'name.max' => 'Name cannot exceed 255 characters',
                'email.required' => 'Email is required',
                'email.email' => 'Please enter a valid email address',
                'email.max' => 'Email cannot exceed 255 characters',
                'email.unique' => 'This email is already registered',
                'password.required' => 'Password is required',
                'password.min' => 'Password must be at least 8 characters'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'visitor',
            ]);
            Auth::login($user);
            return redirect()->route('home');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function login(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:8',
            ], [
                'email.required' => 'Email is required',
                'email.email' => 'Please enter a valid email address',
                'email.max' => 'Email cannot exceed 255 characters',
                'password.required' => 'Password is required',
                'password.min' => 'Password must be at least 8 characters'
            ]);

            if (Auth::attempt(array_merge($validatedData, ['role' => 'visitor']))) {
                $request->session()->regenerate();
                return redirect()->route('home');
            }

            return redirect()->back()->withErrors([
                'error' => 'Invalid email or password. Please check your credentials.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }






    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
