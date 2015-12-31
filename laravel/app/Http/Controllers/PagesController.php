<?php

namespace App\Http\Controllers;

use Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


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

    public function welcome()
    {
        $input = Request::all();

    	return $input;
    }


}
