<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Course;
use App\Campus;
use App\Admission;
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
use PDF;
use Mail;
use App\Mail\ApplicationConfirmation;
use App\Mail\AdmissionConfirmation;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admission.course');
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
          'course_name'=> 'required',
          'course_body'=> 'required',






      ]);
      $course= new Course;
          $course -> course_name = $request -> input('course_name');

          $course -> course_body = $request -> input('course_body');

              $course ->save();

return back() -> with('info', 'Course Saved successfully!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $course = Course::all();

        return view('admission.course-show',compact('course'));
    }

    public function addmission($post_id)
    {
    $posts = Course::where('id', '=', $post_id)->get();
    $campus = Campus::all();

    $comments =DB::table('users')
    ->join('comments', 'users.id', '=', 'comments.user_id')
    ->join('posts', 'comments.post_id', '=', 'posts.post_id')
    ->select('users.first_name','comments.*')
    ->where(['posts.post_id' => $post_id])
    ->get();
    $schools =DB::table('posts')
    ->join('schools', 'posts.school_id', '=', 'schools.school_id')
    ->join('jobtitles', 'posts.jobtitle_id', '=', 'jobtitles.jobtitle_id')
    ->where(['schools.school_id' => $post_id])
    ->get();


    return view('admission.application',['posts'=>$posts,'schools'=>$schools,'comments'=>$comments,'campus'=>$campus]);
  }

  public function getpdfexport($s_id)
  {
    // $user = User::find($id);
    // $posts = Post::where("user_id", "=", $user->id)->get();

    $personals =Personal::all();
    $personals =DB::table('admissions')
    ->join('courses','courses.id','=','admissions.course_id')

    ->join('users','users.id','=','admissions.user_id')
    ->join('campuses','campuses.id','=','admissions.region_id')
    // ->join('schools','schools.school_id','=','jobcodes.school_id')
    // ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
    // ->join('grades','grades.grade_id','=','posts.grade_id')
    ->select('users.*','campuses.*','courses.*', DB::raw(
    'admissions.dob,
        CONCAT(users.first_name, " ",users.second_name)as name,
        CONCAT(users.id,"",admissions.id_card_number)as serial_number,
        (CASE WHEN admissions.status = 0 THEN "single" ELSE "married" END) as marital_status,


        admissions.passport,
        admissions.primary_phone_number,
        admissions.secondary_phone_number,
        admissions.nationality,
        admissions.date_of_commencement,

        admissions.date_of_completion,
       admissions.university,
        admissions.secondary,
       admissions.other_qualifications,









        CONCAT(users.gender) as gender,
        CONCAT(users.email) as email


        '))
 // ->join('profiles', 'users.id', '=','profiles.user_id')


        ->where(['admissions.id' => $s_id])



           ->get();

      $pdf = PDF::loadView('admission.report',compact('personals'));
       return  $pdf ->setPaper('A4','portrait')-> download('applicant-full-report.pdf');
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

    public function apply(Request $request, $post_id){
        $this -> validate($request,[

          'secondary_file'=> 'required',



          'university_file'=> 'required',
          'referees' => 'required',
          'mode_of_study' => 'required',

          'nationality'=> 'required',
          'dob'=> 'required',
          'region_id'=> 'required',
          'primary_phone_number'=>'required|regex:/(07)[0-9]{8}/',
          'secondary_phone_number'=>'regex:/(07)[0-9]{8}/',
          'passport'=> 'required',

          'status'=> 'required',
          'id_card_number'=> 'required',

              ]);

          if($request->hasFile('secondary_file')){
              //Get filename with extension
              $filenameWithExt = $request->file('secondary_file')->getClientOriginalName();
              //Get just filename
              $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
              //Get just ext
              $extension = $request ->file('secondary_file')->getClientOriginalExtension();
              //filename to store
              $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
              //Upload file
              $path = $request->file('secondary_file')->storeAs('public/secondary_files',$fileNameToStore1);




          }
          if($request->hasFile('university_file')){
              //Get filename with extension
              $filenameWithExt = $request->file('university_file')->getClientOriginalName();
              //Get just filename
              $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
              //Get just ext
              $extension = $request ->file('university_file')->getClientOriginalExtension();
              //filename to store
              $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
              //Upload file
              $path = $request->file('university_file')->storeAs('public/university_files',$fileNameToStore2);




          }

          if($request->hasFile('other_qualification_file')){
              //Get filename with extension
              $filenameWithExt = $request->file('other_qualification_file')->getClientOriginalName();
              //Get just filename
              $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
              //Get just ext
              $extension = $request ->file('other_qualification_file')->getClientOriginalExtension();
              //filename to store
              $fileNameToStore3 = $filename.'_'.time().'.'.$extension;
              //Upload file
              $path = $request->file('other_qualification_file')->storeAs('public/other_qualification_files',$fileNameToStore3);




          }



        $application = new Admission;

        $application->user_id = Auth::user()->id;
        $application -> email = auth::user()-> email;
        $application->course_id=$post_id;
        $application->dob = $request->input('dob');
        ;
        $application->id_card_number = $request->input('id_card_number');
        $application->status = $request->input('status');

        $application -> nationality = $request -> input('nationality');
        $application->secondary_phone_number = $request-> input('secondary_phone_number');
        $application -> primary_phone_number = $request -> input('primary_phone_number');

        $application->secondary = $request-> input('secondary');
        $application->university = $request-> input('university');
        $application->other_qualifications = $request-> input('other_qualifications');
        $application->research_experience = $request-> input('research_experience');
        $application->employment_position = $request-> input('employment_position');
        $application->place_of_employment = $request-> input('place_of_employment');

        $application->region_id = $request-> input('region_id');
        $application->mode_of_study = $request-> input('mode_of_study');
        $application->date_of_commencement = $request-> input('date_of_commencement');
        $application->date_of_completion = $request-> input('date_of_completion');
        $application->referees = $request-> input('referees');




        // $personal -> applicant_photo = $fileNameToStore;
        $application -> secondary_file = $fileNameToStore1;
        $application -> university_file = $fileNameToStore2;
        $application -> other_qualification_file = $fileNameToStore3;

        if(Input::hasFile('passport')){
            $file =Input::file('passport');
            $file->move(public_path().'/passport/',$file->getClientOriginalName());
            $url = URL::to("/").'/public/applicant_passport/'.$file->getClientOriginalName();
          }
        $application -> passport =  $url;

        if($application ->save())
        {
            Mail::to(Auth::user()->email)->send(new AdmissionConfirmation());
                 return redirect('/show-course') -> with('info', ' Your applications submitted successfully!');

        }


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

    public function applicants()
    {

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
                   $personals =DB::table('admissions')
                   ->join('courses','courses.id','=','admissions.course_id')

                   ->join('users','users.id','=','admissions.user_id')
                   ->join('campuses','campuses.id','=','admissions.region_id')
                   // ->join('schools','schools.school_id','=','jobcodes.school_id')
                   // ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
                   // ->join('grades','grades.grade_id','=','posts.grade_id')
                   ->select('admissions.*','users.*','campuses.*','courses.*')

                   ->get();


  return view('admission.applicants-info',['profile'=> $profile,'personals'=> $personals,'schools'=>$schools,'users'=>$users,'posts' => $posts,'jobcodes'=>$jobcodes]);
    }







}
