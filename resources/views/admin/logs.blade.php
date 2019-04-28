<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DoReMa</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">

   <script src="/js/table.js" async></script>

  

</head>

            
 <button style="margin-left: 3%;margin-top: 3%" 
 type="button" class="btn"  ><a href="{{ URL::previous() }}" class="previous">&laquo; Back</a></button>
            
<div class="container">

<div class="panel-body">

 <div class="container" style="margin-left: -2.5%" >
      <div class="row">
          <div class="panel panel-default widget" style="background-color: #e3ede9">
          	<div class="panel-heading" style="background-color: #8e9995">
                  <h3 style="padding-left: 2%;"><b>
                      LOGS
                  </b></h3>
                  
             </div>
             <table style="border: 3px solid #dddddd;">

			  <thead  style="border: 6px solid #dddddd;" >
			    <tr>
			      <th style="text-align:center; width: 5.5%">DESCRIPTION</th>
			      <th style="text-align:center; ">TIMESTAMP</th>
			   
			      
			    </tr>
			  </thead>
			  <tbody id="myTable"  style="border: 3px solid #dddddd;">
					
				@foreach($logs as $log)
					 <tr class="notfirst"  style="border: 3px solid #dddddd;">
						<td style="padding-left: 2%;">{{ $log->description}}</td>
						<td style="padding-left: 2%;text-align:center;"> {{$log->created_at->format('h:ia')}}&nbsp;&nbsp; {{date_format($log->created_at,"m/d/Y")}}</td>
					<!-- 		<td style="padding-left: 2%;">{{date_format($log->created_at,"H:i:s - m/d/Y")}} {{$log->created_at->format('h:ia')}}</td>
 -->
			      
					</tr>

				@endforeach


			  </tbody>
			</table>
				<!-- @foreach ($logs as $log)
			    <p>{{ $log->description}} </p>
		
			@endforeach -->

		</div>
	</div>
</div>
</div>
</div>

    
    </body>


</html>
