<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 06 Oct 2019 03:51:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class IncentiveMessage
 * 
 * @property int $id
 * @property string $message
 *
 * @package App\Models
 */
class IncentiveMessage extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'message'
	];
}
