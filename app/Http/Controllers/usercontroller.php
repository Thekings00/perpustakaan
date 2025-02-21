<?php

namespace App\Http\Controllers;

use App\Models\users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class usercontroller extends Controller
{
    public function regist()
    {
        return view('regist');
    }

    public function registrasi(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|string|max:255|required',
                'email' => 'required|email|required',
                'password' => 'required|min:3|required'
            ]);

            $user = new users();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login!');
        }catch(Exception $e){
            return redirect()->route('regist')->with('error', 'Registrasi gagal, silakan coba lagi!!');
        }
    }
    public function login()
    {
        return view('login');
    }

    public function loginproses(Request $request)
    {
        try{
            $request->validate([
                'email' =>'required|email',
                'password' => 'required'
            ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect()->route('dashboard')->with('success', 'Login berhasil!');
            }else{
                return redirect()->route('login')->with('error', 'username atau password salah, silakan coba lagi!!');
            }
        }catch(Exception $e){
            return redirect()->route('login')->with('error', 'Login gagal, silakan coba lagi!!');
        }
    }
}
