<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 06 Oct 2019 03:51:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Process
 *
 * @property int $id
 * @property \Carbon\Carbon $ticket_timestamp
 * @property \Carbon\Carbon $process_init_timestamp
 * @property \Carbon\Carbon $proces_end_timestamp
 * @property string $ticket_code
 * @property bool $has_survey
 * @property int $employee_id
 * @property int $client_id
 *
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $services
 * @property \App\Models\Survey $survey
 *
 * @package App\Models
 */
class Process extends Eloquent
{
    public $timestamps = false;

    protected $casts = [
        'has_survey' => 'bool',
        'employee_id' => 'int',
        'client_id' => 'int'
    ];

    protected $dates = [
        'ticket_timestamp',
        'process_init_timestamp',
        'proces_end_timestamp'
    ];

    protected $fillable = [
        'ticket_timestamp',
        'process_init_timestamp',
        'proces_end_timestamp',
        'ticket_code',
        'has_survey',
        'employee_id',
        'client_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'process_service', 'service_id');
    }

    public function survey()
    {
        return $this->hasOne(Survey::class, 'id');
    }

    public function hasSurvey()
    {
        return $this->has_survey == 1;
    }
}
