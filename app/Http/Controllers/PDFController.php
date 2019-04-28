<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Task;
use App\Category;
use Auth;
use App\Report;
use App\Projname;
use App\Comment;
use DB;
use DOMDocument;
use App\User;
use App\Log;
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
            ['user_id', '=', Auth::user()->id],
            ['report_id', '=', $id]
          ])->get();
          $projnames = Projname::where([
            ['user_id', '=', Auth::user()->id],
            ['report_id', '=', $id]
          ])->get();
   


          $tasks = Task::where([
                ['user_id', '=', Auth::user()->id],
                ['report_id', '=',$id]
            ])->get();
          $total_rating = DB::table('tasks')
                  ->where('report_id',$id)
                  ->groupBy('report_id')
                  ->avg('rating_average');
          $headofoffice = User::where([
            ['type', '=', 'headofoffice'],
            ['status', '=', 'active']
            ])->get()->first();
          /*$forRowSpan = array();*/
        
            foreach ($categories as $category) {
              $counter=0;
              $counterB=0;
              $catToModify= Category::find($category->id);
              foreach ($tasks as $task) {
                if($task->category_id == $category->id){
                  $counter++;


                }
                }
              $tempTasks = Task::where([
                  ['category_id', '=',$category->id]
                  ])->get();
              $arr=array();
              foreach ($tempTasks as $t) {
                  if (in_array($t->projname_id, $arr) == false && $t->projname_id != NULL){
                     array_push($arr, $t->projname_id);
                  }
                }
               /* foreach ($projnames as $projname) {
                 $tempTasks = Task::where([
                  ['category_id', '=',$category->id],
                  ['projname_id', '=', $projname->id]
                  ])->get();


              

                 $counterB = count($unique);
                 $counter = $counter + $counterB;
                }*/
                 

            
          

            $counter = $counter + count($arr);
      /*      $forRowSpan['id'] = $category->id;*/
            $catToModify->rowCount = $counter;
            $catToModify->save();
           /*  foreach ($projnames as $projname) {
                 $tempTasks = Task::where([
                ['projname_id', '=',$projname->id],
                
                ])->get();
                 $counterB = count($tempTasks);
                 $projToModify= Projname::find($projname->id);
                 $projname->rowCount = $counterB;
                 $projname->save();
                 

              }*/
              
          }
          if($report->duration=1){
            $term="1st Sem";

          }
          else{
            $term="2nd Sem";
          }
          $tasks = collect($tasks)->sortBy(['projname_id']);
          $tasks = collect($tasks)->sortBy(['category_id']);
          $comments = Comment::where([
            ['report_id', '=', $id]      
            ])->get();
    	   $data= ['tasks'=> $tasks 
          ];

    	$pdf = PDF::loadView('pdf.employee',compact('tasks', 'report', 'categories', 'total_rating', 'supervisor', 'headofoffice', 'projnames', 'counter', 'comments', 'term'));
      $pdf->getDomPDF()->set_option("enable_php", true);

		return $pdf->setPaper('a4', 'landscape')->stream($term."-".$report->year.".pdf");
    }
}
}
