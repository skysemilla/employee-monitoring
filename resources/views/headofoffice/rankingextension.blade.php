<!doctype html>
<html >
<head>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->

<link href="/css/accountform.css" rel="stylesheet">

<!-- <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->



<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link href="/css/table.css" rel="stylesheet">
<script src="/js/table.js"></script>
<script src="/js/ranking.js"></script>




</head>
<div class="table-div" style="float: center" >
<div class="col-lg-12">
<div class="panel panel-default" >
<div class="panel-heading" style="background-color: #88a097;"><h3><strong>RANKING</strong>&nbsp;
	
@if($sm !=0 && $yr !=0)
<i> 
	@if($sm == 1 )
		1st Semester (June-July)
	@elseif($sm == 2)
	2nd Semester (July - August)
	@endif

, {{$yr}}</i>
@endif
</h3>
</div>

<div class="panel-body">
<!-- 	@foreach($years as $year)
               
                <p> {{$year->year}}</p>
             
                @endforeach -->
<table align="center" class="panel-body" >


<div class="form">
<!-- 
    <label for="lgFormGroupInput">Semester</label> -->
	<select name= "sem" id="semID" class="form-control">
		<option value="">Select semester</option>
		<option value ="1">1st semester (January - June)</option>
		<option value ="2">2nd semester (July - December)</option>
		
	</select>
	
	<select name="year" id="year" class="form-control">
		<option value="">Select year</option>
		@foreach($years as $year)
               
		<option value="{{$year->year}}"> {{$year->year}}</option>
		@endforeach
	</select>
	<button class="btn btn-primary" id="findBtn">View</button>
<!--     <input type="text" id="lgFormGroupInput" name="name" placeholder="If you want to add new project"> -->
  <!--   <input type="submit" value="View"> -->
	
</div> 
  	@if($yr != 0)
  <thead>
    <tr>
      <th>Report ID</th>
      <th>Name</th>
      <th>Duration</th>
      <th>Year</th>
      <th>Total Average</th>
      
    </tr>
  </thead>
 
  <tbody id="myTable">

	@if(count($reports)!=0) 	
		@foreach($reports as $report)
			 <tr class="notfirst">
			<td>{{$report['id']}}</td>
			@foreach($users as $user)
				@if($user['id'] == $report['user_id'])
					<td>{{$user['name']}}</td>
				@endif
			@endforeach

			@if($report['duration'] ==1)
				<td><a href="/headofoffice/view-assessed-report/{{$report['id']}}">January - June</a></td>
			@else
				<td><a href="/headofoffice/view-assessed-report/{{$report['id']}}">July - December</a></td>
			@endif
			<td>{{$report['year']}}</td>

			<td>{{$report['total_average']}}</td>
		

	      
			</tr>

		@endforeach
		  @endif
  </tbody>
		


  	@else
  		<h2 style="text-align: center;">Please select a period to view.</h2>
	@endif

</table>

</div>

</html>