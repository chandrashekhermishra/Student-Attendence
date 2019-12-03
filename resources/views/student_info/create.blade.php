@extends('layouts.default')
@section('content')

  <br>

<form action="{{route('student.store')}}" method="POST">

 {{ csrf_field() }}
 
  <div class="form-group row">
    <label for="student_name" class="col-sm-2">Student Name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-sm" id="student_name" placeholder="Name" name="student_name">
      </div>
  </div>


  <div class="form-group row">
    <label for="class_name" class="col-sm-2 ">Class</label>
      <div class="col-sm-4">
       <select name="class_id" class="form-control">
                           <option value="">--- Select Class ---</option>
                           @foreach ($arr_class as $value)
                           <option value="{{ $value['id'] }}">{{ $value['class_name'] }}</option>
                           @endforeach
                       </select>
      </div>
  </div>

   <div class="form-group row">
    <label for="section" class="col-md-2 col-form-label text-md-right">Section</label>
      <div class="col-sm-4">
     <select name="section_id" class="form-control">
                           <option value="">--- Select Class ---</option>
                           @foreach ($arr_section as $value)
                           <option value="{{ $value['id'] }}">{{ $value['section_name'] }}</option>
                           @endforeach
                       </select>
      </div>
  </div>

  <div class="form-group row">
    <label for="fathers_name" class="col-sm-2">Father 's Name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-lg" id="fathers_name" placeholder="Father's Name" name=fathers_name>
      </div>
  </div>

   <div class="form-group row">
    <label for="roll_no" class="col-sm-2 ">Roll Number</label>
      <div class="col-sm-4">
        <input type="number" class="form-control form-control-lg" id="roll_no"  maxlength="1000" placeholder="Roll Number" name="roll_no">
      </div>
  </div>

  <div class="form-group row">
    <label for="mobile" class="col-sm-2">Mobile</label>
      <div class="col-sm-4">
        <input type="number" class="form-control form-control-lg" id="mobile"  maxlength="10" placeholder="Mobile" name="mobile">
      </div>
  </div>

   <div class="form-group row">
    <label for="address" class="col-sm-2">Address</label>
      <div class="col-sm-4">
        <input type="text" class="form-control form-control-lg" id="address"   placeholder="Address" name="address">
      </div>
  </div>

 <div class="form-group row">
    <div class="col-sm-4">
      <button type="submit" class="btn btn-primary">ADD</button>
    </div>
  </div>

</form>

@endsection