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
        if(auth()->attempt($request->all())) {
            Auth::setUser(auth()->user());

            $validated = $request->validate([
                'email' => 'required|string',
                'password' => 'required',
            ]);

//            dd(auth()->user());

            if($validated) {
                return response([
                    'id' => auth()->user()->id,
                    'status' => 'success',
                    'user' => auth()->user(),
                    'access_token' => auth()->user()->createToken('authToken'),
                ], Response::HTTP_OK);
            }
        }

        return response([
            'status' => 'error',
            'message' => 'This user does not exist',
        ], Response::HTTP_UNAUTHORIZED);
    }
}
