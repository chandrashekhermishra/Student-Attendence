@extends('layouts.default')
@section('content')
{{csrf_field()}}

<form class="">
    <br>
    <center>
        {{ csrf_field() }}



        <div class="form-group row">
            <div class="col-sm-3">
                <input  type="date" class="form-control" id="date1"/>
            </div>
            <label for="class_name" class="col-sm-1 ">Class</label>
            <div class="col-sm-3">
                <select name="class_id" class="form-control" id="class_id">
                    <option value="" >--- Select Class ---</option>
                    @foreach ($arr_class as $value)
                    <option value="{{ $value['id'] }}">{{ $value['class_name'] }}</option>
                    @endforeach
                </select>
            </div>

            <label for="section" class="col-sm-1 ">Section</label>
            <div class="col-sm-3">
                <select name="section_id" class="form-control" id="section_id">
                    <option value="">--- Select Class ---</option>
                    @foreach ($arr_section as $value)
                    <option value="{{ $value['id'] }}">{{ $value['section_name'] }}</option>
                    @endforeach
                </select>

            </div>

            <div class="col-sm-1">
                <button type="button" id="button1" class="btn btn-primary" onclick="attendList()">Attendence</button>
            </div>
            <table class="table table-hover" id="all">
                
            </table>
        </div>
    </center>
</form>



@endsection

<script>

    function attendList() {
            $('#all').text('');
           var date =document.getElementById('date1').value;
            var a=document.getElementById('class_id');
            var b=document.getElementById('section_id');
            var cid = a.options[a.selectedIndex].value;
            var sid = b.options[b.selectedIndex].value;

            if(cid&&sid){

                $.ajax({

                    type:"get",
                     url: "attendence/show",//Please see the note at the end of the post**
                     data:{
                        "date":date,
                        "classid":cid,
                        "sectionid":sid
                     },
                     success:function(res)
                     {       

                        if(res)
                        {
                          
                            $.each(res,function(key,value){
                                $("#all").append('<tr><td>'+key+'</td><td><label>'+value+'</label></td></tr>');
                            });

                        }


                     }

                    });
            }
            else{
                alert('please select form Both')
            }
        }

</script>