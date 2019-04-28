<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Task;


class EmployeeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


}
