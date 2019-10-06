<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessesController extends Controller
{
    public function generateProcess(Request $request)
    {
        return response()->json(['processId' => 1]);
    }

    public function initiateProcess(Request $request)
    {
        //TODO check if user does not have surveys pending
    }

    public function endProcess(Request $request)
    {

    }
}
