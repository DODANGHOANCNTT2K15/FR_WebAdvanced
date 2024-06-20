<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function register(){
        return view("register");
    }

    public function postRegister(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Auth::login($user);

            return redirect()->route('register')->with('success', 'Đăng ký thành công');
        } catch (\Exception $e) {
            return redirect()->route('register')->withErrors('Đăng ký thất bại. Vui lòng thử lại.'. $e->getMessage());
        }
    }

     public function postLogin(Request $request)
    {
         // Validate the request data
         $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        try {
            // Get user by email
            $user = User::where('email', $request->email)->first();

            // Check if user exists and password is correct
            if ($user && $request->password === $user->password) {
                // Log in the user
                Auth::login($user);
                return redirect()->route('index')->with('success', 'Đăng nhập thành công');
            } else {
                // Authentication failed
                return redirect()->route('login')->withErrors('Email hoặc mật khẩu không đúng.');
            }
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error('Đăng nhập thất bại: ' . $e->getMessage());

            // Redirect back with error message
            return redirect()->route('login')->withErrors('Đăng nhập thất bại. Vui lòng thử lại.'. $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
?>
