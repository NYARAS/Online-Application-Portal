<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Publication;

use App\Schools;
use App\Jobcode;
use App\Post;
use App\Profile;
use App\Personal;
use App\Qualification;

use App\Like;
use App\Dislike;
use App\Comments;
use App\Grade;
use App\Jobtitle;
use App\Status;
use App\user;
use Gate;
use DataTables;
use Auth;

class PublicationController extends Controller
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
  return view('Application.publi-referee');
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
          'name_of_referee'=> 'required',
          'recommendation_letter'=> 'required|mimes:pdf|max:1999',






      ]);
      $input = $request->all();
      $input['list_of_journals'] = null;
        $input['list_of_books'] = null;
          $input['recommendation_letter'] = null;

      if($request -> hasFile('list_of_journals'))
      {
        $input['list_of_journals'] = '/upload/Journals/'.str_slug($input['number_of_journals'],'-').'.'.$request->list_of_journals->getClientOriginalExtension();
        $request->list_of_journals->move(public_path('/upload/Journals'),$input['list_of_journals']);

      }

      if($request -> hasFile('list_of_books'))
      {
        $input['list_of_books'] = '/upload/Books/'.str_slug($input['number_of_books'],'-').'.'.$request->list_of_books->getClientOriginalExtension();
        $request->list_of_books->move(public_path('/upload/Books'),$input['list_of_books']);

      }
      if($request -> hasFile('recommendation_letter'))
      {
        $input['recommendation_letter'] = '/upload/referee/'.str_slug($input['name_of_referee'],'-').'.'.$request->recommendation_letter->getClientOriginalExtension();
        $request->recommendation_letter->move(public_path('/upload/referee'),$input['recommendation_letter']);

      }

      Publication::create($input);
      return back()-> with('info', 'Information saved successfully!');
    }
    public function apiTest()

    {
      $user_id = auth()->user()->id;
      $user = User::find($user_id);


        $dynamic = Publication::all()->where('user_id',auth()->id());
        return DataTables::of($dynamic)
            ->addColumn('action',function($dynamic){
          return
           '<a href="#"  class="waves-effect waves-light btn-small red " " onclick="deleteData('.$dynamic->id.')"><i class="glyphicon glyphicon-trash"></i>Delete</a>'.

           '<a href="#" class="waves-effect waves-light btn-small blue " onclick="editForm('.$dynamic->id.')"><i class="glyphicon glyphicon-trash"></i>Edit</a>';
           })
           ->make(true);
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
      $test = Publication::find($id);
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
          'name_of_referee'=> 'required',
          'recommendation_letter'=> 'required|mimes:pdf|max:1999',






      ]);

      $input = $request -> all();
      $test = Publication::findOrFail($id);
      $inpu['list_of_journals'] = $test-> list_of_journals;
      $inpu['list_of_books'] = $test-> list_of_books;
      $inpu['recommendation_letter'] = $test-> recommendation_letter;

            if($request -> hasFile('list_of_journals'))

          {
            if($test -> list_of_journals != NULL)
            {
              unlink(public_path($test->list_of_journals));

            }
            $input['list_of_journals'] = '/upload/Journals/'.str_slug($input['number_of_journals'],'-').'.'.$request->list_of_journals->getClientOriginalExtension();
            $request->list_of_journals->move(public_path('/upload/Journals'),$input['list_of_journals']);

          }

          if($request -> hasFile('list_of_books'))

        {
          if($test -> list_of_books != NULL)
          {
            unlink(public_path($test->list_of_books));

          }
          $input['list_of_books'] = '/upload/Books/'.str_slug($input['number_of_books'],'-').'.'.$request->list_of_books->getClientOriginalExtension();
          $request->list_of_books->move(public_path('/upload/Books'),$input['list_of_books']);

        }

        if($request -> hasFile('recommendation_letter'))

      {
        if($test -> recommendation_letter != NULL)
        {
          unlink(public_path($test->recommendation_letter));

        }
        $input['recommendation_letter'] = '/upload/referee/'.str_slug($input['name_of_referee'],'-').'.'.$request->recommendation_letter->getClientOriginalExtension();
        $request->recommendation_letter->move(public_path('/upload/referee'),$input['recommendation_letter']);

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
      $test = Publication::findOrFail($id);
      if($test -> list_of_journals != NULL)
      {
        unlink(public_path($test->list_of_journals));

      }
      if($test -> list_of_books != NULL)
      {
        unlink(public_path($test->list_of_books));

      }
      if($test -> recommendation_letter != NULL)
      {
        unlink(public_path($test->recommendation_letter));

      }

      Publication::destroy($id);
      return response()->json([
        'success'=> true

      ]);
    }
}
