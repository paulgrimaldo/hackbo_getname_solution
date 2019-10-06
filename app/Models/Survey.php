<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 06 Oct 2019 03:51:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Survey
 *
 * @property int $id
 * @property bool $was_attention_ok
 * @property int $attention_score
 * @property int $institution_score
 * @property string $comment
 * @property \Carbon\Carbon $timestamp
 * @property int $process_id
 *
 * @property \App\Models\Process $process
 *
 * @package App\Models
 */
class Survey extends Eloquent
{
    public $timestamps = false;

    protected $table = 'surveys';

    protected $dates = [
        'timestamp'
    ];

    protected $fillable = [
        'was_attention_ok',
        'attention_score',
        'institution_score',
        'comment',
        'timestamp',
        'process_id'
    ];
}
