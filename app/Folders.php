<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folders extends Model
{
	protected static $fillable = [
		'name'
	];

    //
	public function files() 
	{
		return $this->hasMany(File::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function addFile($name)
	{
		$this->files()->add(['name' => $name]);
	}

}
