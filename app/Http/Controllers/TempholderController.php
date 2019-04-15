<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Task;
use App\Tempholder;

class TempholderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    //
    $temps = Tempholder::all()->toArray();

    return view('employee.home', compact('temps'));
}
 

}
