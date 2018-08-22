<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// metadata //

Route::get('/metadata', 'MetadataController@index');
Route::post('/metadata', 'MetadataController@store');
Route::get('/metadata/{metakey}', 'MetadataController@show');
Route::patch('/metadata/{metakey}', 'MetadataController@update');
Route::delete('/metadata/{metakey}', 'MetadataController@destroy');

// files //

Route::get('/files', 'FilesController@index');
Route::post('/files', 'FilesController@store');

Route::get('/files/{file}', 'FilesController@show');
Route::patch('/files/{file}', 'FilesController@store');
Route::delete('/files/{file}', 'FilesController@destroy');

Route::get('/files/{file}/versions', 'FileVersionsController@index');
Route::post('/files/{file}/versions', 'FileVersionsController@store');
Route::get('/files/{file}/versions/{version}', 'FileVersionsController@show');

