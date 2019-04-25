<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
Use Redirect;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = Comment::all()->toArray();

        return view('employee.home', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
 
    public function addComment(Request $request, $id)
        {
          if($request->user()->authorizeRoles(['supervisor', 'headofoffice'])){    
               $comm = new Comment([
                    'comment' => $request->get('comment')
                    
                ]);
                $comm->report_id= $id;
                $comm->save();
                

              
                if($request->user()->authorizeRoles(['supervisor'])){ 
                    return Redirect::to("/supervisor/report/$id");
                }
                elseif ($request->user()->authorizeRoles(['headofoffice'])) {
                    return Redirect::to("/headofoffice/report-for-approval/$id");
                }
          }
            return redirect('home')->with('error','You do not have access.');

            
        }

}
