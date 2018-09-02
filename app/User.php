<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function files() 
	{
		return $this->hasMany(File::class);
	}

	public function metadata() 
	{
		return $this->hasMany(Metadata::class);
	}

	// operations

	public function addFile($name)
	{
		$this->files->add(['name' => $name]);
	}

	public function setMetadata($key, $value)
	{
		$metadataRecord = $this->metadata::firstOrCreate(['key' => $key]);
		$metadataRecord->value = $value;
		$metadataRecord->save();
	}
}
