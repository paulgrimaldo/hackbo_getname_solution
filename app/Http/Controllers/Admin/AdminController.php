<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function loadAdmin()
    {
        return view('admin.dashboard');
    }

    public function loadEmpleados()
    {
//        $employees = User::where('role', '=', 'EMPLOYEE')->get();
        return view('admin.employees');
    }

    public function loadEmociones()
    {
        return view('admin.emotions');
    }
}
