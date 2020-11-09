<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\api\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends BaseController
{
    /**
     * Register api
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['balance'] = 0;
        $user = User::create($input);
        $success['token'] =  $user->createToken('Meateria')->accessToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');
    }
}
