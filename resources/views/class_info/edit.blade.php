@extends('layouts.default')
@section('content')



<form action="{{ route('class.update',$data->id) }}" method="POST" class="form-inline">
    {{ csrf_field() }}
  {{method_field('PATCH')}}
        <br>
        <center>
                <strong >Class Name:</strong>
                <input type="text" name="class_name" class="form-control mb-2 mr-sm-2"placeholder="class_name" value="{{$data->class_name}}">
            
      
                <strong>Number of Students:</strong>
                <input type="number" class="form-control mb-2 mr-sm-2" name="number_of_students" placeholder="number_of_students"value="{{$data->number_of_students}}">
       
      
                <button type="submit" class="btn btn-primary">Submit</button>
     
  </center>
   
</form>
@endsection  

	
