<?php

Route::group(['prefix' => 'api/v1'], function()
{
	Route::resource('lessons', 'LessonsController');
	Route::resource('tags', 'TagsController', ['only' => ['index', 'show']]);
});
