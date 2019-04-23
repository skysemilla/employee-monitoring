<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Category;
use Auth;
use App\Report;
use DB;
use App\User;
use App\Projname;
class TaskController extends Controller
{
    //
     public function __construct() {

        $this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    public function index(Request $request)
    {
      if($request->user()->authorizeRoles(['permanent', 'nonpermanent'])){
          $report= Report::find(Auth::user()->latestReportId);

          $categories = Category::where([
            ['user_id', '=', Auth::user()->id],
            ['report_id', '=', Auth::user()->latestReportId]
          ])->get();
          $projnames = Projname::where([
            ['user_id', '=', Auth::user()->id],
            ['report_id', '=', Auth::user()->latestReportId]
          ])->get();
          $tasks = Task::where([
                ['user_id', '=', Auth::user()->id],
                ['report_id', '=', Auth::user()->latestReportId]
                
            ])->get();
          $total_rating = DB::table('tasks')
                  ->where('report_id',Auth::user()->latestReportId)
                  ->groupBy('report_id')
                  ->avg('rating_average');
          $report->total_average = $total_rating;
         
        /* foreach ($sortedTasks as $sortedTask) {
            echo $sortedTask->title;
           echo $sortedTask->category_id;
         }*/
         $report->save();
         $sortedTasks = collect($tasks)->sortBy(['projname_id']);
         $sortedTasks = collect($sortedTasks)->sortBy(['category_id']);
        return view('employee.home', compact('tasks', 'categories','report', 'total_rating', 'projnames', 'sortedTasks'));
       

      } 
        return redirect('home')->with('error','You do not have access!');

        
    }
    public function indexForSupervisor(Request $request)
    {
      if($request->user()->authorizeRoles(['supervisor'])){
          $report= Report::find(Auth::user()->latestReportId);

          $categories = Category::where([
            ['user_id', '=', Auth::user()->id],
            ['report_id', '=', Auth::user()->latestReportId]
          ])->get();
          $projnames = Projname::where([
            ['user_id', '=', Auth::user()->id],
            ['report_id', '=', Auth::user()->latestReportId]
          ])->get();
          $tasks = Task::where([
                ['user_id', '=', Auth::user()->id],
                ['report_id', '=', Auth::user()->latestReportId]
                
            ])->get();
          $total_rating = DB::table('tasks')
                  ->where('report_id',Auth::user()->latestReportId)
                  ->groupBy('report_id')
                  ->avg('rating_average');
          //$categories = Category::all()->toArray();
          //echo $total_rating;
         //$collectionsTasks = collect($tasks);
        $sortedTasks = collect($sortedTasks)->sortBy(['projname_id']);

         $sortedTasks = collect($tasks)->sortBy(['category_id']);
        /* foreach ($sortedTasks as $sortedTask) {
            echo $sortedTask->title;
           echo $sortedTask->category_id;
         }*/
          
        return view('supervisor.ownreport', compact('tasks', 'categories','report', 'total_rating', 'projnames', 'sortedTasks'));

      } 
        return redirect('home')->with('error','You do not have access!');

        
    }
  
    public function create()
    {
        return view('employee.home');
    }

    public function store(Request $request)
    {
      if($request->user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
        $task = new Task([
          'header_id' => $request->get('header_id'),
          'title' => $request->get('title'),
          'projname_id' => $request->get('projname_id'),
          'category_id' => $request->get('category_id'),
          'target_no' => $request->get('target_no'),
          'actual_no' => $request->get('actual_no'),
          'rating_quantity' => $request->get('rating_quantity'),
          'rating_timeliness' => $request->get('rating_timeliness'),
          'rating_effort' => $request->get('rating_effort'),
          'user_id'=>$request->get('user_id'),
          'remarks' => $request->get('remarks')
        ]);
        $task->user_id = Auth::user()->id;
        $latestReport = DB::table('reports')->where('user_id',$task->user_id)->orderBy('created_at', 'desc')->first();
        $task->report_id =Auth::user()->latestReportId;
        $task->rating_average = ($task->rating_quantity + $task->rating_timeliness + $task->rating_effort)/3;

        $task->save();
        if($request->user()->authorizeRoles(['permanent', 'nonpermanent'])){
            return redirect('/employee/home');
        }
        elseif ($request->user()->authorizeRoles(['supervisor'])) {
            return redirect('/supervisor/add-tasks');
        }
    }
  }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
      if(Auth::user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
        $task = Task::find($id);
       
        $cat_id = $task->category_id;
        $category =  Category::find($cat_id);
        if(Auth::user()->type == 'permanent'|| Auth::user()->type == 'nonpermanent'){
          return view('employee.editextension', compact('task','id', 'category'));
        }elseif (Auth::user()->type == 'supervisor'){
          return view('supervisor.editextension', compact('task','id', 'category'));
        }
    }
    }

