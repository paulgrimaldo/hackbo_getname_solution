<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoundAnalysis extends Model
{
    protected $table = 'sound_analysis';
    public $timestamps = false;
    protected $fillable = ['process_id', 'emotion', 'start', 'end'];
}
