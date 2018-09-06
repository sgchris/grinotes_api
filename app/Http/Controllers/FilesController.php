<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\File;
use App\Folder;
use App\Http\Middleware\CheckFacebookToken;

class FilesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Folder $folder)
    {
		if (User::$current != $folder->user()) {
			return ['error' => 'no permissions to get files list'];
		}

        return $folder->files();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		validate($request->only(['name', 'folder_id']), [
			'name' => 'required|min:2|max:250',
			'folder_id' => 'required|numeric',
		]);

		$name = $request->only('name');

		// validate/find folder
		$folder = User::$current->folders::find(request('folder_id'));
		if (!$folder) {
			return ['error' => 'folder not found'];
		}

		$folder->addFile($name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder, File $file)
    {
		if (User::$current() != $folder->user()) {
			return ['error' => 'no permissions to get the file'];
		}

		if ($file->folder() != $folder) {
			return ['error' => 'file and folder do not match'];
		}

		return $file;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder, File $file)
    {
		if (User::$current() != $folder->user()) {
			return ['error' => 'no permissions to get the file'];
		}

		if ($file->folder() != $folder) {
			return ['error' => 'file and folder do not match'];
		}

		$file->destroy();
    }

}
