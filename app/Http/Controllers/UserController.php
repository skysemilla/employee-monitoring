<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Employee;
use App\Report;
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
           
            return view('admin', compact('users'));
        }
        
        return redirect('home')->with('error','You have not admin access');
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
        }

  
        return redirect('admin/home');
    }

    public function deactivate(Request $request, $id){
     ///echo 'hi';
    if($request->user()->authorizeRoles(['admin'])){
        $user = User::find($id);
        $user->status="inactive";
        $user->save();
        }

  
        return redirect('admin/home');
    }
    public function viewSpecificAccount(Request $request, $id)
    {
      if($request->user()->authorizeRoles(['admin'])){
          
       
       
          $user = User::find($id);
         
          return view('admin.accountview', compact('user'));
      }
        return redirect('home')->with('error','You have not employee access');

        
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
            $totalApprovedReports = Report::where([
                ['user_id', '=', Auth::user()->id],
                ['approved', '=', true]
            ])->get()->count();
            $totalAssessedReports = Report::where([
                ['user_id', '=', Auth::user()->id],
                ['assessed', '=', true]
            ])->get()->count();
            $totalReports = Report::where([
                ['user_id', '=', Auth::user()->id]
            ])->get()->count();
            return view('myprofile', compact('user', 'supervisor', 'headofoffice', 'totalApprovedReports', 'totalReports', 'totalAssessedReports'));
        }
        
        return redirect('home')->with('error','Yo do not have access');
    }

/*    public function getReports(Request $request){
        if($request->user()->authorizeRoles(['admin'])){
            $users = User::all()->toArray();
            foreach ($users as $user) {
                if ($user->type =="permanent"||$user->type =="nonpermanent")
                    $reports =User::find($user->id)->reports;
            }
            

            return view('admin', compact('reports'));
        }
    
    }*/
}