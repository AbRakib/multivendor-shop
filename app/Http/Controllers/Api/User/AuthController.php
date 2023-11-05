<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\User\AuthResource;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller {
    public function login(LoginRequest $request) {
        $user = User::where('phone', $request->phone)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'phone' => ['The provided credentials are incorrect.'],
            ]);
        }
    
        $token = $user->createToken('user-token')->plainTextToken;
        // return AuthResource::make($user);
        return (new AuthResource($user))->additional([
            'meta' => [
                'token' => $token,
                'token_type' => 'Bearer',
            ]   
        ]);
    }
}
