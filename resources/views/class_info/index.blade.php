     @extends('layouts.default')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
               
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('class.create') }}"> Create New Class</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-hover">
        <tr>
            <th>S_No.</th>
            <th>Class Name</th>
            <th>Number of Students</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $uData)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $uData->class_name }}</td>
            <td>{{ $uData->number_of_students }}</td>
            <td>
                <form action="{{ route('class.destroy',$uData->id) }}" method="POST">
                   
                    <a class="btn btn-primary" href="{{ route('class.edit',$uData->id) }}">Edit</a>
                    <!-- SUPPORT ABOVE VERSION 5.5 -->
                    {{-- @csrf
                    @method('DELETE') --}} 
                    
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $data->links() !!}
      
@endsection 