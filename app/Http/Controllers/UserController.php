<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function test(Request $request){
        return app(UserService::class)
            ->setPayload($request->all())
            ->exec();
    }
}
