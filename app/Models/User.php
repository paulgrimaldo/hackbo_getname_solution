<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 06 Oct 2019 03:51:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $role
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $processes
 * @property \Illuminate\Database\Eloquent\Collection $services
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'email',
		'name',
		'role',
		'password',
		'remember_token'
	];

	public function processes()
	{
		return $this->hasMany(\App\Models\Process::class, 'employee_id');
	}

	public function services()
	{
		return $this->belongsToMany(\App\Models\Service::class)
					->withPivot('id');
	}
}
