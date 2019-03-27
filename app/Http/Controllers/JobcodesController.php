<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobcode;
use Gate;

class JobcodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jobcode()
    {
      if(!Gate::allows('isAdmin'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
        return view('jobcode.jobcode');

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
        $this -> validate($request,[
            'jobcode_name'=> 'required',


                    ]);
                $jobcode= new Jobcode;
                    $jobcode -> jobcode_name = $request -> input('jobcode_name');


                      $jobcode ->save();
                      if(!Gate::allows('isAdmin'))
                      {
                          return redirect('/dashboard')->with('error', 'Unauthorised page');
                      }
                    return redirect('/jobcode') -> with('info', 'jobcode  added successfully!');

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
}
