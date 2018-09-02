<?php

use Illuminate\Http\Request;

use App\File;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('metadata', 'FilesController@index');
Route::post('metadata', 'FilesController@store');
Route::get('metadata/{key}', 'MetadataController@show');
Route::put('metadata/{key}', 'MetadataController@update');
Route::delete('metadata/{key}', 'MetadataController@destroy');

Route::get('files', 'FilesController@index');
Route::post('files', 'FilesController@store');

Route::get('files/{file}', 'FilesController@show');
Route::put('files/{file}', 'FilesController@update');
Route::delete('files/{file}', 'FilesController@destroy');

Route::get('files/{file}/verions', 'FilesVersionsController@index');
Route::post('files/{file}/verions', 'FilesVersionsController@store');
Route::get('files/{file}/versions/{version}', 'FilesVersionsController@show');



