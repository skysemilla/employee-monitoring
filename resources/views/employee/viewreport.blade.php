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
<div class="container table-div">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Page Name</th>
                    <th>Light House Report Filename</th>
                    <th>Page Id</th>
                    <th>Sess Id</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="20" class="page-header"><button type="button" class="tbtn"><i class="fa fa-plus-circle fa-minus-circle"></i>   P_index</button> </td>
                </tr>
                <tr class="toggler toggler1">
                    <td rowspan="5"></td>
                    <td><a href="#">lighthouse+0_0_0_0_0_0_0_0_0.html</a></td>
                    <td>0</td>
                    <td>0</td>
                    
                </tr>
                <tr class="toggler toggler1">
                    <td><a href="#">lighthouse+0_0_0_0_0_0_0_0_0.html</a></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                   
                </tr>
               
                
            </tbody>
            <tbody>
                <tr>
                    <td colspan="20" class="page-header"><button type="button" class="tbtn"><i class="fa fa-plus-circle"></i>    P_index 2</button></td>
                </tr>
                <tr class="toggler">
                    <td rowspan="11"></td>
                    <td><a href="#">lighthouse+0_0_0_0_0_0_0_0_0.html</a></td>
                    <td>0</td>
                    <td>0</td>
                    
                </tr>
                <tr class="toggler">
                    <td><a href="#">lighthouse+0_0_0_0_0_0_0_0_0.html</a></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    
                </tr>
               
            </tbody>
            <tbody>
                <tr>
                    <td colspan="20" class="page-header"><button type="button" class="tbtn"><i class="fa fa-plus-circle"></i>   P_index 3</button></td>
                </tr>
                <tr class="toggler">
                    <td rowspan="5"></td>
                    <td><a href="#">lighthouse+0_0_0_0_0_0_0_0_0.html</a></td>
                    <td>0</td>
                    <td>0</td>
                    
                </tr>
              
            </tbody>
            <tbody>
                <tr>
                    <td colspan="20" class="page-header"><button type="button" class="tbtn"><i class="fa fa-plus-circle"></i>   P_index 4</button></td>
                </tr>
               <tr class="toggler">
                   <td rowspan="2"></td>
                    <td><a href="#">lighthouse+0_0_0_0_0_0_0_0_0.html</a></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>12</td>
                    <td>23</td>
                    <td>67</td>
                    <td>100</td>
                    <td>4420</td>
                    <td>4420</td>
                    <td>15360</td>
                    <td>16150</td>
                    <td>21750</td>
                    <td>291</td>
                    <td>0</td>
                    <td>0</td>
                </tr>
               <tr class="toggler">
                    <td><a href="#">lighthouse+0_0_0_0_0_0_0_0_0.html</a></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    
                </tr>
            </tbody>
        </table>
</div>
</html>
