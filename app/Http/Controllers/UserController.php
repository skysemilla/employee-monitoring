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

}