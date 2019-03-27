<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
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
use DB;
use Auth;

class InterviewLetter extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $personals = DB::table('statuses')
        ->join('posts','posts.post_id','=','statuses.post_id')
        ->join('personals','personals.applicant_id','=','statuses.applicant_id')
        ->join('users','users.id','=','personals.user_id')
        ->join('jobcodes','jobcodes.jobcode_id','=','posts.jobcode_id')
        ->join('schools','schools.school_id','=','jobcodes.school_id')
        ->join('jobtitles','jobtitles.jobtitle_id','=','posts.jobtitle_id')
        ->join('grades','grades.grade_id','=','posts.grade_id')
                     ->select('posts.post_id as pos_id',
                              'jobtitles.job_title',
                              'schools.school',
                              'personals.status'


                     )
                     ->where('users.id',$this->user->id)
                     ->get();
        return $this->from('admin@onlineapplication.ac.ke')
                    ->subject('Interview Letter')
                          ->view('email.interviewletter')
                          
                          ->with(['user'=>$this->user,'letters'=>$personals])
                          ->attachData($this->user, 'name.pdf', [
                            'mime' => 'application/pdf',
                        ]);
                          
                          
    }
}
