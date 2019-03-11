<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        $employees = Employee::all()->toArray();
        
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        $employee = new Employee([
          'functional_unit' => $request->get('functional_unit'),
          'status' => $request->get('status'),
          'type' => $request->get('type'),
          'phone_number' => $request->get('phone_number')
          
          
        ]);

        $employee->save();
        return redirect('/employee');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $employee = Employee::find($id);
        
        return view('employee.edit', compact('employee','id'));
    }

    public function update(Request $request, $id)
    {
        //
        $employee = Employee::find($id);
        $employee->functional_unit = $request->get('functional_unit');
        $employee->status = $request->get('status');
        $employee->type = $request->get('type');
        $employee->phone_number = $request->get('phone_number');
 
        $employee->save();
        return redirect('/employee');
    }

    public function destroy($id)
    {
        //
        $employee = Employee::find($id);
		$employee->delete();

		return redirect('/employee');
    }

}
