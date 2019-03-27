<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
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
    public function show($s_id){
        $schools = Schools::all();
        $posts =DB::table('statuses')
        ->join('posts','posts.post_id','=','statuses.post_id')
        ->join('personals','personals.applicant_id','=','statuses.applicant_id')
        ->join('qualifications','qualifications.qualification_id','=','statuses.applicant_id')
        ->join('users','users.id','=','personals.user_id')
        ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
        ->join('schools','schools.school_id','=','jobcodes.school_id')
        ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
        ->join('grades','grades.grade_id','=','posts.grade_id')
        ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*','qualifications.*')
                ->where(['schools.school_id' => $s_id])
                ->get();
                if(auth()->user()->id !==1){
    
                    return redirect('/dashboard')->with('error', 'Unauthorised page');
                   }
        return view('Candidates.applicants',['schools'=>$schools,'posts'=>$posts]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
    }
    public function getDownload($s_id)
    {  $schools = Schools::all();
       
        
        $qualifications =DB::table('statuses')
        ->join('posts','posts.post_id','=','statuses.post_id')
        ->join('personals','personals.applicant_id','=','statuses.applicant_id')
        ->join('qualifications','qualifications.qualification_id','=','statuses.applicant_id')
        ->join('users','users.id','=','personals.user_id')
        ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
        ->join('schools','schools.school_id','=','jobcodes.school_id')
        ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
        ->join('grades','grades.grade_id','=','posts.grade_id')
        ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*','qualifications.*')
                ->where(['schools.school_id' => $s_id])
                ->get();
        return view('files.qualification',compact('qualifications','schools'));
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
