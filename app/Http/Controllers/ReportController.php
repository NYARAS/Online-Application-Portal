<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;





use App\Schools;
use App\Jobcode;
use App\Post;
use App\Profile;
use App\Personal;
use App\Qualification;
use App\Publication;
use App\Like;
use App\Dislike;
use App\Comments;
use App\Grade;
use App\Jobtitle;
use App\Status;
use App\user;
use DB;
use Charts;
use Gate;
use Auth;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
   public function getApplicantReport()

   {

    $schools = Schools::all();
    $jobcode = Jobcode::all();
    $posts = Post::all();
    $grades = Grade::all();
    $jobcodes = Jobcode::all();
    $user_id = Auth::user()->id;
    $profile = DB::table('users')
               ->join('profiles', 'users.id', '=','profiles.user_id')
               ->select('users.*', 'profiles.*')
               ->where(['profiles.user_id'=>$user_id])
               ->first();


    $Jobtitles = Jobtitle::orderBy('jobtitle_id','DESC')->get();
       return view('report.applicantList',['grades'=>$grades,'posts'=>$posts,'Jobtitles'=>$Jobtitles,'schools'=>$schools,'profile'=>$profile]);
   }


   public function showApplicantInfo(Request $re)

   {
    $schools = Schools::all();
    $jobcode = Jobcode::all();
    $posts = Post::all();
    $grades = Grade::all();
    $jobcodes = Jobcode::all();

       $posts = $this->info($re->post_id);
       return view('report.applicantInfo',compact('posts','schools'));
   }

   public function info($post_id)
   {
     return  Status::join('posts','posts.post_id','=','statuses.post_id')
               ->join('personals','personals.applicant_id','=','statuses.applicant_id')

               ->join('users','users.id','=','personals.user_id')
               ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
               ->join('schools','schools.school_id','=','jobcodes.school_id')
               ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
               ->join('grades','grades.grade_id','=','posts.grade_id')
               ->select(DB::raw('personals.applicant_id,
                         CONCAT(personals.first_name, " ",personals.second_name)as name,
                         (CASE WHEN personals.status = 0 THEN "single" ELSE "married" END) as marital_status,
                         personals.dob,
                         personals.primary_phone_number,
                         CONCAT(schools.school, " / " , jobcodes.jobcode_name, " / ",
                         jobtitles.job_title, " / ",grades.grade) as vacancy,
                         CONCAT(users.gender) as gender,
                         CONCAT(users.email) as email


                         '))
               ->where('posts.post_id',$post_id)
               ->get();


   }

   public function getRegisteredUser()

   {
     $schools = Schools::all();
     $jobcode = Jobcode::all();
     $user_id = Auth::user()->id;
     $profile = DB::table('users')
                ->join('profiles', 'users.id', '=','profiles.user_id')
                ->select('users.*', 'profiles.*')
                ->where(['profiles.user_id'=>$user_id])
                ->first();
     $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))

    				->get();

        $chart = Charts::database($users, 'bar', 'highcharts')

			      ->title("Monthly new Register Users")

			      ->elementLabel("Total Users")

			      ->dimensions(1000, 500)

			      ->responsive(false)

			      ->groupByMonth(date('Y'), true);

        return view('report.newRegistredUser',compact('chart','schools','profile'));
   }





   public function showStudentInfo(Request $re)

{
    $courses = $this->inform()->select(DB::raw('personals.applicant_id,
                   CONCAT(personals.first_name, " ",personals.second_name)as name,
                   (CASE WHEN personals.status = 0 THEN "single" ELSE "married" END) as marital_status,
                   personals.dob,
                   personals.primary_phone_number,
                   CONCAT(schools.school, " / " , jobcodes.jobcode_name, " / ",
                   jobtitles.job_title, " / ",grades.grade) as vacancy,
                   CONCAT(users.gender) as gender,
                   CONCAT(users.email) as email


                   '))
           ->where('posts.post_id',$re->$post_id)
         ->get();

    return view('report.candidateinfo',compact('courses'));



}

public function inform()
{
  return  Status::join('posts','posts.post_id','=','statuses.post_id')
            ->join('personals','personals.applicant_id','=','statuses.applicant_id')

            ->join('users','users.id','=','personals.user_id')
            ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
            ->join('schools','schools.school_id','=','jobcodes.school_id')
            ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
            ->join('grades','grades.grade_id','=','posts.grade_id');


}

public function getStudentListMultiClass()
{
  $schools = Schools::all();
  $jobcode = Jobcode::all();
  $posts = Post::all();
  $grades = Grade::all();
  $jobcodes = Jobcode::all();

$Jobtitles = Jobtitle::orderBy('jobtitle_id','DESC')->get();

    return view('report.candidateListMultiClass',compact('schools','jobcode','posts','grades','Jobtitles'));
}

public function showStudentInfoMultiClass(Request $request)
{
    if($request->ajax()){

        if(!empty($request['chk'])){

        $courses = $this->inform()->select(DB::raw('personals.applicant_id,
                       CONCAT(personals.first_name, " ",personals.second_name)as name,
                       (CASE WHEN personals.status = 0 THEN "single" ELSE "married" END) as marital_status,
                       personals.dob,
                       personals.primary_phone_number,
                       CONCAT(schools.school, " / " , jobcodes.jobcode_name, " / ",
                       jobtitles.job_title, " / ",grades.grade) as vacancy,
                       CONCAT(users.gender) as gender,
                       CONCAT(users.email) as email


                       '))
               ->whereIn('posts.post_id',$request['chk'])
             ->get();


      return view('report.candidateInfoMulticlass',compact('courses'));
        }
    }
}
}
