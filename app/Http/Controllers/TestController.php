<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Schools;
use App\Jobcode;
use App\Post;
use App\Profile;
use App\Personal;
use App\Dynamic;
use App\Qualification;
use App\Publication;
use App\Like;
use App\Dislike;
use App\Comments;
use App\Grade;
use App\Jobtitle;
use App\Status;
use App\user;
use Auth;
use Gate;
use DataTables;
use Validator;
use App\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('test.ajaxtest');
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
          'academic_level'=> 'required',
          'file_attachment'=> 'required|mimes:pdf|max:1999',






      ]);
      $input = $request->all();
      $input['file_attachment'] = null;

      if($request -> hasFile('file_attachment'))
      {
        $input['file_attachment'] = '/upload/file/'.str_slug($input['academic_level'],'-').'.'.$request->file_attachment->getClientOriginalExtension();
        $request->file_attachment->move(public_path('/upload/file'),$input['file_attachment']);

      }

      Test::create($input);
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
      $test = Test::find($id);
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
          'academic_level'=> 'required',
          'file_attachment'=> 'required|mimes:pdf|max:1999',






      ]);

      $input = $request -> all();
      $test = Test::findOrFail($id);
      $inpu['file_attachment'] = $test-> file_attachment;

            if($request -> hasFile('file_attachment'))

          {
            if($test -> file_attachment != NULL)
            {
              unlink(public_path($test->file_attachment));

            }
            $input['file_attachment'] = '/upload/file/'.str_slug($input['academic_level'],'-').'.'.$request->file_attachment->getClientOriginalExtension();
            $request->file_attachment->move(public_path('/upload/file'),$input['file_attachment']);

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
         $test = Test::findOrFail($id);
         if($test -> file_attachment != NULL)
         {
           unlink(public_path($test->file_attachment));

         }

         Test::destroy($id);
         return response()->json([
           'success'=> true

         ]);


     }

    public function apiTest()

    {


        $test = Test::select('id','institution_name','academic_level','year_of_completion');
        return DataTables::of($test)
            ->addColumn('action',function($test){
          return '<a href="#" class="btn btn-primary btn-xs edit" id="'.$test->id.'"><i class="glyphicon glyphicon-edit"></i>Edit</a>'.
           '<a href="#" class="btn btn-danger btn-xs " onclick="deleteData('.$test->id.')"><i class="glyphicon glyphicon-trash"></i>Delete</a>'.
           '<a href="#" class="btn btn-success btn-xs " onclick="editForm('.$test->id.')"><i class="glyphicon glyphicon-trash"></i>Edit</a>';
           })
           ->make(true);
 }
}
