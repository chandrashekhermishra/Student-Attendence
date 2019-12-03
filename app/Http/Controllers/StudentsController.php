<?php

namespace App\Http\Controllers;

use App\Students;
use App\Classes;
use App\Sections;
use Illuminate\Http\Request;
use DB;
   use Maatwebsite\Excel\Facades\Excel;
   use App\Imports\Student_Import;
   use Maatwebsite\Excel\ExcelServiceProvider;
class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datas = Students::latest()->paginate(6);
     
        return view('student_info.index',compact('datas'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
         $arr_class = Classes::orderby('class_name','ASC')->get();
           $arr_section = Sections::orderby('section_name','ASC')->get();
           return view('student_info.create', compact('arr_class', 'arr_section'));
    
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
        'class_id' => 'required',
        'section_id' => 'required',
        'roll_no' => 'required',
        'student_name' => 'required',
        'fathers_name' => 'required',
        'mobile'=> 'required',
        'address'=> 'required',
    ]);

    Students::create($request->all());
 
        return redirect()->route('student.index')->with('success','One Row Inserted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Students::find($id)->delete();
        return redirect()->route('student.index')->with('success','One Row Deleted Successfully');

    }



public function bulkUpload(Request $request)

        {
           
            $path1 = $request->file('check_csv')->store('temp');
            $path = storage_path('app').'/'. $path1;
            Excel::import(new Student_Import,$path);
        }





}
