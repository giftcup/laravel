<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function signupUser(Request $request) {
        $data = $request->all();
    }

}
