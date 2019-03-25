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
<!-- 
<div class="table-div" style="float: center" >
<div class="col-lg-12">
<div class="panel panel-default" >
<div class="panel-heading" style="background-color: #88a097;"><h3><strong>ACCOMPLISHMENT REPORT</strong></h3></div>
<div class="panel-body">
<table align="center" >

  <thead>
    <tr>
      <th>MFO/PAP</th>
      <th>SUCCESS INDICATORS</th>
      <th>ACTUAL ACCOMPLISHMENTS</th>
      <th>RATING</th>
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
</div> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#88a097;">Create new report</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('report') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('start_duration') ? ' has-error' : '' }}">
                            <label for="start_duration" class="col-md-4 control-label">Start Duration</label>

                            <div class="col-md-6">
                                <input id="start_duration" type="date" class="form-control" name="start_duration" value="{{ old('start_duration') }}" required autofocus>

                                @if ($errors->has('start_duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end_duration') ? ' has-error' : '' }}">
                            <label for="end_duration" class="col-md-4 control-label">End Duration</label>

                            <div class="col-md-6">
                                <input id="end_duration" type="date" class="form-control" name="end_duration" value="{{ old('end_duration') }}" required autofocus>

                                @if ($errors->has('end_duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
