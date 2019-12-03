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
				<button type="button" id="button1" class="btn btn-primary" onclick="changeColor()">GET</button>
			</div>
			<!-- <div class="col-sm-1">
				<button type="button" id="button2" class="btn btn-primary" onclick="btnclk()">checked_boxes</button>
			</div> -->

			

		</div>

		<div class="container">
		
			<table class="table table-hover" id="all">
				
				
			</table>

		<center>
				<button type="button" id="button3" class="btn btn-primary pull-center" onclick="saved()">save</button>
			<a href="{{url('attendence')}}" class="btn btn-primary">See Attendence</a>
		</center>
			</div>
		</center>
	</form>

	@endsection
	<script type="text/javascript">
	

		function changeColor() {
			$('#all').text('');
			var a=document.getElementById('class_id');
			var b=document.getElementById('section_id');
			var cid = a.options[a.selectedIndex].value;
			var sid = b.options[b.selectedIndex].value;

			if(cid&&sid){

				$.ajax({
					type:"get",
					 url: "/getStudentByClass/"+cid+"/"+sid,//Please see the note at the end of the post**

					 success:function(res)
					 {       

					 	if(res)
					 	{
							allStudentsArr = res;
					 		$.each(res,function(key,value){
					 			$("#all").append('<tr><td><input type="checkbox" name="chk" id="'+key+'" value="'+key+'"></td><td><label for="'+key+'">'+value+'</label></td></tr>');
					 		});

					 	}

					 }

					});
			}
			else{
				alert('please select form Both')
			}
		}

		// function btnclk(){

		// 	var status=[];
		// 	var allstudent = [];
		// 	var checkedstudent = [];
		// 	$.each($("input[name='chk']"), function () {
		// 		allstudent.push($(this).val());
		// 	});

		// 	$.each($("input[name='chk']:checked"), function () {
		// 		checkedstudent.push($(this).val());
		// 	});

		// 	$.each(allstudent, function (stud, val) {

		// 		let flg=true;

		// 		$.each($("input[name='chk']"), function (key, value) 
		// 		{
		// 			if (val ==checkedstudent[key]) {
		// 				status.push([val, 'yes']);
		// 				return flg=false;
		// 			}
		// 		});//second_loop close

		// 		if(flg==true)
		// 		{
		// 			if (val ==allstudent[stud])
		// 			{
		// 				status.push([val, 'no']);
		// 				return true;

		// 			}
		// 		}


		// 	 });//first loop close


		// 	console.log('status', status);


		// }


		function saved()
		{

			var status=[];
			var allstudent = [];
			var checkedstudent = [];
			$.each($("input[name='chk']"), function () {
				allstudent.push($(this).val());
			});

			$.each($("input[name='chk']:checked"), function () {
				checkedstudent.push($(this).val());
			});

			$.each(allstudent, function (stud, val) {
			//first loop start

				let flg=true;

				$.each($("input[name='chk']"), function (key, value)
				{ 
				//second loop start
					
					if (val ==checkedstudent[key])
					{
						status.push([val, 'yes']);
						return flg=false;
					}

				});//second_loop close

				if(flg==true)
				{
					if (val ==allstudent[stud])
					{
						status.push([val, 'no']);
						return true;

					}
				}


			 });//first loop close

			var a=document.getElementById('class_id');
			var b=document.getElementById('section_id');
			var cid = a.options[a.selectedIndex].value;
			var sid = b.options[b.selectedIndex].value;


			var date =document.getElementById('date1').value;
			
			$.ajax({
				type:"post",
				url: "/saveattendence",
				data:{

					"_token": "{{ csrf_token() }}",
					"status":status,
					"classid":cid,
					"sectionid":sid,
					"date":date,

				},
				success:function(res)
				{       

					alert("attendence has been Submitted");

					window.location.reload();
				}

			});

		}


	</script>

