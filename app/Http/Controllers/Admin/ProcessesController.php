<?php

namespace App\Http\Controllers\Admin;

use App\Models\Process;
use App\Models\ProcessService;
use App\Models\Service;
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
        return response()->json(['result' => 'Process ended']);
    }
}
