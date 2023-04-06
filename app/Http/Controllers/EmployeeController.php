<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function dashboard(){
        return view('employees.dashboard');
    }

    public function sale(){
        return view('employees.sale');
    }
}
