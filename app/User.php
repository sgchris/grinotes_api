<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

	// the currently auth user
	public static $current = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

	public function folders() 
	{
		return $this->hasMany(Folder::class);
	}

	public function metadata() 
	{
		return $this->hasMany(Metadata::class);
	}

	// operations

	public function addFolder($name)
	{
		$this->folders->add(['name' => $name]);
	}

	public function setMetadata($key, $value)
	{
		$metadataRecord = $this->metadata::firstOrCreate(['key' => $key]);
		$metadataRecord->value = $value;
		$metadataRecord->save();
	}
}
