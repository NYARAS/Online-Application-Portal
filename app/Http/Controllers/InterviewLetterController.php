<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Schools;
use App\Jobcode;
use App\Post;
use App\Profile;
use App\Like;
use App\Dislike;
use App\Comments;
use App\user;
use App\Publication;
use App\Personal;
use App\Grade;
use DB;
use Auth;
use Gate;
use App\Mail\InterviewLetter;

class InterviewLetterController extends Controller
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
    public function sendLetter(Request $request)

    {
    if(!empty($request['id']))
{
    foreach ($request['id'] as $key => $id) {
        $user = User::find($id);
        Mail::to($user->email)->send(new InterviewLetter($user)) ;
    }
    return back() -> with('info', 'email sent successfully!');
}else{
    return back()-> with('error', 'You have select one');
}



    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSendMail()
    {
      if(!Gate::allows('isAdmin'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
        $schools = Schools::all();
        $jobcode = Jobcode::all();
        $posts = Post::all();
        $grades = Grade::all();
      $users = DB::table('statuses')
      ->join('posts','posts.post_id','=','statuses.post_id')
      ->join('personals','personals.applicant_id','=','statuses.applicant_id')
      ->join('users','users.id','=','personals.user_id')
      ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
      ->join('schools','schools.school_id','=','jobcodes.school_id')
      ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
      ->join('grades','grades.grade_id','=','posts.grade_id')
      ->select(DB::raw('personals.applicant_id,
      CONCAT(personals.first_name, " ",personals.second_name, " ",personals.last_name)as name,
      (CASE WHEN personals.status = 0 THEN "single" ELSE "married" END) as marital_status,
      personals.dob,
      personals.applicant_photo,
      personals.primary_phone_number,
      personals.secondary_phone_number,
      personals.country,
      personals.province,
      personals.current_address,
      personals.date_applied,
      personals.qualified_candidate,
      CONCAT(schools.school, " / " , jobcodes.jobcode_name, " / ",
      jobtitles.job_title, " / ",grades.grade) as vacancy,
      CONCAT(users.gender) as gender,
      CONCAT(users.email) as email


      '))



      ->get();


        return view('Applicants.list',compact('users','schools'));
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
}
