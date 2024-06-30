<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function users() {
        $users = user::all();
        // return view('users', compact('users'));
        return view('users', ['users' => $users]);
    }
}
