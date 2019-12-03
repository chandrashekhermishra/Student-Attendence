<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
         $data = Classes::latest()->paginate(9);
  
        return view('Class_info.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('class_info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required',
            'number_of_students' => 'required',
        ]);
  
        Classes::create($request->all());
   
        return redirect()->route('class.index')
                        ->with('success','User created successfully.');
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data=Classes::find($id);
       return view("class_info.edit",compact('data','id'));

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
        $data=Classes::find($id);
        $data->class_name=request('class_name');
        $data->number_of_students=request('number_of_students');
        $data->save();
      $request->validate([
            'class_name' => 'required',
            'number_of_students' => 'required',
        ]);
      $data->update($request->all());
        return redirect()->route('class.index')
                        ->with('success','User updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Classes::find($id)->delete();
        return redirect()->route('class.index');
    }
}
