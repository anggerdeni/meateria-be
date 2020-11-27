<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function show(Request $request) {
        $user = new UserResource($request->user());
        return $this->sendResponse($user, 'Data found');
    }
}
