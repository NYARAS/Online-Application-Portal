<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Qualification;
use App\Schools;
use App\Jobcode;
use App\Post;
use App\Profile;
use App\Personal;
use App\Like;
use App\Dislike;
use App\Comments;
use App\Grade;
use App\Jobtitle;
use App\user;
use App\Status;
use App\Test;
use App\Dynamic;
use Auth;
use Gate;
use PDF;
use  DataTables;

class QualificatinController extends Controller
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
    public function getQualifications()
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $schools = Schools::all();
        $jobcode = Jobcode::all();
        $posts = Post::all();
        $grades = Grade::all();
        $jobcodes = Jobcode::all();


        $Jobtitles = Jobtitle::orderBy('jobtitle_id','DESC')->get();




    $qualifications = DB::table('qualifications')->where('user_id',auth()->id())->get();






        return view('qualifications.qualifications',['qualifications'=>$qualifications,'grades'=>$grades,'posts'=>$posts,'Jobtitles'=>$Jobtitles,'schools'=>$schools] );
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

    // public function getPDF($s_id)
    // {
    //   $user_id = auth()->user()->id;
    //   $user = User::find($user_id);
    //     $qualifications = Status::join('posts','posts.post_id','=','statuses.post_id')
    //     ->join('personals','personals.applicant_id','=','statuses.applicant_id')
    //     ->join('qualifications','qualifications.id','=','statuses.applicant_id')
    //     ->join('publications','publications.id','=','statuses.applicant_id')
    //     ->join('users','users.id','=','personals.user_id')
    //
    //     ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
    //     ->join('schools','schools.school_id','=','jobcodes.school_id')
    //     ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
    //     ->join('grades','grades.grade_id','=','posts.grade_id')
    //     ->select(DB::raw('personals.applicant_id,
    //     CONCAT(personals.first_name, " ",personals.second_name, " ",personals.last_name)as name,
    //     (CASE WHEN personals.status = 0 THEN "single" ELSE "married" END) as marital_status,
    //
    //     personals.dob,
    //     personals.applicant_photo,
    //     personals.primary_phone_number,
    //     personals.secondary_phone_number,
    //     personals.country,
    //     personals.province,
    //     personals.current_address,
    //     personals.date_applied,
    //     qualifications.*,
    //     publications.*,
    //     CONCAT(schools.school, " / " , jobcodes.jobcode_name, " / ",
    //     jobtitles.job_title, " / ",grades.grade) as vacancy,
    //     CONCAT(users.gender) as gender,
    //     CONCAT(users.email) as email
    //
    //
    //     '))
    //     ->where(['statuses.applicant_id' => $s_id])
    //
    //
    //     ->get();
    //
    //     $pdf = PDF::loadView('export.qualification',compact('qualifications'));
    //      return  $pdf ->setPaper('A4','portrait')-> download('full-report.pdf');
    // }


    public function getPDF($s_id)
    {
      // $user = User::find($id);
      // $posts = Post::where("user_id", "=", $user->id)->get();

      $qualifications = DB::table('qualifications')
    ->join('users', 'users.id', '=', 'qualifications.user_id')
    ->join('personals','personals.user_id','=','users.id')
    ->join('statuses','statuses.applicant_id','=','personals.applicant_id')
    ->join('posts','posts.post_id','=','statuses.post_id')
    ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
    ->join('schools','schools.school_id','=','jobcodes.school_id')
    ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
   // ->join('profiles', 'users.id', '=','profiles.user_id')
     ->join('grades','grades.grade_id','=','posts.grade_id')
    ->select('users.*', DB::raw(
    'personals.applicant_id,
        CONCAT(personals.first_name, " ",personals.second_name)as name,
        (CASE WHEN personals.status = 0 THEN "single" ELSE "married" END) as marital_status,

        personals.dob,
        personals.applicant_photo,
        personals.primary_phone_number,
        personals.secondary_phone_number,
        personals.country,
        personals.province,
        personals.current_address,
        personals.date_applied,


        qualifications.*,
        statuses.*,


        CONCAT(schools.school, " / " , jobcodes.jobcode_name, " / ",
        jobtitles.job_title, " / ",grades.grade) as vacancy,
        CONCAT(users.gender) as gender,
        CONCAT(users.email) as email


        '))
          ->where(['statuses.applicant_id' => $s_id])



             ->get();

        $pdf = PDF::loadView('export.qualification',compact('qualifications'));
         return  $pdf ->setPaper('A4','portrait')-> download('applicant-full-report.pdf');
    }

    // public function getDownload($s_id)
    // {  $schools = Schools::all();
    //
    //
    //     $qualifications =DB::table('statuses')
    //     ->join('posts','posts.post_id','=','statuses.post_id')
    //     ->join('personals','personals.applicant_id','=','statuses.applicant_id')
    //     ->join('qualifications','qualifications.id','=','statuses.applicant_id')
    //     ->join('users','users.id','=','personals.user_id')
    //     ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
    //     ->join('schools','schools.school_id','=','jobcodes.school_id')
    //     ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
    //        ->join('profiles', 'users.id', '=','profiles.user_id')
    //     ->join('grades','grades.grade_id','=','posts.grade_id')
    //     ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*','qualifications.*')
    //             ->where(['schools.school_id' => $s_id])
    //             ->get();
    //     return view('files.qualification',compact('qualifications','schools'));
    // }
//---------------------------------------School Of Science-----------------------------------
    public function getD(){
        $schools = Schools::all();
        $qualifications =DB::table('statuses')
        ->join('posts','posts.post_id','=','statuses.post_id')
        ->join('personals','personals.applicant_id','=','statuses.applicant_id')
        ->join('qualifications','qualifications.id','=','statuses.applicant_id')
        ->join('users','users.id','=','personals.user_id')
        ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
        ->join('schools','schools.school_id','=','jobcodes.school_id')
        ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
        ->join('grades','grades.grade_id','=','posts.grade_id')
         // ->join('profiles', 'users.id', '=','profiles.user_id')
        ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*','qualifications.*')
                ->where('school','School Of Science')
                ->get();
        return view('files.file',compact('qualifications','schools'));
    }

    public function test(){



      $user_id = auth()->user()->id;
      $user = User::find($user_id);
        $user_id = Auth::user()->id;
      $qualifications = DB::table('schools')
                      // ->join('posts','posts.post_id','=','statuses.post_id')
                      // ->join('personals','personals.applicant_id','=','statuses.applicant_id')
                      // ->join('qualifications','qualifications.id','=','statuses.applicant_id')
                      ->join('users','users.id','=','schools.user_id')
                     //  ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
                     //  ->join('schools','schools.school_id','=','jobcodes.school_id')
                     //  ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
                     // ->join('grades','grades.grade_id','=','posts.grade_id')
                     ->select('users.*','schools.*')
                     ->where(['schools.school'=>$user_id])
                     ->get();





                 $schools = Schools::all();
                 // $qualifications =DB::table('users')
                 //
                 // ->join('schools','users.id','=','schools.user_id')
                 //
                 //  // ->join('profiles', 'users.id', '=','profiles.user_id')
                 // ->select('schools.*','users.*')
                 //         ->where(['schools.user_id'=>$user_id])
                 //         ->first();
                 return view('files.test',compact('qualifications','schools'));



    }




//-------------------------------------School Of Science--------------------------------------------
public function getDownload(){
    $schools = Schools::all();
    $qualifications =DB::table('qualifications')

    ->join('users','users.id','=','qualifications.user_id')

    ->select('users.*','qualifications.*')
            // ->where('school','School Of Science')
            ->get();
    return view('files.qualification',compact('qualifications','schools'));
}
  //---------------------------------------School Of Education---------------------------------------
  public function getSchoolOfEducation(){
      $schools = Schools::all();
      $qualifications =DB::table('statuses')
      ->join('posts','posts.post_id','=','statuses.post_id')
      ->join('personals','personals.applicant_id','=','statuses.applicant_id')
      ->join('qualifications','qualifications.id','=','statuses.applicant_id')
      ->join('users','users.id','=','personals.user_id')
      ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
      ->join('schools','schools.school_id','=','jobcodes.school_id')
      ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
      ->join('grades','grades.grade_id','=','posts.grade_id')
      ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*','qualifications.*')
              ->where('school','School of Education')
              ->get();
      return view('files.file',compact('qualifications','schools'));
  }

    public function storeQualifications(Request $request)
    {
        $this -> validate($request,[
            'secondary'=> 'required',
            'secondary_year'=> 'required',
            'copy_of_secondary'=> 'required|mimes:pdf,doc,docx|max:1999',

            'copy_of_undergraduate'=> 'mimes:pdf,doc,docx|max:1999',

            'post_graduate_copy'=>'mimes:pdf,doc,docx|max:1999',


            'copy_of_phd'=> '|mimes:pdf,doc,docx|max:1999',

            'other_qualification_copy'=> 'mimes:pdf,doc,docx|max:1999',







                    ]);
                    //Handle file upload
                    if($request->hasFile('copy_of_secondary')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('copy_of_secondary')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('copy_of_secondary')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('copy_of_secondary')->storeAs('public/secondary',$fileNameToStore1);




                    }
                    if($request->hasFile('copy_of_undergraduate')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('copy_of_undergraduate')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('copy_of_undergraduate')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('copy_of_undergraduate')->storeAs('public/undergraduate',$fileNameToStore2);




                    }
                    if($request->hasFile('post_graduate_copy')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('post_graduate_copy')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('post_graduate_copy')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore3 = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('post_graduate_copy')->storeAs('public/postgraduate',$fileNameToStore3);




                    }
                    if($request->hasFile('copy_of_phd')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('copy_of_phd')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('copy_of_phd')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore4 = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('copy_of_phd')->storeAs('public/phd_qualificatons',$fileNameToStore4);




                    }
                    if($request->hasFile('other_qualification_copy')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('other_qualification_copy')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('other_qualification_copy')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore5 = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('other_qualification_copy')->storeAs('public/other_qualifications',$fileNameToStore5);




                    }
                    $qualification= new Qualification;
                    $qualification -> secondary = $request -> input('secondary');
                    $qualification -> user_id = auth::user()-> id;
                    $qualification -> email = auth::user()-> email;
                    $qualification -> first_name = auth::user()-> first_name;
                    $qualification -> second_name = auth::user()-> second_name;
                    $qualification -> last_name = auth::user()-> last_name;
                    $qualification -> secondary_year = $request -> input('secondary_year');
                    $qualification -> copy_of_secondary = $fileNameToStore1;
                    $qualification -> undergraduate = $request -> input('undergraduate');
                    $qualification -> undergraduate_year = $request -> input('undergraduate_year');
                    $qualification -> copy_of_undergraduate = $fileNameToStore2;
                    $qualification -> post_graduate = $request -> input('post_graduate');
                    $qualification -> post_graduate_year = $request -> input('post_graduate_year');
                    $qualification -> post_graduate_copy = $fileNameToStore3;
                    $qualification -> phd = $request -> input('phd');
                    $qualification -> phd_year = $request -> input('phd_year');
                    $qualification -> copy_of_phd = $fileNameToStore4;
                    $qualification -> other_qualification = $request -> input('other_qualification');
                    $qualification -> year = $request -> input('year');
                    $qualification -> other_qualification_copy = $fileNameToStore5;

                    $qualification -> years = $request -> input('years');

                    $qualification -> email = auth::user()-> email;
                    $qualification -> months = $request -> input('months');
                    $qualification -> first_institution = $request -> input('first_institution');
                    $qualification -> workedas1 = $request -> input('workedas1');
                    $qualification -> from1 = $request -> input('from1');
                    $qualification -> to1 = $request -> input('to1');
                    $qualification -> second_institution = $request -> input('second_institution');
                    $qualification -> workedas2 = $request -> input('workedas2');
                    $qualification -> from2 = $request -> input('from2');
                    $qualification -> to2 = $request -> input('to2');
                    $qualification -> third_institution = $request -> input('third_institution');
                    $qualification -> workedas3 = $request -> input('workedas3');
                    $qualification -> from3 = $request -> input('from3');
                    $qualification -> to3 = $request -> input('to3');
                    $qualification ->save();
                    return redirect()->route('getpublication')-> with('info', 'Information Saved successfully!');
    }
//
//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
    public function show($id)
    {
        //
    }
//
//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function editqualification($id)
//     {
//
//         $qualifications = Qualification::find($id);
//         $jobcode = Jobcode::all();
//
//         return view('qualifications.editqualifications',['qualifications'=>$qualifications]);
//     }
//
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//       $this -> validate($request,[
//           'secondary'=> 'required',
//           'secondary_year'=> 'required',
//           'copy_of_secondary'=> 'required|mimes:pdf,doc,docx|max:1999',
//
//           'copy_of_undergraduate'=> 'mimes:pdf,doc,docx|max:1999',
//
//           'post_graduate_copy'=>'mimes:pdf,doc,docx|max:1999',
//
//
//           'copy_of_phd'=> '|mimes:pdf,doc,docx|max:1999',
//
//           'other_qualification_copy'=> 'mimes:pdf,doc,docx|max:1999',
//
//
//
//
//
//
//
//                   ]);
//                   //Handle file upload
//                   if($request->hasFile('copy_of_secondary')){
//                       //Get filename with extension
//                       $filenameWithExt = $request->file('copy_of_secondary')->getClientOriginalName();
//                       //Get just filename
//                       $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
//                       //Get just ext
//                       $extension = $request ->file('copy_of_secondary')->getClientOriginalExtension();
//                       //filename to store
//                       $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
//                       //Upload file
//                       $path = $request->file('copy_of_secondary')->storeAs('public/secondary',$fileNameToStore1);
//
//
//
//
//                   }
//                   if($request->hasFile('copy_of_undergraduate')){
//                       //Get filename with extension
//                       $filenameWithExt = $request->file('copy_of_undergraduate')->getClientOriginalName();
//                       //Get just filename
//                       $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
//                       //Get just ext
//                       $extension = $request ->file('copy_of_undergraduate')->getClientOriginalExtension();
//                       //filename to store
//                       $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
//                       //Upload file
//                       $path = $request->file('copy_of_undergraduate')->storeAs('public/undergraduate',$fileNameToStore2);
//
//
//
//
//                   }
//                   if($request->hasFile('post_graduate_copy')){
//                       //Get filename with extension
//                       $filenameWithExt = $request->file('post_graduate_copy')->getClientOriginalName();
//                       //Get just filename
//                       $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
//                       //Get just ext
//                       $extension = $request ->file('post_graduate_copy')->getClientOriginalExtension();
//                       //filename to store
//                       $fileNameToStore3 = $filename.'_'.time().'.'.$extension;
//                       //Upload file
//                       $path = $request->file('post_graduate_copy')->storeAs('public/postgraduate',$fileNameToStore3);
//
//
//
//
//                   }
//                   if($request->hasFile('copy_of_phd')){
//                       //Get filename with extension
//                       $filenameWithExt = $request->file('copy_of_phd')->getClientOriginalName();
//                       //Get just filename
//                       $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
//                       //Get just ext
//                       $extension = $request ->file('copy_of_phd')->getClientOriginalExtension();
//                       //filename to store
//                       $fileNameToStore4 = $filename.'_'.time().'.'.$extension;
//                       //Upload file
//                       $path = $request->file('copy_of_phd')->storeAs('public/phd_qualificatons',$fileNameToStore4);
//
//
//
//
//                   }
//                   if($request->hasFile('other_qualification_copy')){
//                       //Get filename with extension
//                       $filenameWithExt = $request->file('other_qualification_copy')->getClientOriginalName();
//                       //Get just filename
//                       $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
//                       //Get just ext
//                       $extension = $request ->file('other_qualification_copy')->getClientOriginalExtension();
//                       //filename to store
//                       $fileNameToStore5 = $filename.'_'.time().'.'.$extension;
//                       //Upload file
//                       $path = $request->file('other_qualification_copy')->storeAs('public/other_qualifications',$fileNameToStore5);
//
//
//
//
//                   }
//                   $qualification= new Qualification;
//                   $qualification -> secondary = $request -> input('secondary');
//                   $qualification -> user_id = auth::user()-> id;
//                   $qualification -> email = auth::user()-> email;
//                   $qualification -> first_name = auth::user()-> first_name;
//                   $qualification -> second_name = auth::user()-> second_name;
//                   $qualification -> last_name = auth::user()-> last_name;
//                   $qualification -> secondary_year = $request -> input('secondary_year');
//                       if($request->hasFile('copy_of_secondary')){
//                   $qualification -> copy_of_secondary = $fileNameToStore1;
//
//                 }
//                   $qualification -> undergraduate = $request -> input('undergraduate');
//                   $qualification -> undergraduate_year = $request -> input('undergraduate_year');
//                     if($request->hasFile('copy_of_undergraduate')){
//                   $qualification -> copy_of_undergraduate = $fileNameToStore2;
//                 }
//                   $qualification -> post_graduate = $request -> input('post_graduate');
//                   $qualification -> post_graduate_year = $request -> input('post_graduate_year');
//                     if($request->hasFile('post_graduate_copy')){
//                   $qualification -> post_graduate_copy = $fileNameToStore3;
//                 }
//                   $qualification -> phd = $request -> input('phd');
//                   $qualification -> phd_year = $request -> input('phd_year');
//                     if($request->hasFile('copy_of_phd')){
//                   $qualification -> copy_of_phd = $fileNameToStore4;
//                 }
//                   $qualification -> other_qualification = $request -> input('other_qualification');
//
//                   $qualification -> year = $request -> input('year');
//                     if($request->hasFile('other_qualification_copy')){
//                   $qualification -> other_qualification_copy = $fileNameToStore5;
//                 }
//
//                   $qualification -> years = $request -> input('years');
//
//                   $qualification -> email = auth::user()-> email;
//                   $qualification -> months = $request -> input('months');
//                   $qualification -> first_institution = $request -> input('first_institution');
//                   $qualification -> workedas1 = $request -> input('workedas1');
//                   $qualification -> from1 = $request -> input('from1');
//                   $qualification -> to1 = $request -> input('to1');
//                   $qualification -> second_institution = $request -> input('second_institution');
//                   $qualification -> workedas2 = $request -> input('workedas2');
//                   $qualification -> from2 = $request -> input('from2');
//                   $qualification -> to2 = $request -> input('to2');
//                   $qualification -> third_institution = $request -> input('third_institution');
//                   $qualification -> workedas3 = $request -> input('workedas3');
//                   $qualification -> from3 = $request -> input('from3');
//                   $qualification -> to3 = $request -> input('to3');
//
//                   $data = array(
//
//                     'secondary' => $qualification -> secondary,
//                     'user_id' => $qualification -> user_id,
//                     'first_name' => $qualification -> first_name,
//                     'second_name' => $qualification -> second_name,
//                     'last_name' => $qualification -> last_name,
//                     'secondary_year' => $qualification -> secondary_year,
//                     'copy_of_secondary' => $qualification -> copy_of_secondary,
//                     'undergraduate' => $qualification -> undergraduate,
//                     'undergraduate_year' => $qualification -> undergraduate_year,
//                     'copy_of_undergraduate' => $qualification -> copy_of_undergraduate,
//                     'post_graduate' => $qualification -> post_graduate,
//                     'post_graduate_year' => $qualification -> post_graduate_year,
//                     'post_graduate_copy' => $qualification -> post_graduate_copy,
//                     'phd' => $qualification -> phd,
//                     'phd_year' => $qualification -> phd_year,
//                     'copy_of_phd' => $qualification -> copy_of_phd,
//                     'other_qualification' => $qualification -> other_qualification,
//                     'year' => $qualification -> year,
//                     'other_qualification_copy' => $qualification -> other_qualification_copy,
//
//                     'years' => $qualification -> years,
//                     'months' => $qualification -> months,
//                     'email' => $qualification -> email,
//                     'first_institution' => $qualification -> first_institution,
//                     'workedas1' => $qualification -> workedas1,
//                     'from1' => $qualification -> from1,
//                     'to1' => $qualification -> to1,
//                     'second_institution' => $qualification -> second_institution,
//                     'workedas2' => $qualification -> workedas2,
//                     'from2' => $qualification -> from2,
//                     'to2' => $qualification -> to2,
//                     'third_institution' => $qualification -> third_institution,
//                     'workedas3' => $qualification -> workedas3,
//                     'from3' => $qualification -> from3,
//                     'to3' => $qualification -> to3,
//
//
//
//
//
//                   );
//                   Qualification:: where ('qualification_id', $id)
//                   -> update($data);
//
//
//                   $qualification ->update();
//                   return redirect()->route('getpublication')-> with('info', 'Information updated successfully!');
//     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function qualification()
    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);
      $schools = Schools::all();
      $jobcode = Jobcode::all();
      $posts = Post::all();
      $grades = Grade::all();
      $jobcodes = Jobcode::all();


      $Jobtitles = Jobtitle::orderBy('jobtitle_id','DESC')->get();




  $qualifications = DB::table('qualifications')->where('user_id',auth()->id())->get();
      return view('Application.qual-publi-referee',['qualifications'=>$qualifications,'grades'=>$grades,'posts'=>$posts,'Jobtitles'=>$Jobtitles,'schools'=>$schools]);

    }
    public function store(Request $request)
    {
    $this -> validate($request,[






    ]);
    $input = $request->all();
    $input['file_attachment'] = null;

    if($request -> hasFile('file_attachment'))
    {
      $input['file_attachment'] = '/upload/file/'.str_slug($input['institution_name'],'-').'.'.$request->file_attachment->getClientOriginalExtension();
      $request->file_attachment->move(public_path('/upload/file'),$input['file_attachment']);

    }

    Qualification::create($input);

      return back()-> with('info', 'Information saved successfully!');

  }
  public function apiTest()

  {


      $test = Qualification::all()->where('user_id',auth()->id());
      return DataTables::of($test)
          ->addColumn('action',function($test){
        return
         '<a href="#" class="btn btn-danger btn-xs " onclick="deleteData('.$test->id.')"><i class="glyphicon glyphicon-trash"></i>Remove</a>'.
         '<a href="#" class="btn btn-success btn-xs " onclick="editForm('.$test->id.')"><i class="glyphicon glyphicon-trash"></i>Change</a>';
         })
         ->make(true);
}
public function edit($id)
{
  $test = Qualification::find($id);
  return $test;
}

public function update(Request $request, $id)
{
  $this -> validate($request,[







  ]);

  $input = $request -> all();
  $test = Qualification::findOrFail($id);
  $input['file_attachment'] = $test-> file_attachment;

        if($request -> hasFile('file_attachment'))

      {
        if($test -> file_attachment != NULL)
        {
          unlink(public_path($test->file_attachment));

        }
        $input['file_attachment'] = '/upload/file/'.str_slug($input['institution_name'],'-').'.'.$request->file_attachment->getClientOriginalExtension();
        $request->file_attachment->move(public_path('/upload/file'),$input['file_attachment']);

      }
      $test -> update($input);
      return response()->json([
        'success'=> true

      ]);



}

public function destroy($id)
{
    $test = Qualification::findOrFail($id);
    if($test -> file_attachment != NULL)
    {
      unlink(public_path($test->file_attachment));

    }

    Qualification::destroy($id);
    return response()->json([
      'success'=> true

    ]);


}
}
