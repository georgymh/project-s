<?php

namespace App\Http\Controllers;


use App\User;
use Hash;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
	public function index()
	{

    	return view('index');
    }

    public function signUp()
    {

    	return view('register');
    }

    public function register(RegisterUserRequest $request)
    {
        $users = new User;
        $users->email = $request->email;
        $users->first_name = $request->firstName;
        $users->last_name = $request->lastName;
        $users->school = $request->school;
        $users->password = Hash::make($request->password);
        $users->save();
        //reroute('/');
    }
    
}