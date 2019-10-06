<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\Survey;

class ProcessesController extends Controller
{
    public function listMyProcesses()
    {
        $processes = Process::where('client_id', '=', auth()->id())->get();
        return view('client.my_processes', compact('processes'));
    }

    public function show(Process $process)
    {
        $services = $process->services;
        $generalResume = false;

        if ($process->hasSurvey()) {
            $survey = Survey::where('process_id', $process->id)->first();
            if ($survey->was_attention_ok && $survey->attention_score > 3 && $survey->institution_score > 3) {
                $generalResume = true;
            }
        }

        return view('client.process_detail', compact('process', 'services', 'generalResume'));
    }
}
