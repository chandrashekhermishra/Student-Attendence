@extends('layouts.default')
@section('content')



<form action="{{ route('section.update',$data->id) }}" method="POST" class="form-inline">
    {{ csrf_field() }}
  {{method_field('PATCH')}}
        <br>
        <center>
                <strong >Section Name:</strong>
                <input type="text" name="section_name" class="form-control mb-2 mr-sm-2"placeholder="class_name" value="{{$data->section_name}}">
            
      
                <button type="submit" class="btn btn-primary">Submit</button>
     
  </center>
   
</form>
@endsection  

	
