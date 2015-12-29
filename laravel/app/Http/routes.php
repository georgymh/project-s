<?php


  Route::get('/', function()
  {
  	return View::make('index');


  });

  Route::get('/signUp', function()
  {

  	return View::make('register');


  });

  
  Route::get('/signUp/welcome', function()
  {

  	return View::make('welcome_view');


  });

  Route::get('/signUp/validate', 'ValidateController@validateInputFields');
  