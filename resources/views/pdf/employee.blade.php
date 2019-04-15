<html>
<head>
<style>
table {
border-collapse: collapse;

}

table, td, th {
border: 1px solid black;
}
td.name {
  height: 40px;
}
td, th{
	width: 70px;
}
hr {
width: 20%;
margin-right: 50px;
}
</style>
</head>
@if( Auth::user()->type == 'permanent' ||Auth::user()->type== 'supervisor' )
<h4 style="text-align: center">INDIVIDUAL PERFORMANCE COMMITMENT REVIEW (IPCR)</h4>
<p><b>I, {{Auth::user()->name}}, of the DOST CALABARZON, {{Auth::user()->functional_unit}} commit to Deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period @if($report['duration'] ==1)
	January-June
@else
	July-December
@endif
, {{$report['year']}}(//fix division) </b></p>
<br>
<hr>
<p style="text-indent: 83.5%"><b>Ratee</b></p>
<table  style="width: 100%;">
	<thead style="text-align:center; ">
		 <tr>
	        <th rowspan="2">MFO/PAP</th>
	        <th rowspan="2">SUCCESS INDICATORS <br>(TARGETS + MEASURES)</th>
	        <!-- <th rowspan="2">TARGET ACCOMPLISHMENTS</th> -->
	        <th rowspan="2">Actual Accomplishments</th>
	        <th colspan="4" rowspan="1">RATING</th>
	        <th rowspan="2">REMARKS</th>
	       
	        
	    </tr>
	    <tr>
	        
	        <th>Q</th>
	        <th>E</th>
	        <th>T</th>
	        <th>A</th>
	        
	    </tr>
	</thead>
	<tbody>
		<tr>

		      <td colspan="1" class="page-header"><b>III. Regional S & T Services</b> </td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		    

		    </tr>
		    @foreach($tasks as $task)
		          @if($task['header_id']=="1")
		            <tr>
		                 @foreach ($categories as $category)
		                    @if($category['id']==$task['category_id'])
		                        <td>{{$category['name']}}</td>
		                    @endif
		                @endforeach
		             
		                <td>{{$task['title']}}</td>
		               
		                <td>{{$task['actual_no']}}</td>
		                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
		                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
		                <td style="text-align:center;">{{$task['rating_effort']}}</td>
		                <td style="text-align:center;">{{$task['rating_average']}}</td>
		                <td >{{$task['remarks']}}</td>
		            
		            </tr>
		          @endif
		   @endforeach
	</tbody>
	<tbody>
		<tr>

		      <td colspan="1" class="page-header"><b>Other S & T Services</b></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		    

		    </tr>
		    @foreach($tasks as $task)
		          @if($task['header_id']=="2")
		            <tr>
		                 @foreach ($categories as $category)
		                    @if($category['id']==$task['category_id'])
		                        <td>{{$category['name']}}</td>
		                    @endif
		                @endforeach
		             
		                <td>{{$task['title']}}</td>
		               
		                <td>{{$task['actual_no']}}</td>
		                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
		                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
		                <td style="text-align:center;">{{$task['rating_effort']}}</td>
		                <td style="text-align:center;">{{$task['rating_average']}}</td>
		                <td >{{$task['remarks']}}</td>
		            
		            </tr>
		          @endif
		   @endforeach
	</tbody>
	<tbody>
		<tr>

		      <td colspan="6" class="page-header"><i><b>Final Average Rating</b></i></td>
		      <td colspan="2">{{$total_rating}}</td>
		      
		     

		   
	</tbody>
</table>
<br>

<table border="1" style="border-collapse; width: 100%;">
	
		<tr>
			<th style="text-align:center; width:50%;" >Discussed with:</th>
			<th >Date</th>
			<th style="text-align:center;">Reviewed/Assessed by:</th>
			<th >Date</th>
			<th style="text-align:center;" >Final Rating by:</th>
			<th >Date</th>
		</tr>

		<tr style="text-align:center;">
			<td class="name" valign="bottom">{{Auth::user()->name}}</td>
			<td rowspan="2"> </td>
			<td class="name" valign="bottom">{{$supervisor->name}} </td>
			<td rowspan="2"> </td>
			<td class="name" valign="bottom">Alexander R. Madrigal</td>
			<td rowspan="2"> </td>
		</tr>

		<tr style="text-align: center" >
			<td ><b>Employee</b></td>
			<!-- <td > </td> -->
			<td ><b>Immediate Supervisor</b></td>
			<!-- <td > </td> -->
			<td ><b>Head of Office</b></td>
			<!-- <td > </td> -->
		
		</tr>

</table>
@else 
<h4 style="text-align: center">PERFORMANCE CONTRACT DELIVERABLES</h4>
<table border="1" style="border-collapse; width: 100%;">
	
		<tr>
			<th style="text-align:center; width:50%;" >Discussed with:</th>
			<th >Date</th>
			<th style="text-align:center;">Reviewed/Assessed by:</th>
			<th >Date</th>
			<th style="text-align:center;" >Final Rating by:</th>
			<th >Date</th>
		</tr>

		<tr style="text-align:center;">
			<td class="name" valign="bottom">{{Auth::user()->name}}</td>
			<td rowspan="2"> </td>
			<td class="name" valign="bottom">{{$supervisor->name}} </td>
			<td rowspan="2"> </td>
			<td class="name" valign="bottom">Alexander R. Madrigal</td>
			<td rowspan="2"> </td>
		</tr>

		<tr style="text-align: center" >
			<td ><b>Employee</b></td>
			<!-- <td > </td> -->
			<td ><b>Immediate Supervisor</b></td>
			<!-- <td > </td> -->
			<td ><b>Head of Office</b></td>
			<!-- <td > </td> -->
		
		</tr>

</table>
<p><b>Legend:</b> &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;1 - Quality  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2 - Efficiency  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 3 - Timeliness  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; 4 - Average</p>
<table  style="width: 100%;">
	<thead style="text-align:center; ">
		 <tr>
	        <th rowspan="2">MFO/PAP</th>
	        <th rowspan="2">SUCCESS INDICATORS <br>(TARGETS + MEASURES)</th>
	        <!-- <th rowspan="2">TARGET ACCOMPLISHMENTS</th> -->
	        <th rowspan="2">Actual Accomplishments</th>
	        <th colspan="4" rowspan="1">RATING</th>
	        <th rowspan="2">REMARKS</th>
	       
	        
	    </tr>
	    <tr>
	        
	        <th>Q</th>
	        <th>E</th>
	        <th>T</th>
	        <th>A</th>
	        
	    </tr>
	</thead>
	<tbody>
		<tr>

		      <td colspan="1" class="page-header"><b>III. Regional S & T Services</b> </td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		    

		    </tr>
		    @foreach($tasks as $task)
		          @if($task['header_id']=="1")
		            <tr>
		                 @foreach ($categories as $category)
		                    @if($category['id']==$task['category_id'])
		                        <td>{{$category['name']}}</td>
		                    @endif
		                @endforeach
		             
		                <td>{{$task['title']}}</td>
		               
		                <td>{{$task['actual_no']}}</td>
		                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
		                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
		                <td style="text-align:center;">{{$task['rating_effort']}}</td>
		                <td style="text-align:center;">{{$task['rating_average']}}</td>
		                <td >{{$task['remarks']}}</td>
		            
		            </tr>
		          @endif
		   @endforeach
	</tbody>
	<tbody>
		<tr>

		      <td colspan="1" class="page-header"><b>Other S & T Services</b></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		    

		    </tr>
		    @foreach($tasks as $task)
		          @if($task['header_id']=="2")
		            <tr>
		                 @foreach ($categories as $category)
		                    @if($category['id']==$task['category_id'])
		                        <td>{{$category['name']}}</td>
		                    @endif
		                @endforeach
		             
		                <td>{{$task['title']}}</td>
		               
		                <td>{{$task['actual_no']}}</td>
		                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
		                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
		                <td style="text-align:center;">{{$task['rating_effort']}}</td>
		                <td style="text-align:center;">{{$task['rating_average']}}</td>
		                <td >{{$task['remarks']}}</td>
		            
		            </tr>
		          @endif
		   @endforeach
	</tbody>
	<tbody>
		<tr>

		      <td colspan="6" class="page-header"><i><b>Final Average Rating</b></i></td>
		      <td colspan="2">{{$report['total_average']}}</td>
		      
		     

		   
	</tbody>
</table>

<p><b>Comments and Recommendations for Development Purposes:</b></p>
@endif

</html>