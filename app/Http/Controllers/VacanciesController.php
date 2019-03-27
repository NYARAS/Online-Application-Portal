<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use Auth;

class VacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancy = Vacancy::orderBy('created_at','desc')->paginate(3);
       return view('vacancies.index') ->with('vacancies', $vacancy);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 return view('vacancies.create');
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
'title'=> 'required',
'body' => 'required',
'jobcode' => 'required',
'department' => 'required'

        ]);
    $vacancy= new Vacancy;
        $vacancy -> title = $request -> input('title');
          $vacancy -> body = $request -> input('body');
          $vacancy -> jobcode = $request -> input('jobcode');
          $vacancy -> department = $request -> input('department');
          $vacancy -> user_id = auth::user()-> id;
          $vacancy ->save();
        return redirect('/vacancies') -> with('info', 'vacancy Saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Vacancy::orderBy('created_at','desc')->paginate(3);
        $vacancy = Vacancy::find($id);
       return view('vacancies.show ') ->with('vacancy', $vacancy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {    $this -> validate($request,[
        'title'=> 'required',
        'body' => 'required',
        
        
                ]);
                $data = array(
'title' =>$request -> input('title'),
'body' => $request -> input('body')


                );
           Vacancy:: where ('id', $id)
           -> update($data);
             
                
                return redirect('/vacancies') -> with('info', 'vacancy updated successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $vacancy = Vacancy::find($id);
       return view('vacancies.update ') ->with('vacancy', $vacancy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vacancy:: where ('id', $id)
        -> delete();
          
             
             return redirect('/vacancies') -> with('info', 'vacancy deleted successfully!');
    }
}
