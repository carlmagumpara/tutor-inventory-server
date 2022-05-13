<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where(['email' => $request->email])->first();

        if (! $user) {
            throw ValidationException::withMessages(['email' => 'Email address or password not match.']);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = $user->createToken('API TOKEN');
            return response()->json([
                'token' => $token->plainTextToken,
                'user' => $user,
                'message' => 'Log in successfully.',
                'success' => true,
            ], 200);
        }

        throw ValidationException::withMessages(['email' => 'Email address or password not match.']);
    }
}
