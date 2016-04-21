<?php

Route::get('/', function(){
   return view('welcome');
});

Route::group(['prefix' => 'api/v1'], function()
{
	Route::resource('lessons', 'LessonsController');
	Route::resource('tags', 'TagsController', ['only' => ['index', 'show']]);
	Route::get('lessons/{id}/tags', 'TagsController@index');

});
