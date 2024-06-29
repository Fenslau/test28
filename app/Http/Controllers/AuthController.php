<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Helpers\Result;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    public function __construct(
        private Result $result
    ) {}

    public function login(UserRequest $request)	
    {
        if (auth()->attempt($request->validated())) {
            $user = auth()->user();
            return new UserResource($user);
        }
        else return $this->result->error(__('Invalid login or password'));
  	}

    public function logout()	
    {
        auth()->logout();
        return $this->result->success(__('Successfully logged out'));
    }
}
