<?php

namespace App\Http\Controllers;

use App\Report;
use App\User;
use App\Task;
use Auth;
use Illuminate\Http\Request;
use DB;
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
    public function store(Request $request)
    {
        //
        $report = new Report([
            'start_duration' => $request->get('start_duration'),
            'end_duration' => $request->get('end_duration'),
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
         echo 'hi';
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
}
