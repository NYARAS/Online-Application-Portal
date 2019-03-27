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
use App\Qualification;
use App\Publication;
use App\Like;
use App\Dislike;
use App\Comments;
use App\Grade;
use App\Jobtitle;
use App\Status;
use App\Laptop;
use App\user;
use Auth;
use Gate;

class PersonalController extends Controller
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

    public function personal()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $schools = Schools::all();
        $jobcode = Jobcode::all();
        $posts = Post::all();
        $grades = Grade::all();
        $jobcodes = Jobcode::all();


        $Jobtitles = Jobtitle::orderBy('jobtitle_id','DESC')->get();


    $personals = DB::table('personals')->where('user_id',auth()->id())->get();






        return view('Personal.personal',['personals'=>$personals,'grades'=>$grades,'posts'=>$posts,'Jobtitles'=>$Jobtitles,'schools'=>$schools] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apply($post_id)
    {
    $posts = Post::where('post_id', '=', $post_id)->get();

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


    return view('jobcategory.test',['posts'=>$posts,'schools'=>$schools,'comments'=>$comments]);
  }

  public function comment(Request $request, $post_id){
      $this -> validate($request,[

        'cover_letter'=> 'required',



        'curriculum_vitae'=> 'required',
            ]);

        if($request->hasFile('cover_letter')){
            //Get filename with extension
            $filenameWithExt = $request->file('cover_letter')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request ->file('cover_letter')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
            //Upload file
            $path = $request->file('cover_letter')->storeAs('public/cover_letters',$fileNameToStore1);




        }
        if($request->hasFile('curriculum_vitae')){
            //Get filename with extension
            $filenameWithExt = $request->file('curriculum_vitae')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            //Get just ext
            $extension = $request ->file('curriculum_vitae')->getClientOriginalExtension();
            //filename to store
            $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
            //Upload file
            $path = $request->file('curriculum_vitae')->storeAs('public/curriculum_vitae',$fileNameToStore2);




        }



      $comment = new Laptop;

      $comment->user_id = Auth::user()->id;
      $comment->post_id=$post_id;
      $comment->dob = $request->input('dob');
      ;
      $comment->date_applied = $request->input('date_applied');

      $comment -> nationality = $request -> input('nationality');
      $comment->secondary_phone_number = $request-> input('secondary_phone_number');
      $comment -> primary_phone_number = $request -> input('primary_phone_number');
      $comment -> national_id_card = $request -> input('national_id_card');
      $comment->passport = $request-> input('passport');

      // $personal -> applicant_photo = $fileNameToStore;
      $comment -> cover_letter = $fileNameToStore1;
      $comment -> curriculum_vitae = $fileNameToStore2;

      if(Input::hasFile('applicant_photo')){
          $file =Input::file('applicant_photo');
          $file->move(public_path().'/applicant_photo/',$file->getClientOriginalName());
          $url = URL::to("/").'/public/applicant_photo/'.$file->getClientOriginalName();
        }
      $comment -> applicant_photo =  $url;
      $comment->save();
      return back()-> with('info', 'Comment posted  successfully!');

  }


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





    public function getDownload()
    {

        $personal = DB::table('personals')->get();
        return view('Personal.viewfile',compact('personal'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'email' => 'required|string|email|max:255|unique:personals',
            'mobileno' => 'required|string|min:10|',
        ]);
    }
    public function storePersonal(Request $request)
    {
        $this -> validate($request,[
            'current_address'=> 'required',
            'country'=> 'required',
            'province'=> 'required',
            'primary_phone_number'=>'required|regex:/(07)[0-9]{8}/',
            'primary_phone_number'=>'regex:/(07)[0-9]{8}/',
            'applicant_photo'=> 'required',
            'cover_letter'=> 'required',
            'dob'=> 'required',
            'status'=> 'required',
            'date_applied' => 'required',
            'post_id' => 'required',
            'curriculum_vitae'=> 'required',




                    ]);
                    // if($request->hasFile('applicant_photo')){
                    //     //Get filename with extension
                    //     $filenameWithExt = $request->file('applicant_photo')->getClientOriginalName();
                    //     //Get just filename
                    //     $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                    //     //Get just ext
                    //     $extension = $request ->file('applicant_photo')->getClientOriginalExtension();
                    //     //filename to store
                    //     $fileNameToStore = $filename.'_'.time().'.'.$extension;
                    //     //Upload file
                    //     $path = $request->file('applicant_photo')->storeAs('public/applicant_photos',$fileNameToStore);
                    //
                    //
                    //
                    //
                    // }
                    if($request->hasFile('cover_letter')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('cover_letter')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('cover_letter')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore1 = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('cover_letter')->storeAs('public/cover_letters',$fileNameToStore1);




                    }
                    if($request->hasFile('curriculum_vitae')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('curriculum_vitae')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('curriculum_vitae')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore2 = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('curriculum_vitae')->storeAs('public/curriculum_vitae',$fileNameToStore2);




                    }
                    $personal= new Personal;
                        $personal -> current_address = $request -> input('current_address');
                        $personal -> user_id = auth::user()-> id;
                        $personal -> first_name = auth::user()-> first_name;
                        $personal -> second_name = auth::user()-> second_name;
                        $personal -> last_name = auth::user()-> last_name;
                        $personal->dob = $request->input('dob');
                        $personal->status = $request->input('status');
                        $personal->date_applied = $request->input('date_applied');
                        $personal -> country = $request -> input('country');
                        $personal -> province = $request -> input('province');
                        $personal->secondary_phone_number = $request->secondary_phone_number;
                        $personal -> primary_phone_number = $request -> input('primary_phone_number');
                        // $personal -> applicant_photo = $fileNameToStore;
                        $personal -> cover_letter = $fileNameToStore1;
                        $personal -> curriculum_vitae = $fileNameToStore2;

                        if(Input::hasFile('applicant_photo')){
                            $file =Input::file('applicant_photo');
                            $file->move(public_path().'/applicant_photo/',$file->getClientOriginalName());
                            $url = URL::to("/").'/public/applicant_photo/'.$file->getClientOriginalName();
                          }
                            $personal -> applicant_photo =  $url;
                        if($personal->save())
                        {
                            $applicant_id = $personal->applicant_id;
                            Status::insert(['applicant_id'=>$applicant_id,'post_id'=>$request->post_id]);


                            return redirect()->route('getQualifications') -> with('info', 'Information Saved successfully!');
                        }

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
    public function editpersonal($id)
    {

            $schools = Schools::all();
            $jobcode = Jobcode::all();
            $post = Post::all();
            $personals = Personal::find($id);
            $user_id = Auth::user()->id;
            $profile = DB::table('users')
                       ->join('profiles', 'users.id', '=','profiles.user_id')
                       ->select('users.*', 'profiles.*')
                       ->where(['profiles.user_id'=>$user_id])
                       ->first();
         $posts = Post::find($personals->post_id);
            $school = Schools::find($personals->school_id);
            return view ('Personal.editpersonal',['profile'=> $profile,'post'=> $post,'posts'=> $posts,'schools'=> $schools,'jobcode'=> $jobcode,'personals'=> $personals,'school'=> $school]);


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
            'paddress'=> 'required',
            'school_id'=> 'required',
            'post_id'=> 'required',
            'country'=> 'required',
            'city'=> 'required',
            'mobileno'=> 'required',
            'photo_image'=> 'required',
            'cover_letter'=> 'required',
            'boxnumber'=> 'required',

            'file_cv'=> 'required',




                    ]);
                    $personal= new Personal;
                        $personal -> paddress = $request -> input('paddress');
                        $personal -> user_id = auth::user()-> id;
                        $personal -> email = auth::user()-> email;
                        $personal -> school_id = $request -> input('school_id');
                        $personal -> post_id = $request -> input('post_id');
                        $personal -> country = $request -> input('country');
                        $personal -> boxnumber = $request -> input('boxnumber');
                        $personal -> city = $request -> input('city');
                        $personal -> mobileno = $request -> input('mobileno');
                        if(Input::hasFile('photo_image')){
                            $file =Input::file('photo_image');
                            $file->move(public_path().'/photoimage/',$file->getClientOriginalName());
                            $url = URL::to("/").'/photoimage/'.$file->getClientOriginalName();



                        }
                        $personal -> photo_image =  $url;
                        if(Input::hasFile('cover_letter')){
                            $file =Input::file('cover_letter');
                            $file->move(public_path().'/cover_letter/',$file->getClientOriginalName());
                            $url = URL::to("/").'/cover_letter/'.$file->getClientOriginalName();



                        }
                        $personal -> cover_letter =  $url;
                        if(Input::hasFile('file_cv')){
                            $file =Input::file('file_cv');
                            $file->move(public_path().'/cv_files/',$file->getClientOriginalName());
                            $url = URL::to("/").'/cv_files/'.$file->getClientOriginalName();



                        }
                        $personal -> file_cv =  $url;
                        Personal:: where ('id', $id)
                        -> update($data);
                            $personal ->update();
            return redirect('/dashboard') -> with('info', 'Information Saved successfully!');
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

    //==========================================show user infomation
public function userInfo(Request $request)
{
  if(!Gate::allows('isAdmin'))
  {
      return redirect('/dashboard')->with('error', 'Unauthorised page');
  }
    if($request ->has('search'))
    {
        $schools = Schools::all();
    $jobcode = Jobcode::all();
    $posts = Post::all();
    $grades = Grade::all();
    $jobcodes = Jobcode::all();
        $personals = User::where('id',$request->search)
                             ->Orwhere('first_name',"LIKE","%".$request->search."%")
                             ->Orwhere('second_name',"LIKE","%".$request->search."%")
                             ->select(DB::raw('id,
                                              first_name,
                                              second_name,
                                              CONCAT(first_name," ",second_name) AS full_name,

                                              gender,email'))

                                              ->paginate(10)
                                              ->appends('search',$request->search);

    }
    else
    {
      if(!Gate::allows('isAdmin'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
        $schools = Schools::all();
        $jobcode = Jobcode::all();
        $posts = Post::all();
        $grades = Grade::all();
        $jobcodes = Jobcode::all();
        $personals = User::select(DB::raw('id,
                                              first_name,
                                              second_name,
                                              CONCAT(first_name," ",second_name) AS full_name,

                                              gender,email'))
                                              ->where('user_type','user')

                                              ->paginate(10);

    }

    return view('RegisteredUsers.usersList',compact('personals','schools'));


}

public function mngInfo(Request $request)
{
  if(!Gate::allows('isAdmin'))
  {
      return redirect('/dashboard')->with('error', 'Unauthorised page');
  }
    if($request ->has('search'))
    {
        $schools = Schools::all();
    $jobcode = Jobcode::all();
    $posts = Post::all();
    $grades = Grade::all();
    $jobcodes = Jobcode::all();
        $personals = User::where('id',$request->search)
                             ->Orwhere('first_name',"LIKE","%".$request->search."%")
                             ->Orwhere('second_name',"LIKE","%".$request->search."%")
                             ->select(DB::raw('id,
                                              first_name,
                                              second_name,
                                              CONCAT(first_name," ",second_name) AS full_name,

                                              gender,email'))

                                              ->paginate(10)
                                              ->appends('search',$request->search);

    }
    else
    {
      if(!Gate::allows('isAdmin'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
        $schools = Schools::all();
        $jobcode = Jobcode::all();
        $posts = Post::all();
        $grades = Grade::all();
        $jobcodes = Jobcode::all();
        $personals = User::select(DB::raw('id,
                                              first_name,
                                              second_name,
                                              CONCAT(first_name," ",second_name) AS full_name,

                                              gender,email'))
                                              ->where('user_type','manager')

                                              ->paginate(10);

    }

    return view('RegisteredUsers.managementList',compact('personals','schools'));


}

//==================================================

public function managementRegister(Request $request)
{
  if(!Gate::allows('isAdmin'))
  {
      return redirect('/dashboard')->with('error', 'Unauthorised page');
  }
    if($request->ajax()){
        return response(User::create($request->all()));
    }
}

//===================================================
}
