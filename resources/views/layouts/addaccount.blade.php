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
<div class="panel-heading" style="background-color: #88a097;"><h3><strong>ACCOUNTS</strong></h3></div>
<div class="panel-body">
<table align="center" >

  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>

      <th>Username</th>
      <th>Email</th>
      <th>Type</th>
      <th>Functional Unit</th>
      <th>Supervisor</th>
      <th>Status</th>


    </tr>
  </thead>
  <tbody id="myTable">
    @foreach($users as $user)
      <tr class="notfirst">
        <td>{{$user['id']}}</td>
        <td><a href="/home">{{$user['name']}}</a></td>
        <td>{{$user['username']}}</td>

        <td>{{$user['email']}}</td>
        <td>{{$user['type']}}</td>

        @if($user['functional_unit'] =="NULL")
          <td> <i>-----</i></td>
        
        @else
          <td>{{$user['functional_unit']}}</td>
        
        @endif

        @if($user['supervisor_id'] ==NULL||$user['supervisor_id'] ==-1)
          <td> <i>-----</i></td>
        
        @else
          
          @foreach($users as $user1)
            @if($user1['id']== $user['supervisor_id'])
              <td>{{$user1['name']}}</td>
            @endif
          @endforeach
        
        @endif


        @if($user['status'] =="NULL")
          <td> <i>-----</i></td>
        
        @else
          <td>{{$user['status']}}</td>
        
        @endif        


       
      </tr>
      @endforeach
  </tbody>
</table>

</div>

</html>
