@extends('layouts.default')
@section('content')
 @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<br>
	<a href="{{ route ( 'student.create') }}" class="btn btn-primary pull-right">Add Student</a>

    <form method="post" enctype="multipart/form-data"  action="{{ url('/bulk-upload') }}">
    {{ csrf_field() }}
    <div class="form-group">
     <table class="table">
      <tr>
       <td width="40%" align="right"><label>Select File for Upload</label></td>
       <td width="30">
        <input type="file" name="check_csv" />
       </td>
       <td width="30%" align="left">
        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
       </td>
      </tr>
      <tr>
       <td width="40%" align="right"></td>
       <td width="30"><span class="text-muted">only .CSV</span></td>
       <td width="30%" align="left"></td>
      </tr>
     </table>
    </div>
   </form>
   
<table class="table table-hover">
	<tr>
<th>S_no</th>
<th>Class Name</th>
<th>Section Name</th>
<th>Roll No</th>
<th>Student Name</th>
<th width="280px">Action</th>
</tr>
@foreach($datas as $data)
<tr>
	<td>{{++$i}}</td>
	
 
 
  @foreach($users=DB::table('classes')->select('class_name')->where('id',$data->class_id)->get() as $user)
      
      <td>{{$user->class_name}}</td>
      
      @endforeach


  @foreach($users=DB::table('sections')->select('section_name')->where('id',$data->section_id)->get() as $user)
      
      <td>{{$user->section_name}}</td>
      @endforeach



	<td>{{$data->roll_no}}</td>
	<td>{{$data->student_name}}</td>
<td>
	<form action="{{ route ('student.destroy', $data->id)}}" method="POST">

		<a href="{{ route ( 'student.edit', $data->id ) }}" class="btn btn-primary">Edit</a>

		<button type="submit" class="btn btn-danger">Delete</button>
		      {{-- @csrf
                    @method('DELETE') --}} 
                    
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
		</form>
		</td>
	</tr>
@endforeach
</table>
{{$datas->links()}}
@endsection

