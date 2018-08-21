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

Route::get('/metadata', function () {
    return ['metadata' => App\Metadata::all()];
});
Route::post('/metadata', function () {
    return ['metadata' => App\Metadata::all()];
});
Route::get('/metadata/{metakey}', function ($key) {
    return ['metadata' => App\Metadata::where('key', $key)->get()];
});
Route::put('/metadata/{metakey}', function ($key) {
    return [];
});
Route::delete('/metadata/{metakey}', function ($key) {
    App\Metadata::where('key', $key)->delete();
});

// files //
Route::get('/files', function () {
    return ['files' => \App\File::all()];
});
Route::post('/files', function () {
    return ['files' => []];
});

Route::get('/files/{fileid}', function ($fileId) {
    return ['file' => App\File::find($fileId)];
});
Route::put('/files/{fileid}', function ($fileId) {
    return ['files' => []];
});
Route::delete('/files/{fileid}', function ($fileId) {
    $result = App\File::find($fileId)->delete();
    return compact('result');
});

Route::get('/files/{fileid}/versions', function ($fileId) {
    return ['versions' => \App\FileVersion::all()];
});
Route::get('/files/{fileid}/versions/{versionid}', function ($fileId, $versionId) {
    //dd($versionId);
    $fileVersion = \App\FileVersion::where('id', '=', $versionId);
    return ['version' => $fileVersion];
});
