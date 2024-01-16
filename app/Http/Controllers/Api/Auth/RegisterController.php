<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'username' => ['required', 'unique:users', 'alpha_num'],
            'password' => ['required', 'max:9']
        ]);



        $register = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'role' => 'admin'
        ]);

        $user = $register->createToken('sijadwal-api')->plainTextToken;

        return response()->json([
            'status' => 'Registration success',
            'token' => $user
        ]);
    }
}
