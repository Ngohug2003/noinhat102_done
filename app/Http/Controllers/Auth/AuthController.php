<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function FormLogin(){

        return view('pages.Auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
    
            // Lưu thông tin người dùng vào session
            $request->session()->put('user', Auth::user());
    
            return redirect()->intended('admin');
        }
    
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không khớp',
        ])->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
