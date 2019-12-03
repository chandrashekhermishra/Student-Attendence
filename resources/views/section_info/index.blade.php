     @extends('layouts.default')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
               
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('section.create') }}"> Create New Section</a>
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
           
            <th>Sections</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($datas as $uData)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $uData->section_name }}</td>
          
            <td>
                <form action="{{ route('section.destroy',$uData->id) }}" method="POST">
                   
                    <a class="btn btn-primary" href="{{ route('section.edit',$uData->id) }}">Edit</a>
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
  
    {!! $datas->links() !!}
      
@endsection 