    public function update(Request $request, $id)
    {
      if($request->user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
          $task = Task::find($id);
          $task->title = $request->get('title');
          $task->target_no = $request->get('target_no');
          $task->actual_no = $request->get('actual_no');
          $task->rating_quantity = $request->get('rating_quantity');
          $task->rating_timeliness = $request->get('rating_timeliness');
          $task->rating_effort = $request->get('rating_effort');
          $task->remarks = $request->get('remarks');
          $task->rating_average = ($task->rating_quantity + $task->rating_timeliness + $task->rating_effort)/3;
          $task->save();
          if($request->user()->authorizeRoles(['permanent', 'nonpermanent'])){
            return redirect('/employee/home');
          }
          elseif ($request->user()->authorizeRoles(['supervisor'])) {
            return redirect('/supervisor/add-tasks');
          }
      }
    }

    public function destroy($id)
    {
 
      if(Auth::user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
        $task = Task::find($id);
      	$task->delete();

          if(Auth::user()->authorizeRoles(['permanent', 'nonpermanent'])){
            return redirect('/employee/home');
          }
          elseif (Auth::user()->authorizeRoles(['supervisor'])) {
            return redirect('/supervisor/add-tasks');
          }
      }
    }

    public function forSupervisorView(Request $request, $id)
    {
      if($request->user()->authorizeRoles(['supervisor'])){
          
          $tasks = Task::where([
                ['report_id', '=', $id]      
          ])->get();
          $report = Report::find($id);
          $user_id = $tasks->first()->user_id;
          $user = User::find($user_id);
          $categories = Category::where([
                ['user_id', '=', $user_id]      
          ])->get();
          $projnames = Projname::where([
            ['user_id', '=', $user_id]
          ])->get();
           $total_rating = DB::table('tasks')
                  ->where('report_id',$report->id)
                  ->groupBy('report_id')
                  ->avg('rating_average');
          $tasks = collect($tasks)->sortBy(['projname_id']);
          $tasks = collect($tasks)->sortBy(['category_id']);
       
        

          return view('supervisor.view', compact('tasks', 'user', 'categories','report', 'total_rating', 'projnames'));
      }
        return redirect('home')->with('error','You have not supervisor access');

        
    }

      public function forHOOView(Request $request, $id)
      {
      if($request->user()->authorizeRoles(['headofoffice'])){
          
          $tasks = Task::where([
                ['report_id', '=', $id]      
          ])->get();
          $report = Report::find($id);
          $user_id = $tasks->first()->user_id;
          $user = User::find($user_id);
          $categories = Category::where([
                ['user_id', '=', $user_id]      
          ])->get();
          $projnames = Projname::where([
            ['user_id', '=', $user_id]
          ])->get();
           $total_rating = DB::table('tasks')
                  ->where('report_id',$report->id)
                  ->groupBy('report_id')
                  ->avg('rating_average');
          $tasks = collect($tasks)->sortBy(['projname_id']);
           $tasks = collect($tasks)->sortBy(['category_id']);
       
         

          return view('headofoffice.view', compact('tasks', 'user', 'categories','report', 'total_rating', 'projnames'));
      }
        return redirect('home')->with('error','You have not employee access');

        
      }

     public function viewOwnSpecificReport(Request $request, $id)
    {
      if($request->user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
          
          $tasks = Task::where([
                ['report_id', '=', $id]      
          ])->get();
          $report = Report::find($id);
     
          $user_id = $tasks->first()->user_id;

          $user = User::find($user_id);
          $categories = Category::where([
                ['user_id', '=', $user_id],
                ['report_id', '=', $id]         
          ])->get();
          $projnames = Projname::where([
            ['user_id', '=',  $user_id],
            ['report_id', '=', $id]
          ])->get();
           $total_rating = DB::table('tasks')
                  ->where('report_id',$report->id)
                  ->groupBy('report_id')
                  ->avg('rating_average');
          $tasks = collect($tasks)->sortBy(['projname_id']);
          $tasks = collect($tasks)->sortBy(['category_id']);
        

          if($request->user()->authorizeRoles(['permanent', 'nonpermanent'])){
            return view('employee.viewownspecificreportextension', compact('tasks','user','categories','report', 'total_rating', 'projnames'));
          }
          elseif ($request->user()->authorizeRoles(['supervisor'])) {
            return view('employee.viewownspecificreportextension', compact('tasks','user','categories','report', 'total_rating','projnames'));
          }
      }
        return redirect('home')->with('error','You do not have access');

    }



}
