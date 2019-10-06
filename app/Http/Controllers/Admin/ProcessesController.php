<?php

namespace App\Http\Controllers\Admin;

use App\Models\Process;
use App\Models\ProcessService;
use App\Models\Service;
use App\Models\SoundAnalysis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessesController extends Controller
{
    public function generateProcess(Request $request)
    {
        $ticketCode = $request->post('ticketCode', null);
        $clientId = $request->post('clientId');
        $employeeId = $request->post('employeeId');
        $service = Service::findOrFail($request->post('serviceId'));

        $process = new Process();
        $process->has_survey = false;
        $process->employee_id = $employeeId;
        $process->client_id = $clientId;
        $process->ticket_timestamp = Carbon::now()->toDateTimeString();
        $process->ticket_code = $ticketCode;
        $process->save();

        $processService = new ProcessService();
        $processService->process_id = $process->id;
        $processService->service_id = $service->id;
        $processService->save();


        return response()->json(['result' => 'ok', 'code' => $process->id]);
    }

    public function initProcess(Request $request)
    {
        //TODO check if user does not have surveys pending
        $process = Process::findOrFail($request->post('processId'));
        $process->process_init_timestamp = Carbon::now()->toDateTimeString();
        $process->save();
        return response()->json(['result' => 'Process initiated']);
    }

    public function endProcess(Request $request)
    {

        $process = Process::findOrFail($request->post('processId'));
        $process->proces_end_timestamp = Carbon::now()->toDateTimeString();
        $process->save();

        $base64Audio = base64_encode(file_get_contents($request->file('converesation_sound')));


        $data = array(
            "encoding" => "MP3",
            "sampleRate" => 8000,
            "languageCode" => "es-BO",
            "content" => $base64Audio
        );
        $data_string = json_encode($data);

        $curl = curl_init("https://proxy.api.deepaffects.com/audio/generic/api/v2/sync/recognise_emotion?apikey=rd18U0jONkmlZt0zR33gSE6PJevEWGJ7");

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);

        $result = curl_exec($curl);

        $jsonEmotionResults = json_decode($result, true);


        foreach ($jsonEmotionResults as $jsonResult) {
            $soundAnalysis = new SoundAnalysis();
            $soundAnalysis->process_id = $process->id;
            $soundAnalysis->start = $jsonResult['start'];
            $soundAnalysis->end = $jsonResult['end'];
            $soundAnalysis->emotion = $jsonResult['emotion'];
            $soundAnalysis->save();
        }

        return response()->json(['result' => 'Process ended successfully']);
    }
}
