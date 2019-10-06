<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 06 Oct 2019 03:51:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProcessService
 * 
 * @property int $id
 * @property int $process_id
 * @property int $service_id
 * 
 * @property \App\Models\Process $process
 * @property \App\Models\Service $service
 *
 * @package App\Models
 */
class ProcessService extends Eloquent
{
	protected $table = 'process_service';
	public $timestamps = false;

	protected $casts = [
		'process_id' => 'int',
		'service_id' => 'int'
	];

	protected $fillable = [
		'process_id',
		'service_id'
	];

	public function process()
	{
		return $this->belongsTo(\App\Models\Process::class);
	}

	public function service()
	{
		return $this->belongsTo(\App\Models\Service::class);
	}
}
