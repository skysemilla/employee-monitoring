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
<div class="panel-heading" style="background-color: #88a097;"><h3><strong>PREVIOUS REPORTS</strong></h3></div>
<div class="panel-body">
<table align="center" >

  <thead>
    <tr>
      <th>Report ID</th>


      <th>Duration</th>
      <th>Year</th>
      <th>Action</th>
      
    </tr>
  </thead>
  <tbody id="myTable">
    @if(count($reports)!=0)  
    @foreach($reports as $report)
         <tr class="notfirst">
        <td>{{$report['id']}}</td>
            @if($report['duration']==1)
                <td><a href="/employee/view-report/{{$report['id']}}">1st Semester (January to June)</a></td>
            @else
                <td><a href="/employee/view-report/{{$report['id']}}">2nd Semester (July to December)</a></td>
            @endif
            
            <td>{{$report['year']}}</td>
            @if(Auth::user()->hasActiveReport==false)
              <td><a href="/employee/template-report/{{$report['id']}}" class="btn btn-warning">Use Template</a>
            @else
              <td><a class="btn btn-warning" disabled>Use Template</a>
            @endif
             <a href="{{action('PDFController@make', $report['id'])}}" class="btn btn-info">Generate PDF</a>
            </td>
             <!-- &nbsp; <a  data-toggle="modal" data-target="#approveReportModal" class="btn btn-success">Approve</a>
             &nbsp; <a  class="btn btn-danger">Disapprove</a></td>
        
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
            </div> -->

      
        </tr>

    @endforeach
    @endif

  </tbody>
</table>

</div>

</html>