<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	protected $fillable = array('email', 'password', 'name', 'admin', 'image', 'telephone');

	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	public function getAuthPassword()
	{
		return $this->password;
	}

	public function getReminderEmail()
	{
		return $this->email;
	}

	public function mp3s()
	{
		return $this->hasMany('MP3', 'user_id');
	}

	public function mp4s()
	{
		return $this->hasMany('MP4', 'user_id');
	}

	public function bought()
	{
		return $this->hasMany('MP3Sold', 'user_id');
	}

	public static function is_admin()
	{
		return Auth::user()->admin == 1;
	}

	public static function owns($mp3Id)
	{
		return Auth::user()->id == $mp3Id;
	}

	public function scopeByUsername($query, $username)
	{
		$query->where('username', $username);
	}
}