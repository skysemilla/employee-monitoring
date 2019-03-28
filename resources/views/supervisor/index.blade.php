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
<div class="panel-heading" style="background-color: #88a097;"><h3><strong>REPORTS FOR APPROVAL</strong></h3></div>
<div class="panel-body">
<table align="center" >

  <thead>
    <tr>
      <th>Report id</th>
      <th>Name</th>

      <th>Start Duration</th>
      <th>End Duration</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody id="myTable">
  	
	@foreach($reportsForApproval as $report)
		 <tr class="notfirst">
		<td>{{$report['id']}}</td>
		@foreach($users as $user)
			@if($user['id'] == $report['user_id'])
				<td>{{$user['name']}}</td>
			@endif
		@endforeach
			<td>{{$report['start_duration']}}</td>
			<td>{{$report['end_duration']}}</td>
			<td><a  class="btn btn-info">View</a> &nbsp; <a  class="btn btn-success">Approve</a>&nbsp;  <a  class="btn btn-danger">Disapprove</a></td>

      
		</tr>

	@endforeach

  </tbody>
</table>

</div>

</html>