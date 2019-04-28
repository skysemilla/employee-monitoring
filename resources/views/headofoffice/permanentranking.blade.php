@extends('headofoffice.navbar')

@section('content')

<div class="container">
   
                <div class="panel-body">
                   <!--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                        
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
				<script src="/js/permanentranking.js"></script>




				</head>
				<div class="table-div" style="float: center" >
				<div class="col-lg-12">
				<div class="panel panel-default" >
				<div class="panel-heading" style="background-color: #88a097;"><h3><strong>PERMANENT EMPLOYEES RANKING</strong>&nbsp;
					
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
					<!-- <select name= "type" id="type" class="form-control">
						<option value="">Select type</option>
				        <option value="admin">Admin</option>
				        <option value="headofoffice">Head of Office</option>
				        <option value="nonpermanent">Non-permanent Employee</option>
				        <option value="permanent">Permanent Employee</option>
				        <option value="supervisor">Supervisor</option>
				                                    
						
					</select> -->
					<button class="btn btn-primary" id="findBtn">View</button>
				<!--     <input type="text" id="lgFormGroupInput" name="name" placeholder="If you want to add new project"> -->
				  <!--   <input type="submit" value="View"> -->
					
				</div> 
				  	@if($yr != 0)
				  <thead>
				    <tr>
				      <th>Rank</th>
				      <th>Report ID</th>
				      <th>Name</th>
				      <th>Duration</th>
				      <th>Year</th>
				      <th>Total Average</th>
				      
				    </tr>
				  </thead>
				 
				  <tbody id="myTable">

					@if(count($tempCollection)!=0) 
						<?php $prevAverage = 0;
						$rankIndex=1;
						 ?>
						@foreach($tempCollection as $temp)
						  
						  	<tr class="notfirst">

							@if($temp->total_average == $prevAverage)	
								<td></td>

							@else
								<td><b>{{$rankIndex}}</b></td>
								<?php $rankIndex++;
						 		?>
							@endif
							<?php $prevAverage = $temp->total_average; ?>
							
						  	@foreach($users as $user)
								@if($user['id'] == $temp['user_id'])
							 		
									<td>{{$temp['id']}}</td>
							
								
									<td><a href="/headofoffice/employee/{{$user['id']}}">{{$user['name']}}</a></td>
							
						

									@if($temp['duration'] ==1)
										<td><a href="/headofoffice/view-assessed-report/{{$temp['id']}}">January - June</a></td>
									@else
										<td><a href="/headofoffice/view-assessed-report/{{$temp['id']}}">July - December</a></td>
									@endif
									<td>{{$temp['year']}}</td>

									<td><font style="float: right">{{number_format($temp->total_average, 2, '.', '')}}</font></td>
								

							      
									</tr>
								@endif
							@endforeach
				  		@endforeach
					@endif
				  </tbody>
						


				  	@else
				  		<h2 style="text-align: center;">Please select a semester to view.</h2>
					@endif

				</table>

				</div>

				</html>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection