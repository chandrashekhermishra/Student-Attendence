<?php

namespace App\Http\Controllers;
use App\Classes;
use App\Sections;
use App\Attendence;
use Illuminate\Http\Request;
use DB;
class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $arr_class = Classes::orderby('class_name','ASC')->get();
                     $arr_section = Sections::orderby('section_name','ASC')->get();
                     return view('attendence_info.index',compact('arr_class', 'arr_section'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       $date=$request->get('date');
       $sectionid=$request->get('sectionid');
       $classid=$request->get('classid');
      
        $attend = DB::table("attendence_list")
                                ->where("dates",$date)
                                ->where("class_id",$classid)
                                ->where("section_id",$sectionid)
                                ->get("id","student_id","status");
     
       return response($attend);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendence $attendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendence $attendence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendence $attendence)
    {
        //
    }
}
