<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     public function register(Request $req)
    {
        $validatedData = $req->validate([
        'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|unique:users_94910',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',

        ]);
        

        $first_name = $req['first_name'];
        $last_name = $req['last_name'];
        $email = $req['email'];
        $password = $req['password'];

        $users_94910 = new users_94910;
        $users_94910->first_name =$first_name;
        $users_94910->last_name = $last_name;
        $users_94910->email = $email;
        $users_94910->password = Hash::make($password);
        $users_94910->save();

        return new UserResource(
            $users_94910
        );
    }

    public function login(Request $req)
    {
        
        $email=$req['email'];
        $password=$req['password'];

        $users_94910 = users_94910::where('email',$email)->firstOrFail();

        if(Hash::check($password, $users_94910->password))
        {
            return $users_94910->toJson();
        }
        return null;
    }

    public function showUsers(Request $req)
    {
        $data = users_94910::all();

        return $data->toJson();
    }

}
