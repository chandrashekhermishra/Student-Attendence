<?php
    namespace App\Imports;
    use App\Students;
    use Maatwebsite\Excel\Concerns\ToModel;
//    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use DB;
    use App\Classes;


    class Student_Import implements ToModel//, WithHeadingRow
    {

        public function model(array $row)
        {
           
            \Log::error('excel', [
                     
        // 'class_id' => $this->getClassID($row[2]),
        'class_id'     =>  $this->getClassID($row[0]),
         'section_id'   => $row[1],
         'roll_no'      => $row[2],
         'student_name' => $row[3],
         'fathers_name' => $row[4],
         'mobile'       => $row[5],
         'address'      => $row[6]
                    ]
                );
           
          return new Students([
          'class_id'     =>$this->getClassID($row[0]),
         'section_id'   => $row[1],
         'roll_no'      => $row[2],
         'student_name' => $row[3],
         'fathers_name' => $row[4],
         'mobile'       => $row[5],
         'address'      => $row[6]
            ]);

        }

            // public  function getElements($class_name)
            //  {
            //     $users=DB::table('classes')->select('id')->where('class_name',$class_name)->get();
              
                           
            //                         return $users[0];
                              
                           
            // }

   
        private function  getClassID($className)
        {
           
            $cId = Classes::where('class_name',$className)->first();
            // error handling
            return $cId['id'];
        }



   }

// public function create()
//        {
//            $arr_class = Classes::all();
//            $arr_section = Section::all();
//            return view('admin.student-add', compact('arr_class', 'arr_section'));
//        }



//        public function headingRow()
//        {
//            return 2;
//        }

 // public function bulkUpload(Request $request)
 //        {
           
 //            // validations
 //            $path1 = $request->file('student_csv')->store('temp');
 //            $path = storage_path('app') . '/' . $path1;
 //            Excel::import(new StudentImport, $path);
 //             return Redirect::back()->with('success', 'excel sucessfully imported');
 //        }

     
