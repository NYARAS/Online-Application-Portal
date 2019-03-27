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
use App\Jobtitle;
use App\Personal;
use Gate;
use App\Grade;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function post()
    {
      if(!Gate::allows('isAdmin'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
         $schools = Schools::all();
          $jobcode = Jobcode::all();
        $user_id = Auth::user()->id;
        $profile = DB::table('users')
                   ->join('profiles', 'users.id', '=','profiles.user_id')
                   ->select('users.*', 'profiles.*')
                   ->where(['profiles.user_id'=>$user_id])
                   ->first();


        return view('jobcategory.post',['profile'=> $profile,'schools' => $schools,'jobcode'=>$jobcode]);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobcategory.test');
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
        'jobcode_id'=> 'required',
        'post_title'=> 'required',
        'school_id'=> 'required',
        'post_body'=> 'required',




                ]);
                $posts= new Post;
                    $posts -> jobcode_id = $request -> input('jobcode_id');
                    $posts -> user_id = auth::user()-> id;
                    $posts -> post_title = $request -> input('post_title');
                    $posts -> school_id = $request -> input('school_id');
                    $posts -> post_body = $request -> input('post_body');
                        $posts ->save();
                        if(!Gate::allows('isAdmin'))
                        {
                            return redirect('/dashboard')->with('error', 'Unauthorised page');
                        }
        return redirect('/dashboard') -> with('info', 'Post/Vacancy Saved successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($post_id)
    {
      $posts = Post::where('post_id', '=', $post_id)->get();
      $schools = Schools::all();
      $comments =DB::table('users')
      ->join('comments', 'users.id', '=', 'comments.user_id')
      ->join('posts', 'comments.post_id', '=', 'posts.post_id')
      ->select('users.first_name','comments.*')
      ->where(['posts.post_id' => $post_id])
      ->get();
      $school =DB::table('posts')
      ->join('schools', 'posts.school_id', '=', 'schools.school_id')
      ->join('jobtitles', 'posts.jobtitle_id', '=', 'jobtitles.jobtitle_id')

      ->get();
      $likePost = Post::find($post_id);
      $likeCtr = Like::where(['post_id' => $likePost->post_id])->count();
      $dislikeCtr = Dislike::where(['post_id' => $likePost->post_id])->count();

      return view('jobcategory.view',['posts'=>$posts,'schools'=>$schools,'school'=>$school,'comments'=>$comments,'likeCtr'=>$likeCtr,'dislikeCtr'=>$dislikeCtr]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if(!Gate::allows('isAdmin'))
      {
          return redirect('/dashboard')->with('error', 'Unauthorised page');
      }
        $schools = Schools::all();
        $jobcode = Jobcode::all();
        $Jobtitles = Jobtitle::all();
        $posts = Post::find($id);
        $user_id = Auth::user()->id;
        $profile = DB::table('users')
                   ->join('profiles', 'users.id', '=','profiles.user_id')
                   ->select('users.*', 'profiles.*')
                   ->where(['profiles.user_id'=>$user_id])
                   ->first();
       $jobcodes =Jobcode::find($posts->jobcode_id);
        $school = Schools::find($posts->school_id);
        $jobtitle = Jobtitle::find($posts->jobtitle_id);

        return view ('jobcategory.edit',['profile'=> $profile,'schools'=> $schools,'jobcode'=> $jobcode,'Jobtitles'=>$Jobtitles,'jobtitle'=>$jobtitle,'posts'=> $posts,'school'=> $school,'jobcodes'=> $jobcodes]);

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
            'jobcode_id'=> 'required',
            'jobtitle_id'=> 'required',
            'school_id'=> 'required',
            'post_body'=> 'required',




                    ]);
                    $posts= new Post;
                        $posts -> jobcode_id = $request -> input('jobcode_id');
                        $posts -> user_id = auth::user()-> id;
                        $posts -> jobtitle_id = $request -> input('jobtitle_id');
                        $posts -> school_id = $request -> input('school_id');
                        $posts -> post_body = $request -> input('post_body');
                        $data = array(
                            'jobcode_id' => $posts -> jobcode_id,
                            'jobtitle_id' =>  $posts -> jobtitle_id,
                            'user_id' =>  $posts -> user_id,
                            'school_id' =>  $posts -> school_id ,
                            'post_body' => $posts -> post_body,



                        );
                        Post:: where ('post_id', $id)
                        -> update($data);
                            $posts ->update();
                            if(!Gate::allows('isAdmin'))
                            {
                                return redirect('/dashboard')->with('error', 'Unauthorised page');
                            }

            return redirect('/dashboard') -> with('info', 'Post/Vacancy updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post:: where ('post_id', $id)
        -> delete();
        if(!Gate::allows('isAdmin'))
        {
            return redirect('/dashboard')->with('error', 'Unauthorised page');
        }
        return redirect('/dashboard') -> with('info', 'Post/Vacancy deleted successfully!');
    }
    public function show($s_id){

    $schools = Schools::all();
    $posts =DB::table('posts')
            ->join('jobcodes', 'posts.jobcode_id', '=', 'jobcodes.jobcode_id')
            ->join('schools', 'schools.school_id', '=', 'jobcodes.school_id')
            ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
            ->select('posts.*','schools.*','jobcodes.*','jobtitles.*')
            ->where(['schools.school_id' => $s_id])
            ->get();

    return view('school.schools',['schools'=>$schools,'posts'=>$posts]);
}
public function like($id){
    $loggedin_user = Auth::user()->id;
    $like_user = Like::where(['user_id' => $loggedin_user, 'post_id'=>$id])->first();
    if(empty($like_user->user_id)){
        $user_id = Auth::user()->id;
        $emal = Auth::user()->email;
        $post_id = $id;
        $like = new Like;
        $like->user_id = $user_id;
        $like->email = $emal;
        $like->post_id = $post_id;
        $like->save();
        return redirect("/view/{$id}");
    }
    else{
        return redirect("/view/{$id}");
    }


}
public function dislike($id){
    $loggedin_user = Auth::user()->id;
    $like_user = Dislike::where(['user_id' => $loggedin_user, 'post_id'=>$id])->first();
    if(empty($like_user->user_id)){
        $user_id = Auth::user()->id;
        $emal = Auth::user()->email;
        $post_id = $id;
        $like = new Dislike;
        $like->user_id = $user_id;
        $like->email = $emal;
        $like->post_id = $post_id;
        $like->save();
        return redirect("/view/{$id}");
    }
    else{
        return redirect("/view/{$id}");
    }


}
public function comment(Request $request, $post_id){
    $this -> validate($request,[
        'comment'=> 'required|max:255',


    ]);
    $comment = new Comments;
    $comment -> comment = $request->input('comment');
    $comment->user_id = Auth::user()->id;
    $comment->post_id=$post_id;
    $comment->save();
    return redirect("/view/{$post_id}")-> with('info', 'Comment posted  successfully!');

}


public function apply(Request $request, $post_id){
    $this -> validate($request,[
        'comment'=> 'required|max:255',


    ]);
    $comment = new Comments;
    $comment -> comment = $request->input('comment');
    $comment->user_id = Auth::user()->id;
    $comment->post_id=$post_id;
    $comment->save();
    return redirect("/view/{$post_id}")-> with('info', 'Comment posted  successfully!');

}


public function search(Request $request){

    $user_id = Auth::user()->id;
    $profile = DB::table('users')
    ->join('profiles', 'users.id', '=','profiles.user_id')
    ->select('users.*', 'profiles.*')
    ->where(['profiles.user_id'=>$user_id])
    ->first();
    $keyword = $request->input('search');
    $posts =DB::table('posts')
                 ->join('jobcodes', 'posts.jobcode_id', '=', 'jobcodes.jobcode_id')
                ->join('schools', 'schools.school_id', '=', 'jobcodes.school_id')
                ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
                ->select('posts.*','schools.*','jobcodes.*','jobtitles.*')
                ->where('job_title',  'LIKE','%'.$keyword.'%')->get();
    return view('jobcategory.searchposts',['profile'=>$profile,'posts'=>$posts]);
}

public function getManagePosts()

{
  if(!Gate::allows('isAdmin'))
  {
      return redirect('/dashboard')->with('error', 'Unauthorised page');
  }
    $schools = Schools::all();
    $grades = Grade::all();
    $jobcodes = Jobcode::all();
    $posts = Post::all();
    $user_id = Auth::user()->id;
    $profile = DB::table('users')
               ->join('profiles', 'users.id', '=','profiles.user_id')

               ->select('users.*', 'profiles.*')
               ->where(['profiles.user_id'=>$user_id])
               ->first();

               $qualifications = DB::table('users')
                          ->join('schools', 'users.id', '=','schools.user_id')
                          ->select('users.*', 'schools.*')
                          ->where(['schools.user_id'=>$user_id])
                          ->get();

    $Jobtitles = Jobtitle::orderBy('jobtitle_id','DESC')->get();


    return view ('posts.manageVacancies',compact('schools','Jobtitles','grades','jobcodes','posts','profile','qualifications' ));
}


   //==================================================

   public function postInsertSchool(Request $request)
   {

       if($request->ajax()){
           return response(Schools::create($request->all()));
       }
   }

   //===================================================


   public function postInsertJobTitle(Request $request)
   {
       if($request->ajax()){
           return response(Jobtitle::create($request->all()));
       }
   }

    //===================================================

    public function postInsertJobcode(Request $request)
    {
        if($request->ajax()){
            return response(Jobcode::create($request->all()));
        }
    }

    public function showJobcode(Request $request)
    {
        if($request->ajax()){
            return response(Jobcode::where('school_id',$request->school_id)->get());
        }
    }

    //===================================================================
    public function insertGrade(Request $request)
    {
        if($request->ajax()){
            return response(Grade::create($request->all()));
        }
    }


    public function createPost(Request $request)
    {


     {
         $this -> validate($request,[
         'jobtitle_id'=> 'required',
         'jobcode_id'=> 'required',
         'post_body'=> 'required',
         'grade_id'=> 'required',
         'school_id'=> 'required',




                 ]);
                 $posts= new Post;
                     $posts -> jobtitle_id = $request -> input('jobtitle_id');
                     $posts -> user_id = auth::user()-> id;
                     $posts -> jobcode_id = $request -> input('jobcode_id');
                     $posts -> school_id = $request -> input('school_id');
                     $posts -> post_body = $request -> input('post_body');
                     $posts -> grade_id = $request -> input('grade_id');

                         $posts ->save();
                         if(!Gate::allows('isAdmin'))
                         {
                             return redirect('/dashboard')->with('error', 'Unauthorised page');
                         }
                            return back()-> with('info', 'Post created successfully!');

     }

    }
    //=================================================================

      //=================================================================
   public function showPostInformation(Request $request)
   {
       if($request->jobtitle_id!="" && $request->school_id=="")
       {
           $criterial = array('jobtitles.jobtitle_id' => $request->jobtitle_id);

       }elseif($request->jobtitle_id!="" &&
       $request->school_id!=""&&
        $request->jobcode_id!="" &&
        $request->grade_id!="")
    {
        $criterial = array('jobtitles.jobtitle_id' => $request->jobtitle_id,
                           'schools.school_id' => $request->school_id,
                           'jobcodes.jobcode_id' => $request->jobcode_id,
                           'grades.grade_id' => $request->grade_id);

    }

    $posts = $this->PostInformation($criterial)->get();
    return view('postInfo.postInfo',compact('posts'));

   }

   //====================================================================
   public function PostInformation($criterial)
   {
       return Post::join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
                          ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
                          ->join('schools','schools.school_id','=','jobcodes.school_id')

                          ->join('grades','grades.grade_id','=','posts.grade_id')

                          ->where($criterial)
                          ->orderBy('posts.post_id','DESC');



   }

   //============================================================

   public function deletePost(Request $request)
   {
    if($request->ajax())
    {
       return Post::destroy($request->post_id);
    }
   }

   //============================================================

     public function editPost(Request $request)
     {
         if($request->ajax())
         {
            return response(Post::find($request->post_id));
         }
     }
  //=====================================================================
     public function updatePost(Request $request)
     {
         if($request->ajax())
         {
            return response(Post::updateOrCreate(['post_id'=>$request->post_id],$request->all()));
         }
     }

     //============================================ADMIN VIEW============================
     public function adminview()
     {
       $user_id = auth()->user()->id;
       $user = User::find($user_id);
         $user_id = Auth::user()->id;
       $profile = DB::table('users')
                  ->join('profiles', 'users.id', '=','profiles.user_id')
                  ->select('users.*', 'profiles.*')
                  ->where(['profiles.user_id'=>$user_id])
                  ->first();


                  $posts =DB::table('posts')
                  ->join('jobcodes', 'posts.jobcode_id', '=', 'jobcodes.jobcode_id')
                  ->join('schools', 'schools.school_id', '=', 'jobcodes.school_id')
                  ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
                  ->join('grades', 'posts.grade_id', '=', 'grades.grade_id')
                  ->select('posts.*','schools.*','jobtitles.*','jobcodes.*','grades.*')
                  ->get();

                  $qualifications = DB::table('users')
                             ->join('schools', 'users.id', '=','schools.user_id')
                             ->select('users.*', 'schools.*')
                             ->where(['schools.user_id'=>$user_id])
                             ->get();

                  $schools = Schools::all();
                  $personals =Personal::all();




       return view('posts.view',['profile'=> $profile,'qualifications'=> $qualifications,'personals'=> $personals,'posts' => $posts,'schools'=>$schools]);
     }

     public function admindestroy($id)
     {
         Post:: where ('post_id', $id)
         -> delete();
         if(!Gate::allows('isAdmin'))
         {
             return redirect('/dashboard')->with('error', 'Unauthorised page');
         }
         return back() -> with('info', 'Post/Vacancy deleted successfully!');
     }



}
