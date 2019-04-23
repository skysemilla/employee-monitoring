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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

  <!-- <p>You have to create report first</p>
  <a href="/employee/create-report">Create report</a>

 -->
 <button type="button" class="btn"  ><a href="{{ URL::previous() }}" class="previous">&laquo; Back</a></button>


<div class="table-div" style="float: center">

<div class="panel panel-default" >

@if($user->type=='permanent' || $user->type=='supervisor')
  <div class="panel-heading" style="background-color: #88a097;"><h3><strong>Individual Performance Commitment Review (IPCR)</strong> 

@else
  <div class="panel-heading" style="background-color: #88a097;"><h3><strong>Performance Commitment Review (PCR)</strong>

@endif
</h3>
<h4><i>Report for: 
@if($report->duration == 1)
    January- June, {{$report->year}}

@else
    July - December, {{$report->year}}
@endif
</i>
</h4>
<button type="button" class="btn" data-toggle="modal" data-target="#projnameModal" style="float: right;margin-top: -50px;margin-right: 50px;"><strong>COMMENT</strong></button>
  <div class="modal fade" id="projnameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #88a097; ">
        <h3 class="modal-title" id="exampleModalLabel" ><strong>COMMENTS</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><font size="8">×</font></span>
        </button></h5>

      </div>
      <div class="form">
        <form method="POST" action="{{action('ReportController@addComment', $report['id'])}}" >
           {{csrf_field()}}
            <input type="text" id="lgFormGroupInput" name="comment" value="{{$report->comment}}" placeholder="Type comment here" required>
            <input type="submit" value="Submit">
          </form>
      </div>      
    </div>
  </div>
  </div>

<div class="panel-body">
        <table class="custom-table">
            <thead>
             
                <tr>
                    <th rowspan="2">MFO/PAP</th>
                    <th rowspan="2">Project</th>
                    <th rowspan="2">SUCCESS INDICATORS</th>
                    <th rowspan="2">TARGET ACCOMPLISHMENTS</th>
                    <th rowspan="2">ACTUAL ACCOMPLISHMENTS</th>
                    <th colspan="4" rowspan="1">RATING</th>
                    <th rowspan="2">REMARKS</th>
                    
                </tr>
                <tr>
                    
                    <th>Quantity</th>
                    <th>Effort</th>
                    <th>Timeliness</th>
                    <th>Average</th>
                    
                </tr>
                
            </thead>

            <tbody>
                <tr>

                  <td colspan="10" class="page-header"><button type="button" class="tbtn"><i class="fa fa-plus-circle fa-minus-circle"></i> &nbsp; III. Regional S & T Services</button> </td>
                </tr>
                @foreach($tasks as $task)
                      @if($task['header_id']=="1")
                        <tr class="toggler toggler1">
                          
                             @foreach ($categories as $category)
                                @if($category['id']==$task['category_id'])
                                    <td>{{$category['name']}}</td>
                                @endif
                            @endforeach
                             @foreach ($projnames as $projname)
                                @if($projname['id']==$task['projname_id'])
                                    <td>{{$projname['name']}}</td>
                                @endif
                            @endforeach
                            @if($task['projname_id']==NULL)
                              <td></td>
                            @endif
                            <td>{{$task['title']}}</td>
                            <td>{{$task['target_no']}}</td>
                            <td>{{$task['actual_no']}}</td>
                            <td>{{$task['rating_quantity']}}</td>
                            <td>{{$task['rating_effort']}}</td>
                            <td>{{$task['rating_timeliness']}}</td>
                       
                            <td>{{$task['rating_average']}}</td>
                            <td>{{$task['remarks']}}</td>

                         
                        </tr>
                      @endif
               @endforeach
                          
            </tbody>
            <tbody>
                <tr>

                  <td colspan="10" class="page-header"><button type="button" class="tbtn"><i class="fa fa-plus-circle fa-minus-circle"></i> &nbsp; Other S & T Services</button> </td>
                </tr>
                @foreach($tasks as $task)
                    @if($task['header_id']=="2")
                      <tr class="toggler toggler1">
                        
                          @foreach ($categories as $category)
                              @if($category['id']==$task['category_id'])
                                  <td>{{$category['name']}}</td>
                              @endif
                           @endforeach
                            @foreach ($projnames as $projname)
                                @if($projname['id']==$task['projname_id'])
                                    <td>{{$projname['name']}}</td>
                                @endif
                            @endforeach
                          @if($task['projname_id']==NULL)
                            <td></td>
                          @endif
                          <td>{{$task['title']}}</td>
                          <td>{{$task['target_no']}}</td>
                          <td>{{$task['actual_no']}}</td>
                          <td>{{$task['rating_quantity']}}</td>
                          <td>{{$task['rating_timeliness']}}</td>
                          <td>{{$task['rating_effort']}}</td>
                          <td>{{$task['rating_average']}}</td>
                          <td>{{$task['remarks']}}</td>
                         
                       
                      </tr>
                    @endif
               @endforeach
                          
            </tbody>
            <tbody>
                <tr>
                  <td colspan="8" class="page-header"><button type="button" class="tbtn" style="float: right"><b>TOTAL AVERAGE</b> </button> </td>
                  
                  <td colspan="2" class="page-header"><button type="button" class="tbtn"><b>{{$total_rating}}</b>  </button> </td>
                
                  </tr>
         
                          
            </tbody>
                
                
        </table>

</div>
</html>
