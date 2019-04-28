<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Employee;
use App\Report;
use App\Log;
class UserController extends Controller {

    /**
     * Returns all classmates
     *
     * @return \Illuminate\View\View
     */
    public function __construct() {
        $this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index(Request $request)
    {   

        if($request->user()->authorizeRoles(['admin'])){
            $users = User::all()->toArray();

            $description = Auth::user()->username.' viewed all accounts';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
           
            return view('admin', compact('users'));
        }
        
        return redirect('home')->with('error','You do not have access.');
    }
    public function viewActiveAccounts(Request $request)
    {   

        if($request->user()->authorizeRoles(['admin'])){
            $users = User::all()->toArray();
            $activeusers = User::where([
                ['status', '=', 'active']
            ])->get();

            $description = Auth::user()->username.' viewed all active accounts';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
            
            return view('admin.activeaccounts', compact('users', 'activeusers'));
        }
        
        return redirect('home')->with('error','You do not have access.');
    }
    public function viewDeactivatedAccounts(Request $request)
    {   

        if($request->user()->authorizeRoles(['admin'])){
            $users = User::all()->toArray();
            $deactivatedusers = User::where([
                ['status', '=', 'inactive']
            ])->get();
            
            $description = Auth::user()->username.' viewed all deactivated accounts';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();

            return view('admin.deactivatedaccounts', compact('users', 'deactivatedusers'));
        }
        
        return redirect('home')->with('error','You do not have access.');
    }

    public function forRegister(Request $request)
    {   
        if($request->user()->authorizeRoles(['admin'])){
            $users = User::all()->toArray();

            return view('auth.register', compact('users'));
        }
       
    }

    public function activate(Request $request, $id){
     ///echo 'hi';
    if($request->user()->authorizeRoles(['admin'])){
        $user = User::find($id);
        $user->status="active";
        $user->save();

        $description = Auth::user()->username.' activated account (id:'.$user->id.', username: '.$user->username.' )';
        $log = new Log([
          'description' => $description
        ]);
        $log->save();
        }
        
  
        return redirect('admin/home');
    }

    public function deactivate(Request $request, $id){
     ///echo 'hi';
    if($request->user()->authorizeRoles(['admin'])){
        $user = User::find($id);
        $user->status="inactive";
        $user->save();

        $description = Auth::user()->username.' deactivated account (id:'.$user->id.', username: '.$user->username.' )';
        $log = new Log([
          'description' => $description
        ]);
        $log->save();
        
        }
        return redirect('admin/home');
    }
    public function viewSpecificAccount(Request $request, $id)
    {
      if($request->user()->authorizeRoles(['admin'])){
        $user = User::find($id);
        $headofoffice = User::where([
            ['type', '=', "headofoffice"],
            ['status', '=', "active"]
            ])->get()->first();
        $supervisor = User::where([
            ['id', '=', $user->supervisor_id]
            ])->get()->first();

        $description = Auth::user()->username.' viewed specific account (id:'.$user->id.', username: '.$user->username.' )';
        $log = new Log([
          'description' => $description
        ]);
        $log->save();
         
        return view('admin.accountview', compact('user', 'headofoffice', 'supervisor'));
      }
        return redirect('home')->with('error','You do not have access.');

        
    }

    public function employeeProfile(Request $request)
    {   

        if($request->user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor', 'headofoffice', 'admin'])){
            $user =  User::find(Auth::user()->id);
            $supervisor = User::where([
                ['id', '=', $user->supervisor_id]
            ])->get()->first();
            $headofoffice = User::where([
                ['type', '=', "headofoffice"],
                ['status', '=', "active"]
            ])->get()->first();
            $totalOwnReports=0;
            $totalOwnApprovedReports=0;
            $totalOwnAssessedReports=0;
            $totalApprovedReports=0;
            $totalAssessedReports=0;

            //insert condition
            if ($user->type == 'permanent' || $user->type == 'nonpermanent' ){
                $totalOwnReports= Report::where([
                    ['user_id', '=', Auth::user()->id]
                    ])->get()->count();
                $totalOwnApprovedReports= Report::where([
                    ['user_id', '=', Auth::user()->id],
                    ['approved', '=', true]
                    ])->get()->count();
                $totalOwnAssessedReports=Report::where([
                    ['user_id', '=', Auth::user()->id],
                    ['approved', '=', true],
                    ['assessed', '=', true]
                    ])->get()->count();
            }
            elseif ($user->type == 'supervisor' ) {
                $totalOwnReports= Report::where([
                    ['user_id', '=', Auth::user()->id]
                    ])->get()->count();;
                $totalOwnApprovedReports=Report::where([
                    ['user_id', '=', Auth::user()->id],
                    ['approved', '=', true]
                    ])->get()->count();
                $totalOwnAssessedReports=Report::where([
                    ['user_id', '=', Auth::user()->id],
                    ['approved', '=', true],
                    ['assessed', '=', true]
                    ])->get()->count();
                $totalApprovedReports=Report::where([
                    ['supervisor_id', '=', Auth::user()->id],
                    ['approved', '=', true]
                    ])->get()->count();
               
            }
            else{
                $totalApprovedReports=Report::where([
                    ['supervisor_id', '=', Auth::user()->id],
                    ['approved', '=', true]
                    ])->get()->count();
                $totalAssessedReports=Report::where([
                    ['assessed', '=', true]
                    ])->get()->count();
            }

            $description = Auth::user()->username.' viewed profile';
            $log = new Log([
                'description' => $description
                ]);
            $log->save();
            return view('myprofile', compact('user', 'supervisor', 'headofoffice', 'totalOwnApprovedReports', 'totalOwnReports', 'totalOwnAssessedReports', 'totalApprovedReports', 'totalAssessedReports'));
        }
        
        return redirect('home')->with('error','Yo do not have access.');
    }
    public function viewEmployee(Request $request, $id)
    {   

        if($request->user()->authorizeRoles(['headofoffice'])){
            $user =  User::find($id);
            $supervisor = User::where([
                ['id', '=', $user->supervisor_id]
            ])->get()->first();
            $headofoffice = User::where([
                ['type', '=', "headofoffice"],
                ['status', '=', "active"]
            ])->get()->first();
            $totalOwnReports=0;
            $totalOwnApprovedReports=0;
            $totalOwnAssessedReports=0;
            $totalApprovedReports=0;
            $totalAssessedReports=0;
            $reports= Report::where([
                    ['user_id', '=', $id],
                    ['assessed', '=', true]
                    ])->get();

            $reports =$reports->sortByDesc(['year']);
            //insert condition
            if ($user->type == 'permanent' || $user->type == 'nonpermanent' ){
                $totalOwnReports= Report::where([
                    ['user_id', '=', $id]
                    ])->get()->count();
                $totalOwnApprovedReports= Report::where([
                    ['user_id', '=', $id],
                    ['approved', '=', true]
                    ])->get()->count();
                $totalOwnAssessedReports=Report::where([
                    ['user_id', '=', $id],
                    ['approved', '=', true],
                    ['assessed', '=', true]
                    ])->get()->count();
            }
            elseif ($user->type == 'supervisor' ) {
                $totalOwnReports= Report::where([
                    ['user_id', '=', $id]
                    ])->get()->count();;
                $totalOwnApprovedReports=Report::where([
                    ['user_id', '=', $id],
                    ['approved', '=', true]
                    ])->get()->count();
                $totalOwnAssessedReports=Report::where([
                    ['user_id', '=', $id],
                    ['approved', '=', true],
                    ['assessed', '=', true]
                    ])->get()->count();
                $totalApprovedReports=Report::where([
                    ['supervisor_id', '=',$id],
                    ['approved', '=', true]
                    ])->get()->count();
               
            }
            else{
                $totalApprovedReports=Report::where([
                    ['supervisor_id', '=', Auth::user()->id],
                    ['approved', '=', true]
                    ])->get()->count();
                $totalAssessedReports=Report::where([
                    ['assessed', '=', true]
                    ])->get()->count();
            }

            $description = Auth::user()->username.' viewed profile (id:'.$user->id.', username: '.$user->username.' )';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
            
            return view('headofoffice.viewemployee', compact('user', 'supervisor', 'headofoffice', 'totalOwnApprovedReports', 'totalOwnReports', 'totalOwnAssessedReports', 'totalApprovedReports', 'totalAssessedReports', 'reports'));
        }
        
        return redirect('home')->with('error','Yo do not have access.');
    }
    public function viewAllPermanentEmployees(Request $request)
    {   

        if($request->user()->authorizeRoles(['headofoffice'])){
            $users = User::all()->toArray();
            $permanentemployees = User::where([
                ['status', '=', 'active'],
                ['type', '!=', 'nonpermanent']
            ])->get();
             
            $description = Auth::user()->username.' viewed all permanent employees';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();
            return view('headofoffice.allpermanent', compact('users', 'permanentemployees'));
        }


        return redirect('home')->with('error','You do not have access.');
    }

    public function viewAllNonpermanentEmployees(Request $request)
    {   

        if($request->user()->authorizeRoles(['headofoffice'])){
            $users = User::all()->toArray();
            $nonpermanentemployees = User::where([
                ['status', '=', 'active'],
                ['type', '=', 'nonpermanent']
            ])->get();
             
            $description = Auth::user()->username.' viewed all permanent employees';
            $log = new Log([
              'description' => $description
            ]);
            $log->save();   
            return view('headofoffice.allnonpermanent', compact('users', 'nonpermanentemployees'));
        }
        
        return redirect('home')->with('error','You do not have access.');
    }
}