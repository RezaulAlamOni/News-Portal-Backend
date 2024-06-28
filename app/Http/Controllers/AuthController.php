<?php

// AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json(compact('user','token'), 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Personal Access Token')->accessToken;
            return response()->json(compact('token','user'), 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function getUser()
    {
        return response()->json(\auth()->user());
    }
}
