<?php

namespace App\Http\Controllers\Client;

use App\Models\EmailTemplate;
use App\Models\IncentiveMessage;
use App\Models\Process;
use App\Models\Survey;
use App\Models\User;
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
        $messageFromScore = $this->getMessageFromScore($request->post('attention_score'));
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


        $user = User::find($process->client_id);

        $data = [
            'name' => $user->name,
            'scoreMessage' => $messageFromScore
        ];

        \Mail::send('emails.survey_filled', $data, function ($message) use ($user) {

            $message->from('team.getName@getname.com', 'Team GetName Leader');

            $message->to($user->email)->subject('Atencion de servicio al cliente Banco Team.GetName();');

        });


        return view('client.survey_done');
    }


    private function getMessageFromScore($score)
    {
        $template = EmailTemplate::where('score', '=', $score)->first()->mail_body;
        $incentives = IncentiveMessage::all();
        $incentiveMessage = null;
        foreach ($incentives as $incentive) {
            $incentiveMessage = $incentiveMessage . " " . $incentive->message . "<br>";
        }
        $incentiveMessage = str_replace(":priv", $incentiveMessage, $template);
        return $incentiveMessage;
    }
}
