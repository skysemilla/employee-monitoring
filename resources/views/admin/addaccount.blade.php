<!doctype html>
<html >
<head>
<link href="/css/accountform.css" rel="stylesheet">
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
      <th>Action</th>


    </tr>
  </thead>
  <tbody id="myTable">
    @foreach($users as $user)
      <tr class="notfirst">
        <td>{{$user['id']}}</td>
        <td><a href="/admin/accounts/{{$user['id']}}">{{$user['name']}}</a></td>
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

      
        <td>
        @if($user['status'] == "inactive" && $user['type'] != "admin")
         <a href="{{action('UserController@activate', $user['id'])}}" class="btn btn-primary" >Activate</a>
          @else 
              <button class="btn btn-info" disabled >Activate</button>
        @endif
         @if($user['status'] == "active" && $user['type'] != "admin")
         <a href="{{action('UserController@deactivate', $user['id'])}}" class="btn btn-danger" >Deactivate</a>
         @else 
              <button class="btn btn-danger" disabled >Deactivate</button>
        @endif
      
        <!-- @if($user['status'] == "inactive" && $user['type'] != "admin")
        <a  data-toggle="modal" data-target="#activateModal" class="btn btn-primary">Activate</a>
          <div class="modal fade" id="activateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            {{$user['id']}} 
            <div class="modal-content">
              <div class="modal-header" style="background-color: #88a097; ">
              <h3 class="modal-title" id="exampleModalLabel" ><strong>Activate account</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><font size="8">×</font></span>
              </button></h3>
               <hr>
              <div>
                <p>{{$user['name']}}</p>
              </div>
              <div>
                <hr>
                <a href="{{action('UserController@activate', $user['id'])}}" class="btn btn-danger" >Yes</a>
                <a  class="btn btn-warning" data-dismiss="modal" aria-label="Close">No</a>
               
              </div>
              </div>
          </div>

        </div>
        </div>
        @else 
              <button class="btn btn-info" disabled >Activate</button>
        @endif -->
        <!-- Modal for activating account -->
          
<!-- 
        @if($user['status'] == "active" && $user['type'] != "admin")
             <a  data-toggle="modal" data-target="#deactivateModal" class="btn btn-danger">Deactivate</a>
              
          <div class="modal fade" id="deactivateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #88a097; ">
              <h3 class="modal-title" id="exampleModalLabel" ><strong>Deactivate account</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><font size="8">×</font></span>
              </button></h3>
              <hr>
              <div>
                <p>{{$user['name']}} </p>
              </div>
              <div>
                <hr>
                <a href="{{action('UserController@deactivate', $user['id'])}}" class="btn btn-danger" > Yes </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a  class="btn btn-warning" data-dismiss="modal" aria-label="Close">No</a>
               
              </div>
              </div>
          </div>

        </div>
        </div>
        @else 
              <button class="btn btn-danger" disabled >Deactivate</button>
        @endif -->
      

       </td>
      </tr>
      @endforeach
  </tbody>
</table>

</div>

</html>
