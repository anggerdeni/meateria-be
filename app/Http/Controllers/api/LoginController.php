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
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'Logged in');
        } else{
            return $this->sendError('Unauthorized.', ['error'=>'Unauthorized']);
        } 
    }
}
