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
	@if(count($reportsForAssessment)!=0) 	
	@foreach($reportsForAssessment as $report)
		 <tr class="notfirst">
		<td><a href="/supervisor/report/{{$report['id']}}">{{$report['id']}}</a></td>
		@foreach($users as $user)
			@if($user['id'] == $report['user_id'])
				<td>{{$user['name']}}</td>
			@endif
		@endforeach
			<td>{{$report['duration']}}</td>
			<td>{{$report['year']}}</td>
			<td><a href="{{action('TaskController@forSupervisorView', $report['id'])}}"  class="btn btn-info">View</a>
			 &nbsp;	<a  data-toggle="modal" data-target="#approveReportModal" class="btn btn-success">Approve</a>
			 &nbsp; <a  class="btn btn-danger">Disapprove</a></td>
 		
  				<div class="modal fade" id="approveReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		          <div class="modal-dialog" role="document">
		            <div class="modal-content">
		              <div class="modal-header" style="background-color: #88a097; ">
                  <h3 class="modal-title" id="exampleModalLabel" ><strong>Approve Report?</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><font size="8">×</font></span>
                  </button></h3>

                  <div>
                    <a  class="btn btn-success" href="{{action('ReportController@updateReportAssessed', $report['id'])}}"   >YES</a>
                    <a  class="btn btn-warning" data-dismiss="modal" aria-label="Close">NO</a>
                   
                  </div>
                  </div>
	            </div>

	          </div>
	        </div>

      
		</tr>

	@endforeach
	@endif

  </tbody>
</table>

</div>

</html>