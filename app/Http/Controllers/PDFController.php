<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Task;
use App\Category;
use Auth;
use App\Report;
use DB;
use App\User;
class PDFController extends Controller
{
    //
    public function make(Request $request, $id ){

    	//put auth
    	if($request->user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
          $report= Report::find($id);
          $user = User::find(Auth::user()->id);
          $supervisor_id = $user->supervisor_id;
          $supervisor = User::find($supervisor_id);
          $categories = Category::where([
            ['user_id', '=', Auth::user()->id]
          ])->get();
          $tasks = Task::where([
                ['user_id', '=', Auth::user()->id],
                ['report_id', '=',$id]
                
            ])->get();
          $total_rating = DB::table('tasks')
                  ->where('report_id',$id)
                  ->groupBy('report_id')
                  ->avg('rating_average');
          //$categories = Category::all()->toArray();
          //echo $total_rating;
          ////return view('employee.home', compact('tasks', 'categories','report', 'total_rating'));
    	   $data= ['tasks'=> $tasks 
          ];
    	$pdf = PDF::loadView('pdf.employee',compact('tasks', 'report', 'categories', 'total_rating', 'supervisor'));
		return $pdf->setPaper('a4', 'landscape')->stream('sample.pdf');
    }
}
}
