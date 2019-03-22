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

<div class="table-div" style="float: center">
<div class="panel panel-default" >
<div class="panel-heading" style="background-color: #88a097;"><h3><strong>Individual Performance Commitment Review (IPCR)</strong></h3>
  <button type="button" class="btn" data-toggle="modal" data-target="#categoryModal" style="float: right;margin-top: -50px;margin-right: 100px;" ><strong>Add category</strong></button>
  <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal" style="float: right;margin-top: -50px;" ><strong>Add task</strong></button>

  <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #88a097; ">
        <h3 class="modal-title" id="exampleModalLabel" ><strong>ADD CATEGORY</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><font size="8">×</font></span>
        </button></h5>

      </div>
      <div class="form">
        <form method="POST" action="{{url('category')}}" >
           {{csrf_field()}}
            <input type="text" id="lgFormGroupInput" name="name" placeholder="If you want to add new category">
            <input type="submit" value="Submit">
          </form>
      </div>      
    </div>
  </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #88a097; ">
        <h3 class="modal-title" id="exampleModalLabel" ><strong>ADD TASK</strong><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><font size="8">×</font></span>
        </button></h5>

        
      </div>
    
        <div class="form">
    
          <form method="POST" action="{{url('task')}}">
           {{csrf_field()}}
          <label for="lgFormGroupInput">Title</label>
          <input type="text" id="lgFormGroupInput" name="title" placeholder="Title" required>
         
          <label for="lgFormGroupInput">Category</label>
      
            <!-- <select id="lgFormGroupInput" name="category_id" class="form-control" required>

                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <option value="3">Category 3</option>

             
                
              </select> -->
              <select name="category_id" id="category_id" class="form-control">
               @foreach($categories as $category)
                <option value=" {{$category['id']}}"> {{$category['name']}}</option>
                 
                @endforeach
           </select>
      
          <label for="lgFormGroupInput">Target Accomplishments</label>
          <input type="number" id="lgFormGroupInput" name="target_no" placeholder="Target Number of Accomplishments" required>

          <label for="lgFormGroupInput">Actual Accomplishments</label>
          <input type="number" id="lgFormGroupInput" name="actual_no" placeholder="Actual Number of Accomplishments" disabled>

          <label for="lgFormGroupInput">Rating</label>
          <input type="number" id="lgFormGroupInput" name="rating_quantity" placeholder="Quantity" required>
          <input type="number" id="lgFormGroupInput" name="rating_effort" placeholder="Effort" required>
          <input type="number" id="lgFormGroupInput" name="rating_timeliness" placeholder="Timeliness" required="">
          <!-- <input type="number" id="lgFormGroupInput" name="rating_average" placeholder="Average"> -->

           <label for="lgFormGroupInput">Remarks</label>
          <input type="text" id="lgFormGroupInput" name="remarks" placeholder="Remarks">
          
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
</div>
<div class="panel-body">
        <table class="custom-table">
            <thead>
             
                <tr>
                    <th rowspan="2">MFO/PAP</th>
                    <th rowspan="2">SUCCESS INDICATORS</th>
                    <th rowspan="2">TARGET ACCOMPLISHMENTS</th>
                    <th rowspan="2">ACTUAL ACCOMPLISHMENTS</th>
                    <th colspan="4" rowspan="1">RATING</th>
                    <th rowspan="2">REMARKS</th>
                    
                </tr>
                <tr>
                    
                    <th>Quantity</th>
                    <th>Effort</th>
                    <th>Timeliness</th>
                    <th>Average</th>
                    
                </tr>
                
            </thead>

            <tbody>
                <tr>
                  <td colspan="10" class="page-header"><button type="button" class="tbtn"><i class="fa fa-plus-circle fa-minus-circle"></i> &nbsp; III. Regional S & T Services</button> </td>
                </tr>
                @foreach($tasks as $task)
                <tr class="toggler toggler1">
              
                     @foreach ($categories as $category)
                        @if($category['id']==$task['category_id'])
                            <td>{{$category['name']}}</td>
                        @endif
                    @endforeach
                 
                    <td>{{$task['title']}}</td>
                    <td>{{$task['target_no']}}</td>
                    <td>{{$task['actual_no']}}</td>
                    <td>{{$task['rating_quantity']}}</td>
                    <td>{{$task['rating_timeliness']}}</td>
                    <td>{{$task['rating_effort']}}</td>
                    <td>{{$task['rating_average']}}</td>
                    <td>{{$task['remarks']}}</td>
                 
                </tr>
                
               @endforeach
                          
            </tbody>
            <tbody>
                <tr>
                    <td colspan="10" class="page-header"><button type="button" class="tbtn"><i class="fa fa-plus-circle fa-minus-circle"></i>&nbsp; Other S& T Activities</button> </td>
                </tr>
                <tr class="toggler toggler1">
                    <td rowspan="10">CF1: Technology Transfer (GIA and Roll-out Projects)</td>
                    <td>related activities</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>    
                </tr>
                <tr class="toggler toggler1">
                    <td>ICT installation</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    
                   
                </tr>
                <tr class="toggler toggler1">
                    <td>ICT installation</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    
                   
                </tr>
                <tr class="toggler toggler1">
                    <td>ICT installation</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    
                   
                </tr>
               
            </tbody>
            
        </table>
  </div>
</div>

</html>
