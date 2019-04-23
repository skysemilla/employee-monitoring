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
<p><b>I, {{Auth::user()->name}}, of the DOST CALABARZON, {{Auth::user()->functional_unit}} commit to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period @if($report['duration'] ==1)
	January to June
@else
	July to December
@endif
 {{$report['year']}}. </b></p>
<br>
<hr>
<p style="text-indent: 83.5%"><b>Ratee</b></p>
<table  style="width: 100%; table-layout:fixed;" >
	<tbody style="text-align:center; ">
		 <tr>
	        <th rowspan="2" style="width: 10%;">MFO/PAP</th>
	        <th rowspan="2"  colspan="1" style="width: 20%;">SUCCESS INDICATORS <br>(TARGETS + MEASURES)</th>
	        <!-- <th rowspan="2">TARGET ACCOMPLISHMENTS</th> -->
	        <th rowspan="2" style="width: 20%;">Actual Accomplishments</th>
	        <th colspan="4" rowspan="1" style="width: 10%;">RATING</th>
	        <th rowspan="2" style="width: 10%;">REMARKS</th>
	       
	        
	    </tr>
	    <tr>
	        
	         <th style="width: 2%;">Q</th>
	        <th style="width: 2%;">E</th>
	        <th style="width: 2%;">T</th>
	        <th style="width: 4%;">A</th>
	        
	    </tr>
	</tbody>
	<tbody>
		<tr>

		      <td colspan="8" class="page-header"><b>III. Regional S & T Services</b> </td>
		   <!--    <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td> -->
		    

		    </tr>

		    @foreach ($categories as $category) 
		    	<?php $i = 0; ?>
		    	 <?php $arr=array();?>
			    @foreach($tasks as $task)  
			     
		          	@if($task['header_id']=="1")
		          		@if($category['id']==$task['category_id'])
		            	<tr>
		                  @if($i ==0)
			                        <th rowspan="<?php echo $category->rowCount; ?>">{{$category['name']}}</th>
			                        <?php $i = 1; ?>
		                  @endif
		                @if($task['projname_id']!= NULL)
		           
		                	@if (in_array($task->projname_id, $arr) == false) 
		                		<?php $proj = $projnames->find($task->projname_id); ?>
		                	<!-- 	@foreach ($projnames as $projname) -->
		                  	<!-- once lang naman lagi papasok dito -->
		                  		<!-- @if($projname->id === $task->projname_id) -->
		                  			
		                  			<?php
		                  			/*if (in_array($projname->id, $arr) == false) {*/
									   array_push($arr,$proj->id);
									/*} */
		                  			 ?>
		                  			<td rowspan="1" colspan="7"><b><i>{{$proj->name}}</i>
			 						</b></td>
			 						</tr>
			 					<tr>
		                  		<!-- 	<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td> -->
		                  		<!-- @endif -->
		                  		<!-- @endforeach -->
							@endif 
		                  	
		               
		                    <td>-> {{$task['title']}}</td>
			                <td>{{$task['actual_no']}}</td>
			                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
			                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
			                <td style="text-align:center;">{{$task['rating_effort']}}</td>
			                <td style="text-align:center;">{{$task['rating_average']}}</td>
			                <td >{{$task['remarks']}}</td>

		                @else
		                 
		                  	<td>{{$task['title']}}</td>
			                <td>{{$task['actual_no']}}</td>
			                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
			                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
			                <td style="text-align:center;">{{$task['rating_effort']}}</td>
			                <td style="text-align:center;">{{$task['rating_average']}}</td>
			                <td >{{$task['remarks']}}</td>
		                @endif

		            </tr>
		          @endif
		          @endif
			   @endforeach
			
		 @endforeach
	</tbody>
	<tbody>
		<tr>

		      <td colspan="8" class="page-header"><b>Other S & T Services</b></td>
		  <!--     <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td>
		      <td></td> -->
		    

		    </tr>
		     @foreach ($categories as $category) 
		    	<?php $i = 0; ?>
		    	 <?php $arr=array();?>
			    @foreach($tasks as $task)  
			     
		          	@if($task['header_id']=="2")
		          		@if($category['id']==$task['category_id'])
		            	<tr>
		                  @if($i ==0)
			                        <th rowspan="<?php echo $category->rowCount; ?>">{{$category['name']}}</th>
			                        <?php $i = 1; ?>
		                  @endif
		                @if($task['projname_id']!= NULL)
		           
		                	@if (in_array($task->projname_id, $arr) == false) 
		                		<?php $proj = $projnames->find($task->projname_id); ?>
		                	<!-- 	@foreach ($projnames as $projname) -->
		                  	<!-- once lang naman lagi papasok dito -->
		                  		<!-- @if($projname->id === $task->projname_id) -->
		                  			
		                  			<?php
		                  			/*if (in_array($projname->id, $arr) == false) {*/
									   array_push($arr,$proj->id);
									/*} */
		                  			 ?>
		                  			<td rowspan="1" colspan="7"><b><i>{{$proj->name}}</i>
			 						</b></td>
			 						</tr>
			 					<tr>
		                  		<!-- 	<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td> -->
		                  		<!-- @endif -->
		                  		<!-- @endforeach -->
							@endif 
		                  	
		               
		                    <td>-> {{$task['title']}}</td>
			                <td>{{$task['actual_no']}}</td>
			                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
			                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
			                <td style="text-align:center;">{{$task['rating_effort']}}</td>
			                <td style="text-align:center;">{{$task['rating_average']}}</td>
			                <td >{{$task['remarks']}}</td>

		                @else
		                 
		                  	<td>{{$task['title']}}</td>
			                <td>{{$task['actual_no']}}</td>
			                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
			                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
			                <td style="text-align:center;">{{$task['rating_effort']}}</td>
			                <td style="text-align:center;">{{$task['rating_average']}}</td>
			                <td >{{$task['remarks']}}</td>
		                @endif

		            </tr>
		          @endif
		          @endif
			   @endforeach
			
		 @endforeach
	</tbody>
	<tbody>
		<tr>

		      <td colspan="6" class="page-header"><i><b>Final Average Rating</b></i></td>
		      <td colspan="2">{{$total_rating}}</td>
		      
		     

		   
	</tbody>
