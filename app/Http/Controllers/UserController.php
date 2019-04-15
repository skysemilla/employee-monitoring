<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Employee;
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
           
            return view('myprofile', compact('user'));
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