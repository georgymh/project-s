<?php




Route::group(['middleware' => ['web']], function () {

  Route::get('/', 'PagesController@index');
  
  Route::get('/signUp', 'PagesController@signUp');

  Route::post('/signUp', 'PagesController@register');

});
  


  	




  
  