
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
         <a href="{{action('UserController@activate', $user['id'])}}" class="btn btn-primary" >Activate</a>
       
        @else 
              <button class="btn btn-info" disabled >Activate</button>
        @endif
         @if($user['status'] == "active" && ($user['type'] != "admin" && $user['type'] != "headofoffice"))
         <a href="{{action('UserController@deactivate', $user['id'])}}" class="btn btn-danger" >Deactivate</a>
       
         @else 
              <button class="btn btn-danger" disabled >Deactivate</button>
        @endif
      
    
       </td>
      </tr>
      @endforeach
  </tbody>
</table>