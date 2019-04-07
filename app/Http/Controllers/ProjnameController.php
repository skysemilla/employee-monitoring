<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Projname;
class ProjnameController extends Controller
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
        $projnames = Projname::all()->toArray();

        return view('employee.home', compact('projnames'));

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
    if($request->user()->authorizeRoles(['permanent', 'nonpermanent', 'supervisor'])){
        $projname = new Projname([
          'name' => $request->get('name')

         
        ]);
        $projname->report_id = Auth::user()->latestReportId;
        $projname->user_id = Auth::user()->id;
        $projname->save();
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Projname $projname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Projname $projname)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projname $projname)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projname $projname)
    {
        //
    }
}
