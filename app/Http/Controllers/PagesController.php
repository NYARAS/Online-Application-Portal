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
use App\Terms;
use Auth;
use PDF;

class PagesController extends Controller
{
	public function getIndex()
	{
		$user_id = auth()->user()->id;
        $user = User::find($user_id);
        $schools = Schools::all();
        $jobcode = Jobcode::all();
        $posts = Post::all();
		$grades = Grade::all();
		$terms = DB::table('terms')->where('user_id',auth()->id())->get();
        $jobcodes = Jobcode::all();
		return view('Pages.index',compact('terms'));
	}
	public function getContact(){
return view('Pages.contactPage');
	}
	
		
	public function getServices(){
return view('Pages.services');
	}
	public function getExperience(){
		return view('Pages.experience');
			}
	public function getAbout(){
return view ('Pages.about');
	}
	public function postContact(){

	}
}