<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\Profile;
use Auth;
use App\Schools;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()

    {
      $schools = Schools::all();
        return view('profiles.profile' , compact('schools'));
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
            'username'=> 'required',
            'profile_pic'=> 'required|mimes:png,jpeg,jpg|max:1999',


                    ]);
                    $profile= new Profile;
                    $profile -> username = $request -> input('username');
                    $profile -> user_id = auth::user()-> id;
                    if(Input::hasFile('profile_pic')){
                        $file =Input::file('profile_pic');
                        $file->move(public_path().'/profiles/',$file->getClientOriginalName());
                        $url = URL::to("/").'/public/profiles/'.$file->getClientOriginalName();



                    }
                    $profile -> profile_pic =  $url;
                    $profile ->save();
                    return back() -> with('info', 'profile updated successfully!');
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
