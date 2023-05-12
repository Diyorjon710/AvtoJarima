<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required',
        ]);

        if($validated) {
            $user = User::where('email', $request->email)->where('password',$request->password)->first();

            if($user!=null) {
                return response([
                    'status' => 'success',
                    'user' => $user,
                ], Response::HTTP_OK);
            }
        }

        return response([
            'status' => 'error',
            'message' => 'This user does not exist',
        ], Response::HTTP_UNAUTHORIZED);
    }
}
