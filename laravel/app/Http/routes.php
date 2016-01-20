<?php




Route::group(['middleware' => ['web']], function () {

  Route::get('/', 'PagesController@index');

  Route::get('/signIn', 'PagesController@signIn');

  Route::post('/signIn', 'PagesController@signInAccount');
  
  Route::get('/signUp', 'PagesController@signUp');

  Route::post('/signUp', 'PagesController@register');

});
  


  	




  
  