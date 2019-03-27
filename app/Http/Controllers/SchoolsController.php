<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schools;
use Illuminate\Support\Facades\DB;
use App\Profile;
use App\user;
use Auth;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function school()

    {
         $user_id = Auth::user()->id;
        $profile = DB::table('users')
                   ->join('profiles', 'users.id', '=','profiles.user_id')
                   ->select('users.*', 'profiles.*')
                   ->where(['profiles.user_id'=>$user_id])
                   ->first();
                   if(auth()->user()->id !==1){

                    return redirect('/dashboard')->with('error', 'Unauthorised page');
                   }
        return view('school.school',['profile'=> $profile]);
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
            'school'=> 'required',


                    ]);
                $school= new Schools;
                    $school -> school = $request -> input('school');


                      $school ->save();
                      if(!Gate::allows('isAdmin'))
                      {
                          return redirect('/dashboard')->with('error', 'Unauthorised page');
                      }
                    return redirect('/school') -> with('info', 'school/department/section added successfully!');
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
