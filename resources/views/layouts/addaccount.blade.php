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
<!-- 
<div  style="float:right; padding-top: 10px; position: relative;">
  <button onclick="document.getElementById('id01').style.display='block'" ><strong> + </strong></button>

  <div id="id01" class="modal">

    <div style="max-width:600px;">
      <div class="w3-center form-header"><br>
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-top" title="Close Modal">&times;</span>
        <h2 >CREATE ACCOUNT</h2>
      </div>
      <div class="form">
        <form action="/action_page.php">
          <label for="fname">First Name</label>
          <input type="text" id="fname" name="firstname" placeholder="Your name..">
          <label for="mname">Middle Initial</label>
          <input type="text" id="mname" name="middlename" placeholder="Your middle initial..">
          <label for="lname">Last Name</label>
          <input type="text" id="lname" name="lastname" placeholder="Your last name..">

          <label for="position">Position</label>
          <select id="position" name="position">
            <option value="permanent">Permanent</option>
            <option value="nonpermanent">Non-permanent</option>
          </select>

          <label for="functional_unit">Functional Unit</label>
          <select id="functional_unit" name="functional_unit">
            <option value="u1">Unit 1</option>
            <option value="u2">Unit 2</option>
          </select>
          <hr>
          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div> -->
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
      <th>Email</th>

    </tr>
  </thead>
  <tbody id="myTable">
    @foreach($users as $user)
      <tr class="notfirst">
        <td>{{$user['id']}}</td>
        <td>{{$user['name']}}</td>
        <td>{{$user['email']}}</td>

       
       
      </tr>
      @endforeach
  </tbody>
</table>

</div>

</html>
