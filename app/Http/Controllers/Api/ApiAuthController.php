<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $nim_murid = $request->input('nim_murid');




        $user = AuthResource::make(User::where('nim_murid', $nim_murid)->first());
        // return response()->json([
        //     'user' => $user
        // ]);
        if ($user) {
            if (Hash::check($request->input('password'), $user['password'])) {
                $tokenResult = $user->createToken('authToken')->plainTextToken;

                return response()->json([
                    'status' => "Berhasil",
                    'token' => $tokenResult,
                    'type' => "Bearer",
                    'user' => $user
                ], 200);
            } else {
                return response()->json([
                    'status' => "Error",
                    'message' => "Password anda masukkan salah!!"
                ], 500);
            }
        } else {
            return response()->json([
                'status' => "Error",
                'message' => "Akun anda tidak tersedia"
            ], 500);
        }
    }
}
