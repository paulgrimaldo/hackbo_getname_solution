<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 06 Oct 2019 03:51:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Service
 * 
 * @property int $id
 * @property string $name
 * 
 * @property \Illuminate\Database\Eloquent\Collection $processes
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Service extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function processes()
	{
		return $this->belongsToMany(\App\Models\Process::class)
					->withPivot('id');
	}

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class)
					->withPivot('id');
	}
}
