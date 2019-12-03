      @extends('layouts.default')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Section</h2>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('section.store') }}" method="POST" class="form-inline">
    {{ csrf_field() }}
                 <center>     
    <input type="text" name="section_name" class="form-control mb-2 mr-sm-2"placeholder="A/B/C/D...../Z">
      
                <button type="submit"  class="btn btn-primary">Submit</button>
                 <div class="pull-right">
                 <a class="btn btn-primary" href="{{ route('section.index') }}"> Back</a>
                   </div>
                   </center>
           
</form>
@endsection  