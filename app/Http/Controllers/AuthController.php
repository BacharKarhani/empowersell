<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();

            switch ($user->role_id) {
                case 1:
                    return redirect()->route('manage.users.index');
                    break;
                case 2:
                    return redirect()->route('vendor-dashboard');
                    break;
                case 3:
                    return redirect()->route('customer-dashboard');
                    break;
                default:
                    return redirect()->route('login')->with('error', 'Invalid Email or Password');
            }
        }

        return redirect()->route('login')->with('error', 'Invalid Email or Password');
    }

    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'gender' => 'required|in:male,female,other',
                'address' => 'required|string|max:255',
                'profile_picture' => 'nullable|image|max:2048', // 2MB max
                'phone_number' => 'required|string|max:20',
                'role_id' => 'required|exists:roles,id', // Ensure role_id exists in roles table
            ]);
    
            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                $path = $request->file('profile_picture')->store('profile_pictures');
                $validatedData['profile_picture'] = $path;
            }
    
            // Create the user
            $user = new User([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'gender' => $validatedData['gender'],
                'address' => $validatedData['address'],
                'profile_picture' => $validatedData['profile_picture'] ?? null,
                'phone_number' => $validatedData['phone_number'],
                'role_id' => $validatedData['role_id'], // Assign the role_id
            ]);
    
            // Save the user
            $user->save();
    
            // Redirect to the login page with a success message
            return redirect()->route('login')->with('success', 'Your account has been created. Please sign in with your new account.');
        } catch (\Exception $e) {
            // Log any exceptions
            Log::error('Error occurred during user registration: ' . $e->getMessage());
            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }
    
}
