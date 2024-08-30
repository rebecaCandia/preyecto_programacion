<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller
{
    public function loginInicio()
    {
        return view('usuario.usuario');
    }

    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

       
        if (Auth::attempt($credentials, $remember)) {
           
            $request->session()->regenerate();
            return redirect()->route('inicio'); 
        }

        
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}