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
            /*$reports =User::find(3)->reports;

            foreach ($reports as $report) {
                echo $report->start_duration;
            }*/
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