</table>
<br>

<table border="1" style="border-collapse; width: 100%; text-align:center;">
	
		<tr>
			<th  >Discussed with:</th>
			<th >Date</th>
			<th >Reviewed/Assessed by:</th>
			<th >Date</th>
			<th  >Final Rating by:</th>
			<th >Date</th>
		</tr>

		<tr style="text-align:center;">
			<td class="name" valign="bottom">{{Auth::user()->name}}</td>
			<td rowspan="2"> </td>
			<td class="name" valign="bottom">{{$supervisor->name}} </td>
			<td rowspan="2"> </td>
			<td class="name" valign="bottom">{{$headofoffice->name}}</td>
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
			<td class="name" valign="bottom">{{$headofoffice->name}}</td>
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
	        
	        <th width="100">Q</th>
	        <th width="90">E</th>
	        <th width="80">T</th>
	        <th width="70">A</th>
	        
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
		     @foreach ($categories as $category) 
		    	<?php $i = 0; ?>
		    	 <?php $arr=array();?>
			    @foreach($tasks as $task)  
			     
		          	@if($task['header_id']=="1")
		          		@if($category['id']==$task['category_id'])
		            	<tr>
		                  @if($i ==0)
			                        <th rowspan="<?php echo $category->rowCount; ?>">{{$category['name']}}</th>
			                        <?php $i = 1; ?>
		                  @endif
		                @if($task['projname_id']!= NULL)
		           
		                	@if (in_array($task->projname_id, $arr) == false) 
		                		<?php $proj = $projnames->find($task->projname_id); ?>
		                	<!-- 	@foreach ($projnames as $projname) -->
		                  	<!-- once lang naman lagi papasok dito -->
		                  		<!-- @if($projname->id === $task->projname_id) -->
		                  			
		                  			<?php
		                  			/*if (in_array($projname->id, $arr) == false) {*/
									   array_push($arr,$proj->id);
									/*} */
		                  			 ?>
		                  			<td rowspan="1" colspan="7"><b><i>{{$proj->name}}</i>
			 						</b></td>
			 						</tr>
			 					<tr>
		                  		<!-- 	<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td> -->
		                  		<!-- @endif -->
		                  		<!-- @endforeach -->
							@endif 
		                  	
		               
		                    <td>-> {{$task['title']}}</td>
			                <td>{{$task['actual_no']}}</td>
			                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
			                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
			                <td style="text-align:center;">{{$task['rating_effort']}}</td>
			                <td style="text-align:center;">{{$task['rating_average']}}</td>
			                <td >{{$task['remarks']}}</td>

		                @else
		                 
		                  	<td>{{$task['title']}}</td>
			                <td>{{$task['actual_no']}}</td>
			                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
			                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
			                <td style="text-align:center;">{{$task['rating_effort']}}</td>
			                <td style="text-align:center;">{{$task['rating_average']}}</td>
			                <td >{{$task['remarks']}}</td>
		                @endif

		            </tr>
		          @endif
		          @endif
			   @endforeach
			
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
		    @foreach ($categories as $category) 
		    	<?php $i = 0; ?>
		    	 <?php $arr=array();?>
			    @foreach($tasks as $task)  
			     
		          	@if($task['header_id']=="2")
		          		@if($category['id']==$task['category_id'])
		            	<tr>
		                  @if($i ==0)
			                        <th rowspan="<?php echo $category->rowCount; ?>">{{$category['name']}}</th>
			                        <?php $i = 1; ?>
		                  @endif
		                @if($task['projname_id']!= NULL)
		           
		                	@if (in_array($task->projname_id, $arr) == false) 
		                		<?php $proj = $projnames->find($task->projname_id); ?>
		                	<!-- 	@foreach ($projnames as $projname) -->
		                  	<!-- once lang naman lagi papasok dito -->
		                  		<!-- @if($projname->id === $task->projname_id) -->
		                  			
		                  			<?php
		                  			/*if (in_array($projname->id, $arr) == false) {*/
									   array_push($arr,$proj->id);
									/*} */
		                  			 ?>
		                  			<td rowspan="1" colspan="7"><b><i>{{$proj->name}}</i>
			 						</b></td>
			 						</tr>
			 					<tr>
		                  		<!-- 	<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td>
		                  			<td></td> -->
		                  		<!-- @endif -->
		                  		<!-- @endforeach -->
							@endif 
		                  	
		               
		                    <td>-> {{$task['title']}}</td>
			                <td>{{$task['actual_no']}}</td>
			                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
			                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
			                <td style="text-align:center;">{{$task['rating_effort']}}</td>
			                <td style="text-align:center;">{{$task['rating_average']}}</td>
			                <td >{{$task['remarks']}}</td>

		                @else
		                 
		                  	<td>{{$task['title']}}</td>
			                <td>{{$task['actual_no']}}</td>
			                <td style="text-align:center;">{{$task['rating_quantity']}}</td>
			                <td style="text-align:center;">{{$task['rating_timeliness']}}</td>
			                <td style="text-align:center;">{{$task['rating_effort']}}</td>
			                <td style="text-align:center;">{{$task['rating_average']}}</td>
			                <td >{{$task['remarks']}}</td>
		                @endif

		            </tr>
		          @endif
		          @endif
			   @endforeach
			
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