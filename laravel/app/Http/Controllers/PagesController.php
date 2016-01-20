<?php

namespace App\Http\Controllers;


use App\User;
use Hash;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SignInRequest;
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

    public function signIn(){

        return view('signIn');

    }

    public function signInAccount(SignInRequest $request){

        $user = User::where('email', $request->email)->first();
        
        if (empty($user))
            return view('signIn')->withErrors('Email or Password is incorrect');

        else if ($user->password == Hash::check($request->password, $user->password))
            return "success";

        else{

            return view('signIn')->withErrors('Email or Password is incorrect');
        }
           
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