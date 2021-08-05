<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\Foundation\Application;

class LoginController
{
    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function authenticate(LoginRequest $request): JsonResponse
    {
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Invalid email and password combination.'], 422);
        }

        $tokenName = $email;

        $user->tokens()->where('name', $tokenName)->delete();

        // Return the token as the response.
        // This token is used to authenticate via API.
        return response()->json([
            'token' => $user->createToken($tokenName)->plainTextToken
        ], 201);
    }

    public function destroy(Request $request): JsonResponse //Application|RedirectResponse|Redirector
    {
        $source = $request->input('source');

        if ($source) {
            $request->user()->tokens()->where('name', $source)->delete();
        } else {
            $request->user()->tokens()->delete();
        }
       // return redirect('/');
	return response()->json([
            'message' => 'Logut'
        ], 201);
    }
}
