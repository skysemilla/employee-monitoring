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
          //$categories = Category::all()->toArray();
          //echo $total_rating;
         //$collectionsTasks = collect($tasks);
         $sortedTasks = collect($tasks)->sortBy(['category_id']);
        /* foreach ($sortedTasks as $sortedTask) {
            echo $sortedTask->title;
           echo $sortedTask->category_id;
         }*/
         $sortedTasks = collect($sortedTasks)->sortBy(['projname_id']);

          return view('employee.home', compact('tasks', 'categories','report', 'total_rating', 'projnames', 'sortedTasks'));
      }
        return redirect('home')->with('error','You have not employee access');

        
    }
    
    /* public function getCategories()
    {   

        $instructors="";
        $instituitions="";

        $compactData=array('students', 'instructors', 'instituitions');
        $data=array('students'=>$students, 'instructors'=>$instructors, 'instituitions'=>$instituitions);

        return View::make("user/regprofile", compact($compactData));
        return View::make("user/regprofile")->with($data);
    }
*/
    public function create()
    {
        return view('employee.home');
    }

    public function store(Request $request)
    {
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
         /* 'rating_average' =>$request->get('rating_average'),*/
          'user_id'=>$request->get('user_id'),
          'remarks' => $request->get('remarks')
        ]);
        /*$task->rating_average=DB::table('tasks')->sum('rating_quantity', 'rating_timeliness','rating_effort');*/
        //$task->rating_average= Task::sum('rating_quantity', 'rating_timeliness', 'rating_effort');
        $task->user_id = Auth::user()->id;
        /*$totalReports =  DB::table('reports')->count();
        $totalReportsForUser =0;
        $reports = DB::select('SELECT * FROM posts');
        for($i = 1;$i<=$totalReports;$i++){
            if($reports)

        }*/
      /*  $task->projname_id=1;*/
        $latestReport = DB::table('reports')->where('user_id',$task->user_id)->orderBy('created_at', 'desc')->first();
        //$repArray = DB::select('select * from reports where user_id = :user_id', ['user_id' => $task->user_id]);
        //$counter = count($latestReport);
        //$temp = $latestReport[$counter];
        ///$latest = Report::find($temp['id']);
        ///$reportCount = count($repArray);
        //$tempId = $reports[$reportCount]->id;
        ///$latestReport =end($reports);
        
        $task->report_id =Auth::user()->latestReportId;
        $task->rating_average = ($task->rating_quantity + $task->rating_timeliness + $task->rating_effort)/3;

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
       
        $cat_id = $task->category_id;
        $category =  Category::find($cat_id);
        
        return view('employee.editextension', compact('task','id', 'category'));
    }

    public function update(Request $request, $id)
    {
        //
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
        return redirect('/employee/home');
    }

    public function destroy($id)
    {
        //
        $task = Task::find($id);
      	$task->delete();

      return redirect('/employee/home');
    }
/*    public function checkReportExist(Request $request){
      $reports = Report::all()->toArray();

        return view('employee.home', compact('reports'));
    }*/
    public function forSupervisorView(Request $request, $id)
    {
      if($request->user()->authorizeRoles(['supervisor', 'headofoffice'])){
          
          $tasks = Task::where([
                ['report_id', '=', $id]      
          ])->get();
          $report = Report::find($id);
     
          $user_id = $tasks->first()->user_id;
       
/*          echo $user_id;*/
      /*    foreach($tasks as $task)
           echo $task->title;
*/        //echo $report->id;
          $user = User::find($user_id);
          $categories = Category::where([
                ['user_id', '=', $user_id]      
          ])->get();
           $total_rating = DB::table('tasks')
                  ->where('report_id',$report->id)
                  ->groupBy('report_id')
                  ->avg('rating_average');

          return view('supervisor.view', compact('tasks', 'user', 'categories','report', 'total_rating'));
      }
        return redirect('home')->with('error','You have not employee access');

        
    }

    



}
