<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'max:255'],
            'password' => ['required', 'min:7', 'max:10']
        ]);
        
        if(Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Login Success',
                'token' => Auth::user()->createToken('sijadwal-api')->plainTextToken
            ]);
        }

        return response()->json([
            'status' => 'Login Fail'
        ]);
    }
}
