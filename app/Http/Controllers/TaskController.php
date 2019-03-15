<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::all()->toArray();
        
        return view('employee.viewreport', compact('tasks'));
    }

    public function create()
    {
        return view('employee.viewreport');
    }

    public function store(Request $request)
    {
        $task = new Task([
          'title' => $request->get('title'),
          'category' => $request->get('category'),
          'target_no' => $request->get('target_no'),
          'actual_no' => $request->get('actual_no'),
          'rating_quantity' => $request->get('rating_quantity'),
          'rating_timeliness' => $request->get('rating_timeliness'),
          'rating_effort' => $request->get('rating_effort'),
          'remarks' => $request->get('remarks')
        ]);

        $task->save();
        return redirect('/employee/home');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $task = Task::find($id);
        
        return view('employee.viewreport', compact('task','id'));
    }

    public function update(Request $request, $id)
    {
        //
        $task = Task::find($id);
        $task->title = $request->get('title');
        $task->category = $request->get('category');
       	$task->target_no = $request->get('target_no');
       	$task->actual_no = $request->get('actual_no');
       	$task->rating_quantity = $request->get('rating_quantity');
       	$task->rating_timeliness = $request->get('rating_timeliness');
       	$task->rating_effort = $request->get('rating_effort');
       	$task->remarks = $request->get('remarks');

        $task->save();
        return redirect('/employee/home');
    }

    public function destroy($id)
    {
        //
        $task = Task::find($id);
      	$task->delete();

      return redirect('/employee/home');
    }
}
