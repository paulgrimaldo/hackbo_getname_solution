<?php

namespace App\Http\Controllers\Client;

use App\Models\Process;
use App\Models\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    public function getSurveyView($userId, $processId)
    {
        $process = Process::findOrFail($processId);
        if ($userId != $process->client_id) {
            $errorMessage = 'No tienes permiso para llenar esta encuesta';
            return view('client.can_not_fill_survey', compact('errorMessage'));
        }
        if ($process->hasSurvey()) {
            $errorMessage = 'Esta encuesta ya fue rellenada por tí y ya no esta disponible';
            return view('client.can_not_fill_survey', compact('errorMessage'));
        }
        return view('client.fill_survey', compact('process'));
    }

    public function store(Request $request)
    {
        $wasAttentionOk = 0;
        if ($request->has('was_attention_ok')) {
            $wasAttentionOk = $request->post('was_attention_ok');
        }
        $processId = $request->post('process_id');
        $process = Process::find($processId);
        if ($process->hasSurvey()) {
            $errorMessage = 'Esta encuesta ya fue rellenada por tí y ya no esta disponible';
            return view('client.can_not_fill_survey', compact('errorMessage'));
        }
        $survey = new Survey();
        $survey->process_id = (int)$processId;
        $survey->was_attention_ok = $wasAttentionOk;
        $survey->attention_score = $request->post('attention_score');
        $survey->institution_score = $request->post('institution_score');
        $survey->comment = trim($request->post('comment'));
        $survey->save();
        $process->has_survey = true;
        $process->save();
        return view('client.survey_done');
    }
}
