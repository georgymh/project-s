<?php

namespace App\Http\Controllers;


use App\User;
use Hash;
use Auth;
use Session;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\SignInRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Lcobucci\JWT\Builder;

class PagesController extends Controller
{
    //
	public function index()
	{
        if (Auth::check())
        {
            return view('loggedIn');
        }

    	return view('index');
    }

    public function signUp()
    {

    	return view('register');
    }

    public function signIn(){

        return view('signIn');

    }

    public function postLogin(){

        return view('dashboard');

    }
    public function signInAccount(SignInRequest $request){

        $user = User::where('email', $request->email)->first();

        if (empty($user))
            return view('signIn')->withErrors('Email or Password is incorrect');
        
        $rememberMe = $request['agree'];

        if ($rememberMe == 'yes')
            $rememberUser = true;
        else 
            $rememberUser = false;

        if (Auth::attempt(array('email' => $user->email, 'password' => $request->password), $rememberUser)){
            return view('dashboard');
        }
        else{
            return view('signIn')->withErrors('Email or Password is incorrect');
        }

    }

    public function destroyToken(){

        Auth::logout();
        return redirect('/');
    }

    public function register(RegisterUserRequest $request){

        $users = new User;
        $users->email = $request->email;
        $users->first_name = $request->firstName;
        $users->last_name = $request->lastName;
        $users->school = $request->school;
        $users->password = Hash::make($request->password);

        if ( User::where('email', $request->email)->first()){
            return redirect('signUp')->withErrors('That Email is already taken')->withInput($request->except('email'));
        }
        else
            $users->save();

        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password), true)){
            return redirect('/dashboard');
        }
        else
            return view('register');
    }
    
}