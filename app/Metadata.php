<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    //

	public function user() 
	{
		return $this->belongsTo(User::class);
	}
}
