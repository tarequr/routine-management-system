@if($showPdfRoutines->count() > 0)
  <img src="{{ asset('public/logo2.png')}} "alt="" align="center" style="margin-left:  75px">
     <h1 align="center" style="color:#0E06A0"></h1>
     <h3 align="center">Class Routine</h3>
     	@php
            $routine = DB::table('routines')->where('teacherId', auth()->user()->id)
              ->join('departments', 'departments.id', '=', 'routines.deptId')
              ->first();
       	@endphp
     <h3 align="center">Department Name: {{$routine->deptName}}</h3>
     <h4 align="center">Teacher Name: {{ Auth::user()->name}}</h4>
	     @php
	     	$semester = DB::table('routines')->where('teacherId', auth()->user()->id)
	     		->where('deptId', auth()->user()->deptId)
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
		      <th>#Room</th>
		      <th>#Time</th>
		    </tr>
	  	</thead>
		<tbody>
			@foreach($showPdfRoutines as $showPdfRoutine)

			<tr style="font-size: 12px;">
				<td>{{$showPdfRoutine->courseCode}}</td>
				<td>{{$showPdfRoutine->courseType == 1 ? 'Theory' : 'Lab'}}</td>
				<td>{{$showPdfRoutine->name}}</td>
				<td>{{$showPdfRoutine->batch}}</td>
				<td>{{$showPdfRoutine->dayOne}}</td>
				<td>{{$showPdfRoutine->sectionName}}</td>
				<td>{{$showPdfRoutine->roomNo}}</td>
				<td>{{$showPdfRoutine->time}}</td>
				<td>{{(new App\Model\Day())->secondDayName($showPdfRoutine->dayTwoId)}}</td>
				<td>{{(new App\Model\Room())->getRoom($showPdfRoutine->roomTwoId)}}</td>
				<td>{{(new App\Model\Time())->getTime($showPdfRoutine->timeTwoId)}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@else
	<h1>No routine available</h1>
	@endif
	