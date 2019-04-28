@extends('layouts.app')

@section('content')
<div class="container">
   
                <div class="panel-body">
 
          
<!doctype html>
<html >
<head>

<link href="/css/table.css" rel="stylesheet">
<script src="/js/table.js"></script>
<link href="/css/accountform.css" rel="stylesheet">


</head>

<div style="width: 100%; float: right; padding-left: 0px;" >
<input id="myInput" type="text" placeholder="Search.." style=" width: 60%; ">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<!-- <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" ><strong>Create Account</strong></button> -->


</div>
<hr>

<div class="table-div" style="float: center" >
<div class="col-lg-12">
<div class="panel panel-default" >
  
<div class="panel-heading" style="background-color: #88a097;"><h3><strong>PERMANENT EMPLOYEES</strong>
   <!--  <div class="pull-right">
              <div class="btn-group">
                <a type="button" class="btn btn-success btn-filter" href="/admin/home">All accounts</a>
                <a type="button" class="btn btn-primary btn-filter" href="/admin/accounts/active">Active</a>
                <a type="button" class="btn btn-danger btn-filter" href="/admin/accounts/deactivated">Deactivated</a>

              </div>
    </div> -->
</h3>

</div>

<div class="panel-body">
<table align="center" style="width: 100%; table-layout:fixed; overflow: scroll;" >

  <thead>
    <tr>
      <th style="width: 0.5%;text-align:center;">ID</th>
      <th style="text-align:center;">Name</th>

      <th style="text-align:center;">Username</th>
     <!--  <th>Email</th> -->
      <th style="width: 1%;text-align:center;">Type</th>
      <th style="text-align:center;">Functional Unit</th>
      <th style="text-align:center;">Supervisor</th>
      <th style="width: 1%;text-align:center;">Status</th>



    </tr>

  </thead>

  <tbody id="myTable" >
    @foreach($permanentemployees as $user)
      @if($user->type == 'supervisor' || $user->type == 'permanent')
      <tr class="notfirst">
        <td style="width: 5%;text-align: center;">{{$user['id']}}</td>
        <td style="text-align:center;"><a href="/headofoffice/employee/{{$user['id']}}">{{$user['name']}}</a></td>
        <td style="text-align:center;">{{$user['username']}}</td>

        <td style="text-align:center;">{{$user['type']}}</td>

        @if($user['functional_unit'] =="NULL" || $user['functional_unit'] ==NULL)
          <td style="text-align:center;"> <i>-----</i></td>
        
        @else
          <td style="text-align:center;">{{$user['functional_unit']}}</td>
        
        @endif

        @if($user['supervisor_id'] ==NULL||$user['supervisor_id'] ==-1)
          <td style="text-align:center;"> <i>-----</i></td>
        
        @else
          
          @foreach($users as $user1)
            @if($user1['id']== $user['supervisor_id'])
              <td style="text-align:center;">{{$user1['name']}}</td>
            @endif
          @endforeach
        
        @endif


        @if($user['status'] =="NULL")
          <td style="text-align:center;"><i>-----</i></td>
        
        @else
          <td style="text-align:center;">{{$user['status']}}</td>
        
        @endif        

      
      
      </tr>
      @endif
      @endforeach
  </tbody>
</table>

</div>

</html>

</div>
</div>
     
@endsection