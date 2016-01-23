<?php




Route::group(['middleware' => ['web']], function () {

/*
	Routes for registration/Signin
*/
  Route::get('/', 'PagesController@index');

  Route::get('/signIn', 'PagesController@signIn');

  Route::post('/signIn', 'PagesController@signInAccount');
  
  Route::get('/signUp', 'PagesController@signUp');

  Route::post('/signUp', 'PagesController@register');

  Route::get('/dashboard', 'PagesController@postLogin');

  Route::get('/destroyToken', 'PagesController@destroyToken');

/*
	Routes for when the User is logged in
*/

});
  


  	




  
  