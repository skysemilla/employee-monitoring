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

<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>




</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

  <!-- <p>You have to create report first</p>
  <a href="/employee/create-report">Create report</a>

 -->
<div class="table-div" style="float: center">

<div class="panel panel-default" >

@if(Auth::user()->type=='permanent')
  <div class="panel-heading" style="background-color: #88a097;"><h3><strong>Individual Performance Commitment Review (IPCR)</strong> 

@else
  <div class="panel-heading" style="background-color: #88a097;"><h3><strong>Performance Commitment Review (IPCR)</strong>

@endif
</h3>

@if($report->forApproval==true || $report->approved==true)
  
  <button type="button" class="btn" data-toggle="modal" data-target="#categoryModal" style="float: right;margin-top: -50px;margin-right: 100px;" disabled="true"><strong>Add category</strong></button>
  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" style="float: right;margin-top: -50px;" disabled="true" ><strong>Add task</strong></button>
@else

  <button type="button" class="btn" data-toggle="modal" data-target="#categoryModal" style="float: right;margin-top: -50px;margin-right: 100px;"  ><strong>Add category</strong></button>
  @if(count($categories)==0)
      <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" style="float: right;margin-top: -50px;" disabled="true"><strong>Add task</strong></button>
  @else
    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" style="float: right;margin-top: -50px;"><strong>Add task</strong></button>
  @endif

  
