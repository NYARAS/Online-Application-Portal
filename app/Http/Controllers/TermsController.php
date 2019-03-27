<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Terms;
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
use Auth;
use Mail;
use Gate;
use DB;
use App\Mail\ApplicationConfirmation;

class TermsController extends Controller
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
    public function getTerms()
    {
      $terms = DB::table('terms')->where('user_id',auth()->id())->get();
        return view('Conditions.terms',compact('terms'));
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
    public function storeTerms(Request $request)
    {
        {
            $this -> validate($request,[
                'transaction_code'=> 'required',
                'transaction_copy'=> 'required|mimes:pdf,doc,docx|max:1999',






                        ]);
                        //Handle file upload
                        if($request->hasFile('transaction_copy')){
                            //Get filename with extension
                            $filenameWithExt = $request->file('transaction_copy')->getClientOriginalName();
                            //Get just filename
                            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                            //Get just ext
                            $extension = $request ->file('transaction_copy')->getClientOriginalExtension();
                            //filename to store
                            $fileNameToStore = $filename.'_'.time().'.'.$extension;
                            //Upload file
                            $path = $request->file('transaction_copy')->storeAs('public/Transaction_Copies',$fileNameToStore);






                        }
                        $terms= new Terms;
                        $terms -> transaction_code = $request -> input('transaction_code');
                        $terms -> transaction_copy = $fileNameToStore;
                        $terms -> user_id = auth::user()-> id;
                        $terms -> email = auth::user()-> email;
                        $terms -> first_name = auth::user()-> first_name;
                        $terms -> second_name = auth::user()-> second_name;
                        $terms -> last_name = auth::user()-> last_name;
                        $terms -> first_name = auth::user()-> first_name;
                    $terms -> second_name = auth::user()-> second_name;
                    $terms -> last_name = auth::user()-> last_name;



               if($terms ->save())
               {
                   Mail::to(Auth::user()->email)->send(new ApplicationConfirmation());
                        return redirect('/dashboard') -> with('info', ' Your applications submitted successfully!');

               }
        }

    }
    //---------------------------------------School of Science--------------------------------
    public function confirmschoolofscience(){

      if(!Gate::allows('isAdmin'))
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
                ->where('school','School of Science')
                ->get();

        return view('finance.confirm',['schools'=>$schools,'posts'=>$posts]);
    }

    //----------------------------------School of Education--------------------------------
    //---------------------------------------School of Science--------------------------------
    public function confirmschoolofEducation(){

      if(!Gate::allows('isAdmin'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
        $schools = Schools::all();
        $posts =DB::table('statuses')
        ->join('posts','posts.post_id','=','statuses.post_id')
        ->join('personals','personals.applicant_id','=','statuses.applicant_id')
        ->join('qualifications','qualifications.qualification_id','=','statuses.applicant_id')
        ->join('terms','terms.id','=','statuses.applicant_id')
        ->join('users','users.id','=','personals.user_id')
        ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
        ->join('schools','schools.school_id','=','jobcodes.school_id')
        ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
        ->join('grades','grades.grade_id','=','posts.grade_id')
        ->select('personals.*','statuses.*','schools.*','jobtitles.*','jobcodes.*','posts.*','qualifications.*','grades.*','terms.*')
                ->where('school','School of Education')
                ->get();

        return view('finance.confirm',['schools'=>$schools,'posts'=>$posts]);
    }


    public function confirmpayment($id)
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



        return view ('finance.update',['profile'=> $profile,'post'=> $post,'posts'=> $posts,'schools'=> $schools,'jobcode'=> $jobcode,'jobcodes'=> $jobcodes,'personals'=> $personals]);

    }


    public function update(Request $request, $id)
    {
        $this -> validate($request,[
            'paid'=> 'required',





                    ]);
                    $terms = Terms::find($id);
                    $terms ->paid = $request ->input('paid');


                                                $terms ->save();
                                return redirect()->route('adminview') -> with('info', 'Information updated successfully!');
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
    public function updateterms(Request $request, $id)
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
