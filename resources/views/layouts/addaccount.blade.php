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
<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" ><strong>Create Account</strong></button>
</div>
<hr>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #88a097; ">
        <h3 class="modal-title" id="exampleModalLabel"><strong>CREATE ACCOUNT</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><font size="8">×</font></span>
        </button></h5>

        
      </div>
    
        <div class="form">
        <!-- <form action="/action_page.php">
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
        </form> -->
        <form  method="post" action="{{url('user')}}">
            {{csrf_field()}}
          <label for="lgFormGroupInput" >Name</label>
          <input type="text" id="lgFormGroupInput" placeholder="fname" name="fname">
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
     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>


<div class="table-div" style="float: center" >
<div class="col-lg-12">
<div class="panel panel-default" >
<div class="panel-heading" style="background-color: #88a097;"><h3><strong>ACCOUNTS</strong></h3></div>
<div class="panel-body">
<table align="center" >

  <thead>
    <tr>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Surname</th>
    </tr>
  </thead>
  <tbody id="myTable">
    <tr class="notfirst">
      <td>Raj</td>
      <td>Girish</td>
      <td>Parmar</td>
    </tr>
    <tr class="notfirst">
      <td>Mohan</td>
      <td>viraj</td>
      <td>koli</td>
    </tr>
    <tr class="notfirst">
      <td>Jainish</td>
      <td>ratan</td>
      <td>vyas</td>
    </tr>
    <tr class="notfirst">
      <td>Tom</td>
      <td>kim</td>
      <td>zone</td>
    </tr>
    <tr class="notfirst">
      <td>Rohan</td>
      <td>Prithvi</td>
      <td>koli</td>
    </tr>
    
  </tbody>
</table>

<p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
</div>

</html>
