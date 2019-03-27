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
use App\Terms;
use App\Status;
use App\Qualification;
use Auth;
use Gate;
use DataTables;


class ScienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $schools = Schools::all();
            $jobcode = Jobcode::all();
            $posts = Post::all();
            $grades = Grade::all();
            $jobcodes = Jobcode::all();
            $Jobtitles = Jobtitle::all();
              $qualification = Qualification::all();
            $terms = Terms::all();
      return view('Candidates.schoolofscience',['grades'=>$grades,'posts'=>$posts,'Jobtitles'=>$Jobtitles,'schools'=>$schools,'terms'=>$terms,'qualification'=>$qualification,]);

    }
    public function apiTest()

    {

      $dynamic =DB::table('statuses')

      ->join('posts','posts.post_id','=','statuses.post_id')
      ->join('personals','personals.applicant_id','=','statuses.applicant_id')
      ->join('qualifications','qualifications.id','=','statuses.applicant_id')
      ->join('users','users.id','=','personals.user_id')


      ->join('terms','terms.id','=','statuses.applicant_id')
      ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
      ->join('schools','schools.school_id','=','jobcodes.school_id')
      ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
      ->join('grades','grades.grade_id','=','posts.grade_id')
      ->select(DB::raw('personals.applicant_id,
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
        personals.qualified_candidate,



        statuses.*,
        terms.*,



        CONCAT(schools.school, " / " , jobcodes.jobcode_name, " / ",
        jobtitles.job_title, " / ",grades.grade) as vacancy,
        CONCAT(users.gender) as gender,
        CONCAT(users.email) as email


        '))
             ->where('school','School of Science');
             // ->where('paid','verified');




        return DataTables::of($dynamic)
            ->addColumn('action',function($dynamic){
          return
           '<a href="#" class="btn btn-success btn-xs " onclick="editForm('.$dynamic->applicant_id.')"><i class="glyphicon glyphicon-trash"></i>Edit</a>';

           })
           ->make(true);
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
        'paid'=> 'required',
        'transaction_copy'=> 'required|mimes:pdf|max:1999',






    ]);
    $input = $request->all();
    $input['transaction_copy'] = null;


    if($request -> hasFile('transaction_copy'))
    {
      $input['transaction_copy'] = '/upload/Journals/'.str_slug($input['transaction_copy'],'-').'.'.$request->transaction_copy->getClientOriginalExtension();
      $request->transaction_copy->move(public_path('/upload/Journals'),$input['transaction_copy']);

    }

    // if($request -> hasFile('list_of_books'))
    // {
    //   $input['list_of_books'] = '/upload/Books/'.str_slug($input['number_of_books'],'-').'.'.$request->list_of_books->getClientOriginalExtension();
    //   $request->list_of_books->move(public_path('/upload/Books'),$input['list_of_books']);
    //
    // }
    // if($request -> hasFile('recommendation_letter'))
    // {
    //   $input['recommendation_letter'] = '/upload/referee/'.str_slug($input['name_of_referee'],'-').'.'.$request->recommendation_letter->getClientOriginalExtension();
    //   $request->recommendation_letter->move(public_path('/upload/referee'),$input['recommendation_letter']);
    //
    // }

    Terms::create($input);
    return response()->json([
      'success' => true

    ]);
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
      $test = Terms::find($id);
      return $test;
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
        'paid'=> 'required',







    ]);

    $input = $request -> all();
    $test = Terms::findOrFail($id);
    $inpu['transaction_copy'] = $test-> transaction_copy;

          if($request -> hasFile('transaction_copy'))

        {
          if($test -> transaction_copy != NULL)
          {
            unlink(public_path($test->transaction_copy));

          }
          $input['transaction_copy'] = '/upload/file/'.str_slug($input['transaction_copy'],'-').'.'.$request->transaction_copy->getClientOriginalExtension();
          $request->transaction_copy->move(public_path('/upload/file'),$input['transaction_copy']);

        }
        $test -> update($input);
        return response()->json([
          'success'=> true

        ]);



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
