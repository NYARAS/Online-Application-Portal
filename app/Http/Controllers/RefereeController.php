<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Referee;

use App\user;
use Auth;
use Mail;
use App\Mail\ApplicationConfirmation;

class RefereeController extends Controller
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
        return view('Referees.referees');
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
            'referee_one'=> 'required',
            'referee_one_recommendation'=> 'required|mimes:pdf,doc,docx|max:1999',
            'referee_two'=> 'required',
            'referee_two_recommendation'=> 'required|mimes:pdf,doc,docx|max:1999',
            'referee_three'=> 'required',
            'referee_three_recommendation'=>'required|mimes:pdf,doc,docx|max:1999',
          
          
            
           
            
                    ]);
                    //Handle file upload
                    if($request->hasFile('referee_one_recommendation')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('referee_one_recommendation')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('referee_one_recommendation')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('referee_one_recommendation')->storeAs('public/Referees',$fileNameToStore);




                    }
                    if($request->hasFile('referee_two_recommendation')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('referee_two_recommendation')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('referee_two_recommendation')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('referee_two_recommendation')->storeAs('public/Referees',$fileNameToStore);




                    }
                    if($request->hasFile('referee_three_recommendation')){
                        //Get filename with extension
                        $filenameWithExt = $request->file('referee_three_recommendation')->getClientOriginalName();
                        //Get just filename
                        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
                        //Get just ext
                        $extension = $request ->file('referee_three_recommendation')->getClientOriginalExtension();
                        //filename to store
                        $fileNameToStore = $filename.'_'.time().'.'.$extension;
                        //Upload file
                        $path = $request->file('referee_three_recommendation')->storeAs('public/Referees',$fileNameToStore);




                    
                   



                    }
                    $referee= new Referee;
                    $referee -> referee_one = $request -> input('referee_one');
                    $referee -> referee_one_recommendation = $fileNameToStore;
                    $referee -> user_id = auth::user()-> id;
                    $referee -> email = auth::user()-> email;
                    $referee -> first_name = auth::user()-> first_name;
                    $referee -> second_name = auth::user()-> second_name;
                    $referee -> last_name = auth::user()-> last_name;
                    $referee -> referee_two = $request -> input('referee_two');
                    $referee -> referee_two_recommendation = $fileNameToStore;
                    $referee -> referee_three = $request -> input('referee_three');
                    $referee -> referee_three_recommendation = $fileNameToStore;
                  
               if($referee ->save())
               {
                   Mail::to(Auth::user()->email)->send(new ApplicationConfirmation());


                return redirect('/terms') -> with('info', 'Information Saved successfully!');
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
