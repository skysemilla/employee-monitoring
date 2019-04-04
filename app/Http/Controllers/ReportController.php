<?php

namespace App\Http\Controllers;

use App\Report;
use App\User;
use App\Task;
use Auth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $reports = Report::all()->toArray();

        return view('employee.createreport', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   /* protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'functional_unit' => 'string|max:255',
            'status' => 'string|max:255',
            'supervisor_id' => 'integer|max:255',
            'type' => 'required|string|max:50',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
*/    public function store(Request $request)
    {
        //
        $report = new Report([
            'duration' => $request->get('duration'),
            'year' => $request->get('year'),
            'user_id' => $request->get('user_id'),
            'forApproval' => $request->get('forApproval'),
            'Approved' => $request->get('Approved')
        ]);
        $report->user_id = Auth::user()->id;
        $user = User::find($report->user_id);
          
        $user->hasActiveReport =true;

        
        $report->forApproval= false;
        $report->Approved=false;
        $report->supervisor_id = $user->supervisor_id;
        /*$report
           ->users()
           ->attach(User::where('id', $report->user_id)->first());*/
        $report->save();
        $user->latestReportId=$report->id;
        $user->save();
        return redirect('/employee/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
/*    public function update(Request $request, $id)
    {
        //

        //
        $report = Report::find($id);
      

        $report->forApproval=true;
        
        $report->save();
        return redirect('/home');
    
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
        $reports = Report::all()->toArray();

        return view('employee.home', compact('reports'));
    }
    public function update(Request $request, $id){
         ///echo 'hi';
        if($request->user()->authorizeRoles(['permanent', 'nonpermanent'])){
            $report = Report::find($id);
            $report->forApproval=true;
            $report->save();
        }

      ///$latestReport->save();
        return redirect('/home');
    }
     public function indexForSupervisor(Request $request)
    {   
        if($request->user()->authorizeRoles(['supervisor'])){
            $reports = Report::all()->toArray();
            
            $reportsForApproval = Report::where([
                ['forApproval', '=', true],
                ['supervisor_id', '=', Auth::user()->id]
            ])->get();
            $users = User::where("hasActiveReport", true)->get();
          /*  foreach ($reportsForApproval as $report) {
                echo $report->id;
            }*/

            return view('supervisor.home', compact('reportsForApproval', 'users'));
        }
        
        return redirect('home')->with('error','You do not have supervisor access');
       
    }
    public function updateReportApproved(Request $request, $id)
        {
          if($request->user()->authorizeRoles(['supervisor'])){    
                $report = Report::find($id);
                $report->approved=true;
                $report->forApproval=false;


               
               /* $report->start_duration = $request->get('start_duration');
                $report->end_duration = $request->get('end_duration');
                $report->forApproval = $request->get('forApproval');
                $report->Approved = true;*/
                 $report->save();
                
             /* $user_id = $tasks->first()->user_id;*/
           
    /*          echo $user_id;*/
          /*    foreach($tasks as $task)
               echo $task->title;
    */
              /*$user = User::find($user_id);
              $categories = Category::where([
                    ['user_id', '=', $user_id]      
              ])->get();*/
             /// return view('supervisor.approvedview', compact('report'));
              return redirect('/supervisor/home');
          }
            return redirect('home')->with('error','You have not employee access');

            
        }

    public function submitToHeadOffice(Request $request, $id){
     ///echo 'hi';
    if($request->user()->authorizeRoles(['permanent', 'nonpermanent'])){
        $report = Report::find($id);
        $report->forAssessment=true;
        $report->save();
    }

  ///$latestReport->save();
    return redirect('/home');
    }

    public function indexForHeadOffice(Request $request)
    {   
        if($request->user()->authorizeRoles(['headofoffice'])){
            $reports = Report::all()->toArray();
            
            $reportsForAssessment = Report::where([
                ['forAssessment', '=', true]
            ])->get();
            $users = User::where("hasActiveReport", true)->get();
          /*  foreach ($reportsForApproval as $report) {
                echo $report->id;
            }*/

            return view('headofoffice.home', compact('reportsForAssessment', 'users'));
        }
        
        return redirect('home')->with('error','You do not have head of office access');
       
    }

     public function updateReportAssessed(Request $request, $id)
        {
          if($request->user()->authorizeRoles(['headofoffice'])){    
                $report = Report::find($id);
                $report->assessed=true;
                $report->forAssessment=false;


               
               /* $report->start_duration = $request->get('start_duration');
                $report->end_duration = $request->get('end_duration');
                $report->forApproval = $request->get('forApproval');
                $report->Approved = true;*/
                 $report->save();
                
             /* $user_id = $tasks->first()->user_id;*/
           
    /*          echo $user_id;*/
          /*    foreach($tasks as $task)
               echo $task->title;
    */
              /*$user = User::find($user_id);
              $categories = Category::where([
                    ['user_id', '=', $user_id]      
              ])->get();*/
             /// return view('supervisor.approvedview', compact('report'));
              return redirect('/headofoffice/home');
          }
            return redirect('home')->with('error','You have not employee access');

            
        }

}
