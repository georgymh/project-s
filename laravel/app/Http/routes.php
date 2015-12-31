<?php


  Route::get('/', 'PagesController@index');
  
  Route::get('/signUp', 'PagesController@signUp');
    
  Route::post('/signUp', 'PagesController@welcome');

  //Route::get('/welcome', 'PagesController@welcome');

  	




  
  