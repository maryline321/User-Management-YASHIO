<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function addUser(CreateUserRequest $request)
    {
        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
        ]);

        return response()->json($user, 201);
    }

    public function getUser($id)
    {
        $user =User::find($id);

        if(!$user){
            return response()->json(['message'=>'User not found'], 404);
        }

        return response()->json($user, 200);
    }

    public function getAllUsers()
    {
        $users=User::all();

        return response()->json($users, 200);
    }
}
