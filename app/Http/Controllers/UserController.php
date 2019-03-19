<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller {

    /**
     * Returns all classmates
     *
     * @return \Illuminate\View\View
     */
    public function __construct() {
        $this->middleware(['auth', 'admin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index()
    {   

        $users = User::all()->toArray();
        
        return view('admin', compact('users'));
    }
}