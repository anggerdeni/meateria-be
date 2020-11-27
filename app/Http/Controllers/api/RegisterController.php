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
            'profile_picture' => 'nullable|file|image|mimes:jpeg,png,gif,webp|max:2048',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['profile_picture'] = 'storage/img/default.png';
        $input['balance'] = 0;
        $user = User::create($input);
        if (!empty($request->file('profile_picture'))) {
            $image = $request->file('profile_picture');
            $image->storeAs('public/uploads/profile/' . $user->id . '/', 'profil.jpg');
            $user->profile_picture = 'storage/uploads/profile/' . $user->id . '/profil.jpg';
            $user->save();
            $user->refresh();
        }
        $result = $user;
        $result['token'] =  $user->createToken('Meateria')->accessToken;

        return $this->sendResponse($result, 'User registered successfully.');
    }
}
