<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teachers;
use App\Classes;
use App\Sections;
use DB;
use App\Http\Controllers\Controller;

class TeachersController extends Controller
{
		
	 public function index()
	 {

				$arr_class = Classes::orderby('class_name','ASC')->get();
					 $arr_section = Sections::orderby('section_name','ASC')->get();
					 return view('teacher_info.index',compact('arr_class', 'arr_section'));
		// $datas = Teachers::with('classes')->with('sections')->where('users.section_id',1)->paginate(5);
		
		// return view('teacher_info.index', compact('datas'))
		//             ->with('i', (request()->input('page', 1) - 1) * 5);
	 }


	 public function getStudents($cid,$sid)
	 {


		$students = DB::table("students")
								->where("class_id",$cid)
								->where("section_id",$sid)
								->pluck("student_name","id");
		return response()->json($students);
	}

 public function saveattendence(Request $request){
		$arr=$request->get('status');
		$cid=$request->get('classid');
		$sid=$request->get('sectionid');
		$date=$request->get('date');

			foreach ($arr as $key => $value)
			{

				$a=array_column($arr,0);
				$b=array_column($arr,1);
					 //return response()->json($ins);
			}
			 
			$c=array_combine ($a,$b );

			 foreach ($c as $key => $value){


					 $ins= DB::table("attendence_list")

							->insert([
								"dates"=>$date,"class_id"=>$cid,"section_id"=>$sid,"student_id"=>$key,"status"=>$value]);
							
									 }
		
		}
		


	 }



