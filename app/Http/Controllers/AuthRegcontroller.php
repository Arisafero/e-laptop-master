<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\support\facades\Hash;

class AuthRegcontroller extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make
        (
            $request->all(),
                [
                    'email' => 'required|email|unique:users',
                    'name' => 'required|unique:users,name',
                    'password' => 'required',
                    'confirm_password' => 'required|same:password',
                    'alamat' => 'required',
                    'nomor_telepon' =>'required',
                    // or
                    // 'password' => 'required|exists:tabel,kolom',
                ],
                [
                    'email.unique' => 'email telah terdaftar',
                    'username.unique' => 'username telah terdaftar',
                    'confrim_password.unique' => 'konfirmasi password salah',
                ]
        );

        $data = user::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make( $request->confirm_password),
            'alamat' => $request ->alamat,
            'nomor_telepon' => $request ->nomor_telepon,
            'role' => 'user',
        ]);
        return response()->json(
            [
                'status' => true,
                'message' => 'data berhasil masuk',
                'data' => $data
            ]
        );
    }
}