<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\User;

class FoldersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		return User::$current->folders();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		validate($request->only(['name']), [
			'name' => 'required|min:2|max:255',
		]);

		$name = request('name');

		$existingFolder = Folder::where('name', 'like', $name)->get();
		if ($existingFolder) {
			return ['error' => 'the folder already exists'];
		}

		User::$current->folders()->add($name);

		return ['result' => 'success'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Folder $folder)
    {
		if (User::$current != $folder->user()) {
			return ['error' => 'permissions error'];
		}

		return $folder;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Folder $folder)
    {
		if (User::$current != $folder->user()) {
			return ['error' => 'permissions error'];
		}

		validate($request->only(['name']), [
			'name' => 'required|min:2|max:255',
		]);

		// update the folder
		$name = request('name');

		$folder->name = $name;
		$folder->save();

		return ['result' => 'success'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Folder $folder)
    {
		if (User::$current != $folder->user()) {
			return ['error' => 'permissions error'];
		}

		$folder->destroy();

		return ['result' => 'success'];
    }
}
