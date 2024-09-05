<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    function loginUser(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:4'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validation->errors()->first()
            ]);
        }

        $cred = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($cred, false)) {
            /** @var \App\Models\User */
            $user = Auth::user();
            if ($user && $user->hasRole('admin')) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Admin user',
                    'url' => 'admin/dashboard'
                ]);
            } else {
                return response()->json([
                    'status' => 200,
                    'message' => 'Guest login success'
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Wrong email or password'
            ]);
        }
    }
}
