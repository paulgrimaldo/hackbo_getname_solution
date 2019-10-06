<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessesController extends Controller
{
    public function listMyProcesses(){
        $user = auth()->user();
    }
}
