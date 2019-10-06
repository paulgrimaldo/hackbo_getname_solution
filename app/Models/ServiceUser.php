<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 06 Oct 2019 03:51:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ServiceUser
 * 
 * @property int $id
 * @property int $service_id
 * @property int $user_id
 * 
 * @property \App\Models\Service $service
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class ServiceUser extends Eloquent
{
	protected $table = 'service_user';
	public $timestamps = false;

	protected $casts = [
		'service_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'service_id',
		'user_id'
	];

	public function service()
	{
		return $this->belongsTo(\App\Models\Service::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
