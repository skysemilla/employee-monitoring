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





</head>
<div class="table-div" style="float: center" >
<div class="col-lg-12">
<div class="panel panel-default" >
<div class="panel-heading" style="background-color: #88a097;"><h3><strong>REPORTS FOR ASSESSMENT</strong></h3></div>
<div class="panel-body">
@if(count($reportsForAssessment)==0)
	<h2 style="text-align: center;">No reports for assessment.</h2>
@else
<table align="center" >

  <thead>
    <tr>
      <th>Report id</th>
      <th>Name</th>
      <th>Duration</th>
      <th>Year</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody id="myTable">
		
	@foreach($reportsForAssessment as $report)
		 <tr class="notfirst">
		<td>{{$report['id']}}</td>
		@foreach($users as $user)
			@if($user['id'] == $report['user_id'])
				<td>{{$user['name']}}</td>
			@endif
		@endforeach
		@if($report['duration'] ==1)
			<td><a href="/headofoffice/report-for-assessment/{{$report['id']}}">1st Semester (January - June)</a></td>
		@else
			<td><a href="/headofoffice/report-for-assessment/{{$report['id']}}">2nd Semester (July - December)</a></td>
		@endif
		<!-- 	<td><a href="/headofoffice/report-for-assessment/{{$report['id']}}">{{$report['duration']}}</a></td> -->
			<td>{{$report['year']}}</td>
			<td><!-- <a href="{{action('TaskController@forHOOView', $report['id'])}}"  class="btn btn-info">View</a> -->
			 &nbsp;	<a href="{{action('ReportController@updateReportAssessed', $report['id'])}}" onclick="return confirm('Approve Report {{$report->id}} for final assessment?');" class="btn btn-success">Approve</a>

			 &nbsp;<!--  <a onclick='return deleletconfig()' class="btn btn-danger">Disapprove</a> -->
			<a href="{{action('ReportController@updateReportDiapproveAssessment', $report['id'])}}" onclick="return confirm('Disapprove Report {{$report->id}} for final assessment?');" class="btn btn-danger">Disapprove</a>
		
			</td>
 		

	        

      
		</tr>

	@endforeach


  </tbody>
</table>
	@endif
</div>

</html>