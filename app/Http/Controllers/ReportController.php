<?php

namespace App\Http\Controllers;

use App\Report;
use App\User;
use App\Task;
use App\Projname;
use App\Category;
use App\Tempholder;
use App\Log;
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

        $report->disapproved =false;
        $report->disapprovedWComment=false;
        $report->forApproval= false;
        $report->Approved=false;
        $report->supervisor_id = $user->supervisor_id;
        $report->save();
        $user->latestReportId=$report->id;
        $user->save();
        if($report->duration=1){
          $term="1st Sem";

        }
        else{
          $term="2nd Sem";
        }
        $description = Auth::user()->username.' created report (id: '.$report->id.', duration: '.$term.', year: '.$report->year.')';
        $log = new Log([
          'description' => $description
        ]);
        $log->save();
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
            $report->disapproved=false;
            $report->save();

            if($report->duration=1){
              $term="1st Sem";
            }
            else{
              $term="2nd Sem";
            }
            $description = Auth::user()->username.' submitted report (id: '.$report->id.', duration: '.$term.', year: '.$report->year.') to supervisor for approval';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
            return redirect('/home');

        }
        return redirect('home')->with('error','You do not have access.');
    }
     public function indexForSupervisor(Request $request)
    {   
        if($request->user()->authorizeRoles(['supervisor'])){
            $reportsForApproval = Report::where([
                ['forApproval', '=', true],
                ['supervisor_id', '=', Auth::user()->id]
            ])->get();
            $users = User::where("hasActiveReport", true)->get();
            $reportsForApproval= $reportsForApproval->sortBy(['updated_at']);
            $description = Auth::user()->username.' viewed all reports for approval';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
            return view('supervisor.home', compact('reportsForApproval', 'users'));
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }
    public function updateReportApproved(Request $request, $id)
        {
          if($request->user()->authorizeRoles(['supervisor', 'headofoffice'])){    
                $report = Report::find($id);
                $report->approved=true;
                $report->forApproval=false;
                $report->disapproved =false;
                $report->save();
                
                if($report->duration=1){
                  $term="1st Sem";
                }
                else{
                  $term="2nd Sem";
                }
                $description = Auth::user()->username.' approved report (id: '.$report->id.', duration: '.$term.', year: '.$report->year.')';
                $log = new Log([
                  'description' => $description
                ]);
                $log->save();

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
          $report->disapproved=false;
          $report->save();

          if($report->duration=1){
            $term="1st Sem";
          }
          else{
            $term="2nd Sem";
          }
          $description = Auth::user()->username.' submitted report (id: '.$report->id.', duration: '.$term.', year: '.$report->year.') for final assessment';
          $log = new Log([
            'description' => $description
          ]);
          $log->save();
          return redirect('/home');

      }
      return redirect('home')->with('error','You do not have access.');
      }

    public function indexForHeadOffice(Request $request)
    {   
        if($request->user()->authorizeRoles(['headofoffice'])){
            $reports = Report::all()->toArray();
            
            $reportsForAssessment = Report::where([
                ['forAssessment', '=', true]
            ])->get();
            $users = User::where("hasActiveReport", true)->get();
            $reportsForAssessment= $reportsForAssessment->sortBy(['updated_at']);
            $description = Auth::user()->username.' viewed all reports for assessment';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
            return view('headofoffice.home', compact('reportsForAssessment', 'users'));
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }

     public function updateReportAssessed(Request $request, $id)
        {
          if($request->user()->authorizeRoles(['headofoffice'])){    
                $report = Report::find($id);
                $report->assessed=true;
                $report->disapproved=false;
                $report->forAssessment=false;
                $user = User::find($report->user_id);
                $user->hasActiveReport= false;
                $user->save();
                $report->save();

                if($report->duration=1){
                  $term="1st Sem";
                }
                else{
                  $term="2nd Sem";
                }
                $description = Auth::user()->username.' approved report (id: '.$report->id.', duration: '.$term.', year: '.$report->year.') for final assessment';
                $log = new Log([
                  'description' => $description
                ]);
                $log->save();

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
            $reportsForApproval= $reportsForApproval->sortBy(['updated_at']);
            $description = Auth::user()->username.' viewed all reports for approval';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
            return view('headofoffice.reportsforapproval', compact('reportsForApproval', 'users'));
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }


    public function viewAllReports(Request $request)
    {   
        if($request->user()->authorizeRoles(['supervisor', 'permanent', 'nonpermanent'])){
            $reports = Report::where([
                ['assessed', '=', true],
                ['user_id', '=', Auth::user()->id]
            ])->get();
            $reports= $reports->sortByDesc(['year']);
            $description = Auth::user()->username.' viewed all previous reports';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
            if($request->user()->authorizeRoles(['supervisor'])){
              return view('supervisor.viewallreports', compact('reports'));
            }elseif($request->user()->authorizeRoles(['permanent', 'nonpermanent'])){
              return view('employee.viewallreports', compact('reports'));
            }
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }

    public function viewAllApprovedBySupervisor(Request $request)
    {   
        if($request->user()->authorizeRoles(['supervisor'])){
            $reports = Report::where([
                ['supervisor_id', '=', Auth::user()->id],
                ['approved', '=', true]
            ])->get();
            $users = User::all()->toArray();
            $description = Auth::user()->username.' viewed all approved reports as supervisor';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
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
            $description = Auth::user()->username.' viewed all approved reports as head of office';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
              return view('headofoffice.viewallapproved', compact('reports','users'));
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }
    public function viewAllAssessed(Request $request)
    {   
        if($request->user()->authorizeRoles(['headofoffice'])){
            $reports = Report::where([
                ['assessed', '=', true],
                ['approved', '=', true]
            ])->get();
            $users = User::all()->toArray();
            $description = Auth::user()->username.' viewed assessed reports';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
            return view('headofoffice.viewallassessed', compact('reports','users'));
            
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }
    public function showNonpermanentRanking(Request $request)
    {   
        if($request->user()->authorizeRoles(['headofoffice'])){
            $reports = Report::where([
                ['assessed', '=', true],
                ['approved', '=', true]
            ])->get();
                  $users = User::all()->toArray();
            $years = Report::distinct()->get(['year']);
            $sm = 0;
            $yr =0;
         
            /*$description = Auth::user()->username.' viewed ranking for non-permanent employees';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();*/
            return view('headofoffice.nonpermanentranking', compact('reports','users', 'years', 'yr', 'sm'));
            
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }

    public function filterNonpermanentRanking(Request $request, $sem_id, $year)
    {   
        if($request->user()->authorizeRoles(['headofoffice'])){
            $reports = Report::where([
                ['duration', '=', $sem_id],
                ['year', '=', $year],
                ['assessed', '=', true],
                ['approved', '=', true]
            ])->get();
           
            $users = User::where([
                ['type', '=', 'nonpermanent']
            ])->orderBy('name')->get();
            $tempCollection2 = collect();
            foreach ($users as $user) {
              foreach ($reports as $report) {
                if( $user->id == $report->user_id){
                   $tempCollection2->push($report);
                }

              }
             
            }
            $sm = $sem_id;
            $yr = $year;
            $tempCollection = collect();
            foreach ($tempCollection2 as $report) {
                $user =User::where([
                ['id', '=', $report->user_id]
                ])->get()->first();
                if ($user->type == 'nonpermanent'){

                  $tempCollection->push($report);
                }
            }
            $years = Report::distinct()->get(['year']);


            $tempCollection = collect($tempCollection)->sortByDesc(['total_average']);
            if($sem_id=1){
              $term="1st Sem";
            }
            else{
              $term="2nd Sem";
            }

            $description = Auth::user()->username.' viewed ranking for non-permanent employees for '.$term.', '.$year;
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
            return view('headofoffice.nonpermanentranking', compact('users', 'years','yr', 'sm', 'tempCollection'));
            
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }

      public function showPermanentRanking(Request $request)
    {   
        if($request->user()->authorizeRoles(['headofoffice'])){
            $reports = Report::where([
                ['assessed', '=', true],
                ['approved', '=', true]
            ])->get();
            $users = User::all()->toArray();
            
            $years = Report::distinct()->get(['year']);
            $sm = 0;
            $yr =0;
            /*$description = Auth::user()->username.' viewed ranking for permanent employees';
              $log = new Log([
                'description' => $description
              ]);
              $log->save();*/
            return view('headofoffice.permanentranking', compact('reports','users', 'years', 'yr', 'sm'));
            
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }

    public function filterPermanentRanking(Request $request, $sem_id, $year)
    {   
        if($request->user()->authorizeRoles(['headofoffice'])){
            $reports = Report::where([
                ['duration', '=', $sem_id],
                ['year', '=', $year],
                ['assessed', '=', true],
                ['approved', '=', true]
            ])->get();
         
            $users = User::where([
                ['type', '!=', 'nonpermanent']
            ])->orderBy('name')->get();
            $tempCollection2 = collect();
            foreach ($users as $user) {
              foreach ($reports as $report) {
                if( $user->id == $report->user_id){
                   $tempCollection2->push($report);
                }

              }
             
            }
            $sm = $sem_id;
            $yr = $year;
            $tempCollection = collect();
            foreach ($tempCollection2 as $report) {

                $user =User::where([
                ['id', '=', $report->user_id]
                ])->get()->first();
                if ($user->type == 'permanent'||$user->type == 'supervisor'){

                  $tempCollection->push($report);
                }
            }
            $years = Report::distinct()->get(['year']);
            $tempCollection = collect($tempCollection)->sortByDesc(['total_average']);

            if($sem_id=1){
              $term="1st Sem";
            }
            else{
              $term="2nd Sem";
            }
            $description = Auth::user()->username.' viewed ranking for permanent employees for '.$term.', '.$year;
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
            return view('headofoffice.permanentranking', compact('users', 'years','yr', 'sm', 'tempCollection'));
            
        }
        
        return redirect('home')->with('error','You do not have access.');
       
    }
    public function template(Request $request,$id)
    {
      if($request->user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
      
        $report_id = $id;
        return view('employee.templatereport', compact('report_id'));
        
    }
  }
     public function storeTemplate(Request $request, $id)
    {
      if($request->user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
        $report = new Report([
            'duration' => $request->get('duration'),
            'year' => $request->get('year')
        ]);

        $report->user_id = Auth::user()->id;
        $user = User::find($report->user_id);
        $report->oldreport_id = $id;
        $user->hasActiveReport =true;
        
        $report->forApproval= false;
        $report->forAssessment=false;
        $report->approved=false;
        $report->assessed= false;
        $report->supervisor_id = $user->supervisor_id;
       
        $report->save();
        $retrievedTasks = Task::where([
                ['report_id', '=', $id]
            ])->get();

    
        
        foreach ($retrievedTasks as $task1) {
            $tempTask = new Task([
            'header_id' => $task1->header_id,
            'title' => $task1->title,
            'target_no' => $task1->target_no
          ]);

            $tempholders = Tempholder::where([
                ['oldcat_id', '=', $task1->category_id]
            ])->get()->first();
            if(empty($tempholders)){ //kapag wala pa sa collection
              
              $retrievedCategory = Category::where([
                ['id', '=', $task1->category_id]
              ])->first();
              $newCat= new Category([
                'name' => $retrievedCategory->name,
               
              ]);
              $newCat->user_id = Auth::user()->id;
              $newCat->report_id = $report->id;
              $newCat->save();
              $addTempholder = new Tempholder([
                'oldcat_id' => $task1->category_id,
                'newcat_id' => $newCat->id
              ]);
              $addTempholder->save();
              $tempTask->category_id= $newCat->id;  
              }
             
            else{
              $tempTask->category_id = $tempholders->newcat_id;
            }

            //for projname
            $tempholders2 = Tempholder::where([
                ['oldprojname_id', '=', $task1->projname_id]
            ])->get()->first();
            if(empty($tempholders2)){ 
              $retrievedProjname = Projname::where([
                ['id', '=', $task1->projname_id]
              ])->first();
              $newProj= new Projname([
                'name' => $retrievedProjname->name
               
              ]);
              $newProj->user_id = Auth::user()->id;
              $newProj->report_id = $report->id;
              $newProj->save();
              $addTempholder2 = new Tempholder([
                'oldprojname_id' => $task1->projname_id,
                'newprojname_id' => $newProj->id
              ]);
              $addTempholder2->save();
              $tempTask->projname_id= $newProj->id; 
              }
            else{
              $tempTask->projname_id = $tempholders2->newprojname_id;
            }
            $tempTask->rating_average = ($tempTask->rating_quantity + $tempTask->rating_timeliness + $tempTask->rating_effort)/3;
            $tempTask->user_id = Auth::user()->id;
            $tempTask->report_id = $report->id;
            $tempTask->save();
        }
     
        $user->latestReportId=$report->id;
        $user->save();

        $description = Auth::user()->username.' used report '.$id.' for template';
        $log = new Log([
          'description' => $description
        ]);
        $log->save();
        if($request->user()->authorizeRoles(['permanent', 'nonpermanent'])){
            return redirect('/employee/home');
        }
        elseif ($request->user()->authorizeRoles(['supervisor'])) {
            return redirect('/supervisor/add-tasks');
        }
    }
  }

      public function updateReportDisapproved(Request $request, $id)
        {
          if($request->user()->authorizeRoles(['supervisor', 'headofoffice'])){    
                $report = Report::find($id);
               
                $report->disapproved=true;
                $report->forApproval=false;
                $report->save();
                
                if($report->duration=1){
                  $term="1st Sem";
                }
                else{
                  $term="2nd Sem";
                }
                $description = Auth::user()->username.' disapproved report (id: '.$report->id.', duration: '.$term.', year: '.$report->year.')';
                $log = new Log([
                  'description' => $description
                ]);
                $log->save();

                if($request->user()->authorizeRoles(['supervisor'])){ 
                    return redirect('/supervisor/home');
                }
                elseif ($request->user()->authorizeRoles(['headofoffice'])) {
                    return redirect('/headofoffice/reports-for-approval');
                }
          }
            return redirect('home')->with('error','You do not have access.');

            
        }


      public function updateReportDiapproveAssessment(Request $request, $id)
        {
          if($request->user()->authorizeRoles(['headofoffice'])){    
                $report = Report::find($id);
                $report->disapproved=true;
                $report->forAssessment=false;
                /*$user = User::find($report->user_id);
                $user->hasActiveReport= false;
                $user->save();*/
                $report->save();
                if($report->duration=1){
                  $term="1st Sem";
                }
                else{
                  $term="2nd Sem";
                }
                $description = Auth::user()->username.' disapproved report (id: '.$report->id.', duration: '.$term.', year: '.$report->year.') for final assessment';
                $log = new Log([
                  'description' => $description
                ]);
                $log->save();
      
              return redirect('/headofoffice/home');
          }
            return redirect('home')->with('error','You do not have access.');

            
        }


}
