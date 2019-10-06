<?php

namespace App\Http\Controllers\Client;

use App\Models\Process;
use App\Models\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
{
    public function getSurveyView(Request $request)
    {
        $processId = $request->get('processId');
        $process = Process::findOrFail($processId);
        if ($request->get('userId') != $process->client_id) {
            $errorMessage = 'You can not fill this survey';
            return view('client.can_not_fill_survey', compact('errorMessage'));
        }
        if ($process->hasSurvey()) {
            $errorMessage = 'Can not fill this survey because the process already be evaluated';
            return view('client.can_not_fill_survey', compact('errorMessage'));
        }
        return view('client.fill_survey');
    }

    public function store(Request $request)
    {
        $processId = $request->post('process_id');
        $process = Process::findOrFail($processId);
        if ($process->hasSurvey()) {
            $errorMessage = 'Can not fill this survey because the process already be evaluated';
            return view('client.can_not_fill_survey', compact('errorMessage'));
        }
        $process->has_survey = true;
        $process->save();
        $survey = new Survey();
        $survey->process_id = $processId;
        $survey->was_attention_ok = $request->post('was_attention_ok');
        $survey->attention_score = $request->post('attention_score');
        $survey->institution_score = $request->post('institution_score');
        $survey->comment = $request->post('comment');
        $survey->save();
        return view('client.survey_done');
    }
}
