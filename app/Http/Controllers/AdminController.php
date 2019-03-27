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
use App\Calvine;
use Auth;
use Gate;
use PDF;
use  DataTables;

class AdminController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     public function getAdminHome()

     {


       $schools = Schools::all();
             $jobcode = Jobcode::all();
             $posts = Post::all();
             $grades = Grade::all();
             $jobcodes = Jobcode::all();
             $Jobtitles = Jobtitle::all();
       return view('Admin.admin',['grades'=>$grades,'posts'=>$posts,'Jobtitles'=>$Jobtitles,'schools'=>$schools]);

     }

     public function apiTest()

     {
       $user_id = auth()->user()->id;
       $user = User::find($user_id);


         $dynamic = User::all()
          ->where('category','management');
         return DataTables::of($dynamic)
             ->addColumn('action',function($dynamic){
           return
            '<a href="#" class="btn btn-danger btn-xs " onclick="deleteData('.$dynamic->id.')"><i class="glyphicon glyphicon-trash"></i>Remove</a>'.
            '<a href="#" class="btn btn-success btn-xs " onclick="editForm('.$dynamic->id.')"><i class="glyphicon glyphicon-trash"></i>Change</a>';
            })
            ->make(true);
     }

     public function userData()

     {
       $user_id = auth()->user()->id;
       $user = User::find($user_id);


         $dynamic = User::all()
          ->where('category','user');
         return DataTables::of($dynamic)
             ->addColumn('action',function($dynamic){
           return
            '<a href="#" class="btn btn-danger btn-xs " onclick="deleteData('.$dynamic->id.')"><i class="glyphicon glyphicon-trash"></i>Remove</a>'.
            '<a href="#" class="btn btn-success btn-xs " onclick="editForm('.$dynamic->id.')"><i class="glyphicon glyphicon-trash"></i>Change</a>';
            })
            ->make(true);
     }


     public function edit($id)
     {
       $test = User::find($id);
       return $test;
     }



     public function update(Request $request, $id)
     {
     $this -> validate($request,[








     ]);

     $input = $request -> all();
     $test = User::findOrFail($id);
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

   public function testquery($s_id)

   {
     $data = DB::table('users')
      ->join('publications', 'publications.user_id', '=','users.id')

      ->select('users.first_name','users.second_name','users.id','publications.number_of_journals','publications.number_of_books')
      ->get()->toArray();

      foreach ($data as $v)
      {
        $v -> qualifications = DB::table('personals')
              ->select('personals.*')
               ->where(['personals.id' => $s_id])
              ->where('user_id', '=',$v->id)->get()->toArray();
      }

      $qualifications = DB::table('users')

       ->join('qualifications', 'qualifications.user_id', '=','users.id')
       ->select('qualifications.*','users.first_name','users.second_name','users.id')
       ->get()->toArray();

       foreach ($qualifications as $q)
       {
         $q -> personals = DB::table('personals')
               ->select('personals.*')
               ->where(['personals.id' => $s_id])
               ->where('user_id', '=',$q->id)->get()->toArray();
       }
       $pdf = PDF::loadView('files.testquery',compact('data','qualifications'));
        return  $pdf ->setPaper('A4','landscape')-> download('applicant-full-report.pdf');

       // return view('files.testquery',compact('data','qualifications'));
   }


}
