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
      if($request->user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
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
        if($request->user()->authorizeRoles(['permanent', 'nonpermanent'])){
            return redirect('/employee/home');
        }
        elseif ($request->user()->authorizeRoles(['supervisor'])) {
            return redirect('/supervisor/add-tasks');
        }
    }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
   /* public function destroy(Report $report)
    {
        //
        $reports = Report::all()->toArray();

        return view('employee.home', compact('reports'));
    }*/
    public function update(Request $request, $id){
        if($request->user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
            $report = Report::find($id);
            $report->forApproval=true;
            $report->save();
        }
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
            return view('supervisor.home', compact('reportsForApproval', 'users'));
        }
        
        return redirect('home')->with('error','You do not have supervisor access');
       
    }
    public function updateReportApproved(Request $request, $id)
        {
          if($request->user()->authorizeRoles(['supervisor', 'headofoffice'])){    
                $report = Report::find($id);
                $report->approved=true;
                $report->forApproval=false;
                $report->save();
             
                if($request->user()->authorizeRoles(['supervisor'])){ 
                    return redirect('/supervisor/home');
                }
                elseif ($request->user()->authorizeRoles(['headofoffice'])) {
                    return redirect('/headofoffice/reports-for-approval');
                }
          }
            return redirect('home')->with('error','You do not have access.');

            
        }

    public function submitToHeadOffice(Request $request, $id){
      if($request->user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
          $report = Report::find($id);
          $report->forAssessment=true;
          $report->save();
      }
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
                $user = User::find($report->user_id);
                $user->hasActiveReport= false;
                $user->save();
                $report->save();
      
              return redirect('/headofoffice/home');
          }
            return redirect('home')->with('error','You do not have access.');

            
        }

    public function reportsForApprovalHOO(Request $request)
    {   
        if($request->user()->authorizeRoles(['headofoffice'])){
            $reports = Report::all()->toArray();
            
            $reportsForApproval = Report::where([
                ['forApproval', '=', true],
                ['supervisor_id', '=', Auth::user()->id]

            ])->get();
            $users = User::where("hasActiveReport", true)->get();
       
            return view('headofoffice.reportsforapproval', compact('reportsForApproval', 'users'));
        }
        
        return redirect('home')->with('error','You do not have head of office access');
       
    }


    public function viewAllReports(Request $request)
    {   
        if($request->user()->authorizeRoles(['supervisor', 'permanent', 'nonpermanent'])){
            $reports = Report::where([
                ['assessed', '=', true],
                ['user_id', '=', Auth::user()->id]
            ])->get();
            if($request->user()->authorizeRoles(['supervisor'])){
              return view('supervisor.viewallreports', compact('reports'));
            }elseif($request->user()->authorizeRoles(['permanent', 'nonpermanent'])){
              return view('employee.viewallreports', compact('reports'));
            }
        }
        
        return redirect('home')->with('error','You do not have supervisor access');
       
    }

    public function viewAllApprovedBySupervisor(Request $request)
    {   
        if($request->user()->authorizeRoles(['supervisor'])){
            $reports = Report::where([
                ['supervisor_id', '=', Auth::user()->id],
                ['approved', '=', true]
            ])->get();
            $users = User::all()->toArray();
          
            return view('supervisor.viewallapproved', compact('reports', 'users'));
         
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }
    public function viewAllApprovedByHOO(Request $request)
    {   
        if($request->user()->authorizeRoles(['headofoffice'])){
            $reports = Report::where([
                ['supervisor_id', '=', Auth::user()->id],
                ['approved', '=', true]
            ])->get();
            $users = User::all()->toArray();
              return view('headofoffice.viewallapproved', compact('reports','users'));
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }
    public function viewAllAssessed(Request $request)
    {   
        if($request->user()->authorizeRoles(['headofoffice'])){
            $reports = Report::where([
                ['assessed', '=', true],
                ['supervisor_id', '=', Auth::user()->id],
                ['approved', '=', true]
            ])->get();
            $users = User::all()->toArray();
            return view('headofoffice.viewallassessed', compact('reports','users'));
            
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }

}
