@if($studentPdfRoutines->count() > 0)
  <img src="{{ asset('public/logo2.png')}} "alt="" align="center" style="margin-left:  75px">
     <h1 align="center" style="color:#0E06A0"></h1>
     <h3 align="center">Class Routine</h3>
	    @php
	        $studentRoutine = DB::table('routines')->where('routines.deptId', auth()->user()->deptId)
	          ->join('departments', 'departments.id', '=', 'routines.deptId')
	          ->first();
	   	@endphp
     <h3 align="center">Department Name: {{$studentRoutine->deptName}}</h3>
     	@php
	     	$semester = DB::table('routines')->where('routines.deptId', auth()->user()->deptId)
	            ->join('semesters', 'semesters.id', '=', 'routines.semesterId')
	            ->select('routines.*','semesters.semesterName')
	            ->first();
	    @endphp
     <h5 align="center">{{ $semester->semesterName }} - {{ date('Y') }}</h5>
<table style="border-collapse: collapse; width:100%" Border = "1" Cellpadding = "4" Cellspacing = "4"; class="table table-striped table-bordered" >
		<thead>
		    <tr style="font-size: 12px;">
		      <th>#Course Code</th>
		      <th>#Course Type</th>
		      <th>#Teacher</th>
		      <th>#Batch</th>
		      <th>#Day</th>
		      <th>#Section</th>
		      <th>#Room</th>
		      <th>#Time</th>
		      <th>#Day</th>
		      <th>#Section</th>
		      <th>#Room</th>
		      <th>#Time</th>
		    </tr>
	  	</thead>
		<tbody>k
			@foreach($studentPdfRoutines as $studentPdfRoutine)

			<tr style="font-size: 12px;">
				<td>{{$studentPdfRoutine->courseCode}}</td>
				<td>{{$studentPdfRoutine->courseType == 1 ? 'Theory' : 'Lab'}}</td>
				<td>{{$studentPdfRoutine->name}}</td>
				<td>{{$studentPdfRoutine->batch}}</td>
				<td>{{$studentPdfRoutine->dayOne}}</td>
				<td>{{$studentPdfRoutine->sectionName}}</td>
				<td>{{$studentPdfRoutine->roomNo}}</td>
				<td>{{$studentPdfRoutine->time}}</td>
				<td>{{(new App\Model\Day())->secondDayName($studentPdfRoutine->dayTwoId)}}</td>
				<td>{{$studentPdfRoutine->sectionName}}</td>
				<td>{{(new App\Model\Room())->getRoom($studentPdfRoutine->roomTwoId)}}</td>
				<td>{{(new App\Model\Time())->getTime($studentPdfRoutine->timeTwoId)}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@else
	<h1>No routine available</h1>
	@endif
	