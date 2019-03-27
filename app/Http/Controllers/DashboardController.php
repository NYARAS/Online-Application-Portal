<?php

namespace App\Http\Controllers;
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
use Auth;

class DashboardController extends Controller
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
    public function index()
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
                   ->join('schools', 'posts.school_id', '=', 'schools.school_id')
                   ->join('jobtitles', 'posts.jobtitle_id', '=', 'jobtitles.jobtitle_id')
                   ->select('posts.*','schools.*','jobtitles.*')
                   ->get();

                   $schools = Schools::all();
                   $personals =Personal::all();

                   $school =DB::table('posts')
                   ->join('schools', 'posts.school_id', '=', 'schools.school_id')
                   ->join('jobtitles', 'posts.jobtitle_id', '=', 'jobtitles.jobtitle_id')
                   ->where('posts.post_id','school_id')

                   ->get();




        return view('dashboard',['profile'=> $profile,'personals'=> $personals,'posts' => $posts,'schools'=>$schools,'school'=>$school])->with('vacancies', $user->vacancies);
    }
}
