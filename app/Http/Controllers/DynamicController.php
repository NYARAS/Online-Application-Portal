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


class DynamicController extends Controller
{
  public function getDynamic()

{
  return view('test.dynamic');
}
public function destroy($id)
{
  Dynamic::destroy($id);
}

public function edit($id)
{
  $dynamic = Dynamic::find($id);
  return $dynamic;
}
    public function getData()

    {


        $dynamics = Dynamic::select('dynamics_id','institution_name','academic_level','year_of_completion')->where('user_id',auth()->id())->get();
        return DataTables::of($dynamics)
            ->addColumn('action',function($dynamics){
          return '<a href="#" class="btn btn-primary btn-xs edit" id="'.$dynamics->dynamics_id.'"><i class="glyphicon glyphicon-edit"></i>Edit</a>'.
           '<a href="#" class="btn btn-danger btn-xs " onclick="deleteData('.$dynamics->dynamics_id.')"><i class="glyphicon glyphicon-trash"></i>Delete</a>'.
           '<a href="#" class="btn btn-success btn-xs " onclick="editForm('.$dynamics->dynamics_id.')"><i class="glyphicon glyphicon-trash"></i>Edit</a>';
           })
           ->make(true);
 }

    protected function validator(array $data)
    {
        return Validator::make($data, [

            'email' => 'required|string|email|max:255|unique:personals',
            'institution_name' => 'required|string|min:10|',
        ]);
    }
    public function storeDynamic(Request $request)
    {
        $this -> validate($request,[
            'institution_name'=> 'required',
            'academic_level'=> 'required',
            'year_of_completion'=> 'required',
            'file_attachment'=> 'required|mimes:pdf,doc,docx|max:1999',









                    ]);
                    //Handle file upload
                    if($request->hasFile('file_attachment')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('file_attachment')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('file_attachment')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('file_attachment')->storeAs('public/file_attachment_dynamic',$fileNameToStore1);




                    }




                    $dynamic= new Dynamic ;
                      $dynamic -> academic_level = $request -> input('academic_level');
                      $dynamic -> institution_name = $request -> input('institution_name');
                      $dynamic -> user_id = auth::user()-> id;
                      $dynamic -> email = auth::user()-> email;


                      $dynamic -> year_of_completion = $request -> input('year_of_completion');

                      $dynamic -> email = auth::user()-> email;

                      $dynamic -> file_attachment = $fileNameToStore1;

                      $dynamic ->save();
                   return back() -> with('info', 'Information Saved successfully!');
    }
      public function fetchdata(Request $request)
      {
        $id = $request->input('id');
        $dynamic = Dynamic::find($id);
        $output = array(
          'institution_name' => $dynamic->institution_name,
          'academic_level' => $dynamic->academic_level,
          'year_of_completion' => $dynamic->year_of_completion,
          'file_attachment' => $dynamic->file_attachment,


        );
        echo json_encode($output);

      }

      //=======================================================================================================================

      public function ajaxdata()
      {

          return view('test.ajax');

      }

      public function postdata(Request $request)
      {
        $validation = Validator::make($request->all(),

        [

          'institution_name'=> 'required',
          'academic_level'=> 'required',
          'year_of_completion'=> 'required',
          'file_attachment'=> 'required',

        ]);

        $error_array = array();
        $success_output = '';
        if($validation -> fails())
        {
          foreach ($validation -> messages()->getMessages() as $field_name => $messages)
           {
             $error_array[] = $messages;


          }
        }
        else {
          if ($request ->get('button_action') == "insert")
           {
          $dynamic = new Dynamic([
            $dynamic -> academic_level = $request -> input('academic_level'),
             $dynamic -> institution_name = $request -> input('institution_name'),
             $dynamic -> user_id = auth::user()-> id,
             $dynamic -> email = auth::user()-> email,
            $dynamic -> year_of_completion = $request -> input('year_of_completion'),
             $dynamic -> email = auth::user()-> email

          ]);

          $dynamic->save();
          $success_output ='<div class="alert alert-success">Data inserted</div>';


          }

        }

        $output = array(
          'error' => $error_array,
          'success' => $success_output

        );
        echo json_encode($output);
      }


}
