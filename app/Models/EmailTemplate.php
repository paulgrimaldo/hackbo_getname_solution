<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 06 Oct 2019 03:51:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class EmailTemplate
 * 
 * @property int $id
 * @property string $subject
 * @property string $mail_body
 *
 * @package App\Models
 */
class EmailTemplate extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'subject',
		'mail_body'
	];
}
