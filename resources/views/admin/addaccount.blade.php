<!doctype html>
<html >
<head>
<link href="/css/accountform.css" rel="stylesheet">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<link href="/css/table.css" rel="stylesheet">
<script src="/js/table.js"></script>


</head>

<div style="width: 100%; float: right; padding-left: 0px;" >
<input id="myInput" type="text" placeholder="Search.." style=" width: 60%; ">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
<!-- <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" ><strong>Create Account</strong></button> -->

<button type="button" class="btn" ><a href="{{ route('register') }}"><font color="gray"><strong>Create Account</strong></font></a></button>

</div>
<hr>

<div class="table-div" style="float: center" >
<div class="col-lg-12">
<div class="panel panel-default" >
  
<div class="panel-heading" style="background-color: #88a097;"><h3><strong>ACCOUNTS</strong>
    <div class="pull-right">
              <div class="btn-group">
                <a type="button" class="btn btn-success btn-filter" href="/admin/home">All accounts</a>
                <a type="button" class="btn btn-primary btn-filter" href="/admin/accounts/active">Active</a>
                <a type="button" class="btn btn-danger btn-filter" href="/admin/accounts/deactivated">Deactivated</a>
<!--   <button type="button" class="btn btn-default btn-filter" data-target="all">Todos</button> -->
              </div>
    </div>
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
      <th style="width: 1.5%;text-align:center;">Type</th>
      <th style="text-align:center;">Functional Unit</th>
      <th style="text-align:center;">Supervisor</th>
      <th style="width: 1%;text-align:center;">Status</th>
      <th style="width: 2.5%;text-align:center;">Action</th>


    </tr>

  </thead>

  <tbody id="myTable" >
    @foreach($users as $user)
      <tr class="notfirst">
        <td style="width: 5%;text-align: center;">{{$user['id']}}</td>
        <td style="text-align:center;"><a href="/admin/accounts/{{$user['id']}}">{{$user['name']}}</a></td>
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

      
        <td style="text-align:center;">
        @if($user['status'] == "inactive" && ($user['type'] != "admin" && $user['type'] != "headofoffice"))
        <a href="{{action('UserController@activate', $user['id'])}}" onclick="return confirm('Are you sure you want to activate account?');" class="btn btn-primary">Activate</a>

        @else 
              <button class="btn btn-info" disabled >Activate</button>
        @endif


        @if($user['status'] == "active" && ($user['type'] != "admin" && $user['type'] != "headofoffice"))
        <a href="{{action('UserController@deactivate', $user['id'])}}" onclick="return confirm('Are you sure you want to deactivate account?');" class="btn btn-danger">Deactivate</a>
         @else 
              <button class="btn btn-danger" disabled >Deactivate</button>
        @endif
      
    
       </td>
      </tr>
      @endforeach
  </tbody>
</table>

</div>

</html>
