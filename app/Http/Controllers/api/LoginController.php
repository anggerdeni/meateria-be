<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        if(Auth::attempt(['username' => $request->login, 'password' => $request->password]) || Auth::attempt(['email' => $request->login, 'password' => $request->password])){ 
            $user = Auth::user();
            $result = $user;
            $result->token = $user->createToken('Meateria')->accessToken;

            return $this->sendResponse($result, $user->createToken('Meateria')->accessToken);
        } else{
            return $this->sendError('username / email / password salah', ['error'=>'Unauthorized'], 401);
        } 
    }
}
