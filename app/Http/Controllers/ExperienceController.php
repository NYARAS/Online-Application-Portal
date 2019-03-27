<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;
use App\user;
use Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('experience.experience');
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
            'years'=> 'required',
            'months'=> 'required',
            'first_institution'=> 'required',
            'workedas1'=> 'required',
            'from1'=> 'required',
            'to1'=> 'required',
            'second_institution'=> 'required',
            'workedas2'=> 'required',
            'from2'=> 'required',
            'to2'=> 'required',
            'third_institution'=> 'required',
            'workedas3'=> 'required',
            'from3'=> 'required',
            'to3'=> 'required',
          
            
           
            
                    ]);
                    $experience= new Experience;
                        $experience -> years = $request -> input('years');
                        $experience -> user_id = auth::user()-> id;
                        $experience -> email = auth::user()-> email;
                        $experience -> first_name = auth::user()-> first_name;
                        $experience -> second_name = auth::user()-> second_name;
                        $experience -> last_name = auth::user()-> last_name;
                        $experience -> months = $request -> input('months');
                        $experience -> first_institution = $request -> input('first_institution');
                        $experience -> workedas1 = $request -> input('workedas1');
                        $experience -> from1 = $request -> input('from1');
                        $experience -> to1 = $request -> input('to1');
                        $experience -> second_institution = $request -> input('second_institution');
                        $experience -> workedas2 = $request -> input('workedas2');
                        $experience -> from2 = $request -> input('from2');
                        $experience -> to2 = $request -> input('to2');
                        $experience -> third_institution = $request -> input('third_institution');
                        $experience -> workedas3 = $request -> input('workedas3');
                        $experience -> from3 = $request -> input('from3');
                        $experience -> to3 = $request -> input('to3');
                            $experience ->save();
            return redirect('/publication') -> with('info', 'Information saved successfully!');
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
