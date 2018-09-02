<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	public function user() 
	{
		return $this->belongsTo(User::class);
	}

	public function versions() 
	{
		return $this->hasMany(FileVersion::class);
	}

	public function addVersion($content)
	{
		$this->versions->add(['content' => $content]);
	}
}