@endif

  <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #88a097; ">
        <h3 class="modal-title" id="exampleModalLabel" ><strong>ADD CATEGORY</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><font size="8">×</font></span>
        </button></h5>

      </div>
      <div class="form">
        <form method="POST" action="{{url('category')}}" >
           {{csrf_field()}}
            <input type="text" id="lgFormGroupInput" name="name" placeholder="If you want to add new category">
            <input type="submit" value="Submit">
          </form>
      </div>      
    </div>
  </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #88a097; ">
        <h3 class="modal-title" id="exampleModalLabel" ><strong>ADD TASK</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><font size="8">×</font></span>
        </button></h5>

        
      </div>
    
        <div class="form">
    
          <form method="POST" action="{{url('task')}}">
           {{csrf_field()}}
          
            <select name="header_id" id="header_id" class="form-control">
                 <option value="0" selected disabled hidden>What service?</option>
                <option value="1" >Regional S&T Services</option>
                <option value="2">Other S&T Activities</option>

                
              </select>
          <label for="lgFormGroupInput">Title</label>
          <input type="text" id="lgFormGroupInput" name="title" placeholder="Title" required>
         
          <label for="lgFormGroupInput">Category</label>
      
            <!-- <select id="lgFormGroupInput" name="category_id" class="form-control" required>

                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <option value="3">Category 3</option>

             
                
              </select> -->
              <select name="category_id" id="category_id" class="form-control">
               @foreach($categories as $category)
               
                <option value=" {{$category['id']}}"> {{$category['name']}}</option>
             
                @endforeach
           </select>
      
          <label for="lgFormGroupInput">Target Accomplishments</label>
          <input type="number" id="lgFormGroupInput" name="target_no" placeholder="Target Number of Accomplishments" required>

          <label for="lgFormGroupInput">Actual Accomplishments</label>
          <input type="number" id="lgFormGroupInput" name="actual_no" placeholder="Actual Number of Accomplishments" disabled>

          <label for="lgFormGroupInput">Rating</label>
          <input type="number" id="lgFormGroupInput" name="rating_quantity" placeholder="Quantity" required disabled>
          <input type="number" id="lgFormGroupInput" name="rating_effort" placeholder="Effort" required disabled>
          <input type="number" id="lgFormGroupInput" name="rating_timeliness" placeholder="Timeliness" required disabled>
          <!-- <input type="number" id="lgFormGroupInput" name="rating_average" placeholder="Average"> -->

           <label for="lgFormGroupInput">Remarks</label>
          <input type="text" id="lgFormGroupInput" name="remarks" placeholder="Remarks">
          
          <hr>
          <input type="submit" value="Submit">
        </form>
      </div>      
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
</div>
<div class="panel-body">
        <table class="custom-table">
            <thead>
             
                <tr>
                    <th rowspan="2">MFO/PAP</th>
                    <th rowspan="2">SUCCESS INDICATORS</th>
                    <th rowspan="2">TARGET ACCOMPLISHMENTS</th>
                    <th rowspan="2">ACTUAL ACCOMPLISHMENTS</th>
                    <th colspan="4" rowspan="1">RATING</th>
                    <th rowspan="2">REMARKS</th>
                    <th rowspan="2"> ACTION</th>
                    
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
                  @if($task['user_id'] == Auth::user()->id )
                      @if($task['header_id']=="1")
                        <tr class="toggler toggler1">
                          
                             @foreach ($categories as $category)
                                @if($category['id']==$task['category_id'])
                                    <td>{{$category['name']}}</td>
                                @endif
                            @endforeach
                         
                            <td>{{$task['title']}}</td>
                            <td>{{$task['target_no']}}</td>
                            <td>{{$task['actual_no']}}</td>
                            <td>{{$task['rating_quantity']}}</td>
                            <td>{{$task['rating_timeliness']}}</td>
                            <td>{{$task['rating_effort']}}</td>
                            <td>{{$task['rating_average']}}</td>
                            <td>{{$task['remarks']}}</td>
                            <td>  <a  data-toggle="modal" data-target="#approveReportModal" class="btn btn-success">Edit</a></td>
                            <div class="modal fade" id="approveReportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header" style="background-color: #88a097; ">
                  <h3 class="modal-title" id="exampleModalLabel" ><strong>Approve Report?</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><font size="8">×</font></span>
                  </button></h3>

                  <div>
                    <a  class="btn btn-success" href="{{action('ReportController@updateReportApproved', $report['id'])}}"   >YES</a>
                    <a  class="btn btn-warning" data-dismiss="modal" aria-label="Close">NO</a>
                   
                  </div>
                  </div>
              </div>

            </div>
          </div>



                         
                        </tr>
                      @endif
                    @endif
                
               @endforeach
                          
            </tbody>
            <tbody>
                <tr>

                  <td colspan="10" class="page-header"><button type="button" class="tbtn"><i class="fa fa-plus-circle fa-minus-circle"></i> &nbsp; Other S & T Services</button> </td>
                </tr>
                @foreach($tasks as $task)
                  @if($task['user_id'] == Auth::user()->id )
                    @if($task['header_id']=="2")
                      <tr class="toggler toggler1">
                        
                          @foreach ($categories as $category)
                              @if($category['id']==$task['category_id'])
                                  <td>{{$category['name']}}</td>
                              @endif
                           @endforeach
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
                  @endif
                
               @endforeach
                          
            </tbody>
                
        </table>

    @if($report->forApproval==true || count($tasks)==0 || $report->approved==true)
        <button type="submit"  data-toggle="modal" data-target="#submitModal" disabled><strong>Submit to supervisor</strong></button>
    @else
        <button type="submit" data-toggle="modal" data-target="#submitModal"><strong>Submit</strong></button>
    @endif
    <div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #88a097; ">
        <h3 class="modal-title" id="exampleModalLabel" ><strong>Are you sure you want to submit report?</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><font size="8">×</font></span>
        </button></h5>

      </div>
      <div class="form">
        <form method="post" action="{{action('ReportController@update', $report['id'])}}" >
         
             <div class="form-group row">
              {{csrf_field()}}
               <input name="_method" type="hidden" value="PATCH">
              <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Start</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="start_duration" name="start_duration" value="{{$report->start_duration}}" readonly>
              </div>
            </div>
             <div class="form-group row">
      
               <input name="_method" type="hidden" value="PATCH">
              <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">End</label>
              <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="end_duration" name="end_duration" value="{{$report->end_duration}}" readonly>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-2"></div>
              <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
          </form>
      </div>      
    </div>
  </div>
  </div>
  </div>

</div>
@if($report->forApproval==true)
 <div class="alert alert-danger">
    <strong>Can't edit!</strong> Your report is being reviewed by your supervisor.
  </div>
</div>
@endif
</html>
