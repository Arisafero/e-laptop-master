<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
use Illuminate\support\facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        // return $request;
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'name sudah ada',
            'password.required' => 'password jelek'
            ]
        );

        $credential_email = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        $credential_username = [
            'name'=>$request->email,
            'password'=>$request->password
        ];

        // return $credential;
        if (Auth::attempt($credential_email) || Auth::attempt($credential_username))
        {
            return redirect('/merek');
        }
        else
        {
            return redirect()->back();
        }
    }


    public function register()
    {
        // user::create([
        //     'name' => 'ronaldo',
        //     'email' =>  'ronaldo@yahoo.com',
        //     'password' => Hash::make(ronaldo@yahoo.com),
        // ]);
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        // return $request;
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users,name',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            // or
            // 'password' => 'required|exists:tabel,kolom',
        ],
        [
            'email.unique' => 'email telah terdaftar',
            'username.unique' => 'username telah terdaftar',
            'confrim_password.unique' => 'konfirmasi password salah',
        ]
    );
        user::create([
            'email' => $request->email,
            'name' => $request->username,
            'password' => Hash::make( $request->confirm_password),
        ]);
        return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return redirect('/login');
    }
//     <form action="{{ route('logout') }}" method="POST">
//     @csrf
//     <button type="submit">Logout</button>
// </form>


}

