<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\File;
use App\Folder;

class FilesVersionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Folder $folder, File $file)
    {
		if (User::$current != $folder->user()) {
			return ['error' => 'permissions error'];
		}

       	if ($file->folder() != $folder) {
			return ['error' => 'file and folder do not match'];
		}

		return $file->versions();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Folder $folder, File $file)
    {
		validate($request->only(['content']), [
			'content' => 'required'
		]);

		if (User::$current != $folder->user()) {
			return ['error' => 'permissions error'];
		}

       	if ($file->folder() != $folder) {
			return ['error' => 'file and folder do not match'];
		}

		$content = request('content');
		$file->addVersion($content);

		return ['result' => 'success'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder, File $file, FileVersion $version)
    {
		if (User::$current != $folder->user()) {
			return ['error' => 'permissions error'];
		}

       	if ($file->folder() != $folder) {
			return ['error' => 'file and folder do not match'];
		}

       	if ($version->file() != $file) {
			return ['error' => 'file and version number do not match'];
		}

		return $version;
    }

}
