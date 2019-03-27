<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
use App\Jobtitle;
use App\Status;
use Auth;
use Gate;

class CandidateController extends Controller
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
      if(!Gate::allows('isAdmin'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
        $users = User::all();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
          $user_id = Auth::user()->id;
        $profile = DB::table('users')
                   ->join('profiles', 'users.id', '=','profiles.user_id')
                   ->select('users.*', 'profiles.*')
                   ->where(['profiles.user_id'=>$user_id])
                   ->first();

                   $posts = Post::paginate(1);
                   $jobcodes = Jobcode::all();
                   $schools = Schools::all();
                   $users = User::all();

                   $personals =Personal::all();
                   $personals =DB::table('statuses')
                   ->join('posts','posts.post_id','=','statuses.post_id')
                   ->join('personals','personals.applicant_id','=','statuses.applicant_id')
                   ->join('users','users.id','=','personals.user_id')
                   ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
                   ->join('schools','schools.school_id','=','jobcodes.school_id')
                   ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
                   ->join('grades','grades.grade_id','=','posts.grade_id')
                   ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*')

                   ->get();


  return view('Candidates.candidates',['profile'=> $profile,'personals'=> $personals,'schools'=>$schools,'users'=>$users,'posts' => $posts,'jobcodes'=>$jobcodes]);
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
      if(!Gate::allows('isAdmin'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
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

        return view('Candidates.applicants',['schools'=>$schools,'posts'=>$posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editcandidate($id)
    {

        $personals = Status::join('posts','posts.post_id','=','statuses.post_id')
                  ->join('personals','personals.applicant_id','=','statuses.applicant_id')
                  ->join('users','users.id','=','personals.user_id')
                  ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
                  ->join('schools','schools.school_id','=','jobcodes.school_id')
                  ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
                  ->join('grades','grades.grade_id','=','posts.grade_id')->find($id);

        //check for the correct user

        $schools = Schools::all();
        $jobcode = Jobcode::all();
        $post = Post::all();

        $user_id = Auth::user()->id;
        $profile = DB::table('users')
                   ->join('profiles', 'users.id', '=','profiles.user_id')
                   ->select('users.*', 'profiles.*')
                   ->where(['profiles.user_id'=>$user_id])
                   ->first();
                   $posts = Post::find($personals->post_id);
                   $jobcodes = Jobcode::find($personals->jobcode_id);



        return view ('Candidates.editcandidates',['profile'=> $profile,'post'=> $post,'posts'=> $posts,'schools'=> $schools,'jobcode'=> $jobcode,'jobcodes'=> $jobcodes,'personals'=> $personals]);

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
        $this -> validate($request,[
            'qualified_candidate'=> 'required',





                    ]);
                    if($request->hasFile('photo_image')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('photo_image')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('photo_image')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('photo_image')->storeAs('public/photo_image',$fileNameToStore);




                    }
                    if($request->hasFile('cover_letter')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('cover_letter')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('cover_letter')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('cover_letter')->storeAs('public/photo_image',$fileNameToStore);




                    }
                    if($request->hasFile('curriculum_vitae')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('curriculum_vitae')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('curriculum_vitae')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('curriculum_vitae')->storeAs('public/curriculum_vitae',$fileNameToStore);




                    }
                     $personal = Personal::find($id);
                     $personal ->qualified_candidate = $request ->input('qualified_candidate');
                    if($request->hasFile('curriculum_vitae')){
                        $personal ->file_cv = $fileNameToStore;
                    }
                    if($request->hasFile('cover_letter')){
                        $personal ->cover_letter = $fileNameToStore;
                    }
                    if($request->hasFile('photo_image')){
                        $personal ->photo_image = $fileNameToStore;
                    }





                            $personal ->save();
            return redirect()->route('adminview') -> with('info', 'Information updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function admincandidatedestroy($id)
     {
       if(!Gate::allows('isAdmin'))
       {
           return redirect('/dashboard')->with('error', 'Unauthorised page');
       }
         Status:: where ('applicant_id', $id)
         -> delete();

         return back() -> with('info', 'Post/Vacancy deleted successfully!');
     }

    public function admincandidate()
    {
      if(!Gate::allows('isAdmin'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
        $users = User::all();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
          $user_id = Auth::user()->id;
        $profile = DB::table('users')
                   ->join('profiles', 'users.id', '=','profiles.user_id')
                   ->select('users.*', 'profiles.*')
                   ->where(['profiles.user_id'=>$user_id])
                   ->first();

                   $posts = Post::paginate(1);
                   $jobcodes = Jobcode::all();
                   $schools = Schools::all();
                   $users = User::all();

                   $personals =Personal::all();
                   $personals =DB::table('statuses')
                   ->join('posts','posts.post_id','=','statuses.post_id')
                   ->join('personals','personals.applicant_id','=','statuses.applicant_id')
                   ->join('users','users.id','=','personals.user_id')
                   // ->join('terms','terms.id','=','statuses.applicant_id')
                   ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
                   ->join('schools','schools.school_id','=','jobcodes.school_id')
                   ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
                   ->join('grades','grades.grade_id','=','posts.grade_id')
                   ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*','grades.*','users.*')
                   ->where('qualified_candidate','Qualified')

                   ->get();


  return view('Candidates.candidateslist',['profile'=> $profile,'personals'=> $personals,'schools'=>$schools,'users'=>$users,'posts' => $posts,'jobcodes'=>$jobcodes]);
    }

    public function showschoolofscience(){

      if(!Gate::allows('isSchoolOfScience'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
      $users = User::all();
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
        $user_id = Auth::user()->id;
      $profile = DB::table('users')
                 ->join('profiles', 'users.id', '=','profiles.user_id')
                 ->select('users.*', 'profiles.*')
                 ->where(['profiles.user_id'=>$user_id])
                 ->first();

                 $posts = Post::paginate(1);
                 $jobcodes = Jobcode::all();

                 $users = User::all();

                 $personals =Personal::all();
        $schools = Schools::all();
        $posts =DB::table('statuses')
        ->join('posts','posts.post_id','=','statuses.post_id')
        ->join('personals','personals.applicant_id','=','statuses.applicant_id')
        ->join('users','users.id','=','personals.user_id')
        ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
        ->join('schools','schools.school_id','=','jobcodes.school_id')
        ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
        ->join('grades','grades.grade_id','=','posts.grade_id')
        ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*','grades.*','users.*')
                ->where('school','School Of Science')
                // ->where('paid','verified')
                ->get();

        return view('Candidates.science',['profile'=> $profile,'personals'=> $personals,'schools'=>$schools,'users'=>$users,'posts' => $posts,'jobcodes'=>$jobcodes]);
    }
    public function showschoolofEducation(){
      if(!Gate::allows('isSchoolOfEducation'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
        $schools = Schools::all();
        $posts =DB::table('statuses')
        ->join('posts','posts.post_id','=','statuses.post_id')
        ->join('personals','personals.applicant_id','=','statuses.applicant_id')
        ->join('qualifications','qualifications.id','=','statuses.applicant_id')
        ->join('terms','terms.id','=','statuses.applicant_id')
        ->join('users','users.id','=','personals.user_id')
        ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
        ->join('schools','schools.school_id','=','jobcodes.school_id')
        ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
        ->join('grades','grades.grade_id','=','posts.grade_id')
        ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*','qualifications.*','grades.*','terms.*')
                ->where('school','School of Education')
                ->where('paid','verified')
                ->get();

        return view('Candidates.science',['schools'=>$schools,'posts'=>$posts]);
    }

    public function showschoolofArts(){
      if(!Gate::allows('isAdmin') || !Gate::allows('isSchoolOfArts'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
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
        ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*','qualifications.*','grades.*')
                ->where('school','School of Arts and Social Sciences')
                ->get();

        return view('Candidates.science',['schools'=>$schools,'posts'=>$posts]);
    }

    public function showschoolofTourism(){

      if(!Gate::allows('isSchoolOfTourism'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
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
        ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*','qualifications.*','grades.*')
                ->where('school','School of Arts and Social Sciences')
                ->get();

        return view('Candidates.science',['schools'=>$schools,'posts'=>$posts]);
    }



}
