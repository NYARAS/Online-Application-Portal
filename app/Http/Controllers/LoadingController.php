<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
use App\user;
use Auth;

class LoadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loading()
    {
        return view('GetApplicants.loading');
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
    public function showdata(Request $request)
    {
      if($request -> ajax()){
          $ouput="";
          $school_id="";
          $personals = DB::table('personals')->where('first_name','LIKE','%'.$request->search.'%')->orWhere('second_name','LIKE','%'.$request->search.'%')->onWhere('id',$request->search)->get();
          if($personals)
          {
              foreach($personals as $key => $personal) 
              {
                  if ($personal->school_id==1)
                   {
                      $school_id = "School of Science";
                  }else {
                      $personal = "School of Education";
                  }
                  $ouput.='<tr>'.
                           '<td>'.$personal->id.'</td>'.
                           '<td>'.$personal->first_name." ".$personal->second_name.'</td>'.
                           '<td>'.$personal->email.'</td>'.
                           '<td>'.$personal->school_id.'</td>'.


                           '</tr>';
              }
              return Response($ouput);

          }
      }
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
