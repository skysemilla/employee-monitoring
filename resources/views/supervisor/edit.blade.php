<div class="table-div" style="float: center" >
<div class="col-lg-12">
<div class="panel panel-default" >
<div class="panel-heading" style="background-color: #88a097;"><h3><strong>EDIT REPORT {{$id}}</strong></h3></div>
<div class="panel-body">
<br>
<div class="container">
  <form method="post" action="{{action('TaskController@update', $id)}}">

    <div class="form-group row">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">TITLE</label>
      <div class="col-sm-6">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title" value="{{$task->title}}" readonly>
      </div>
    </div>

     <div class="form-group row" hidden="true">
   
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">CATEGORY ID</label>
      <div class="col-sm-6">

        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="category_id" name="category_id" value="{{$category->id}}" readonly>
     
      </div>
      <hr>
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">CATEGORY</label>
      <div class="col-sm-6">
        <p type="text" class="form-control form-control-lg" id="lgFormGroupInput" disabled>{{$category->name}}</p>
      </div>
    </div>
    <div class="form-group row" >
   
      
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">CATEGORY</label>
      <div class="col-sm-6">
        <p type="text" class="form-control form-control-lg" id="lgFormGroupInput" disabled>{{$category->name}}</p>
      </div>
    </div>
     


    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">TARGET</label>
      <div class="col-sm-6">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="target_no" name="target_no" value="{{$task->target_no}}" readonly>
      </div>
    </div>

    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">ACTUAL </label>
      <div class="col-sm-6">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="actual_no" name="actual_no" value="{{$task->actual_no}}" required>
      </div>
    </div>

     <div class="form-group row">
      
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">RATING</label>
     
    </div>

    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Quantity</i></label>
      <div class="col-sm-6">
        <input type="number" min="0" max="5" step="1" pattern="[1-5]"class="form-control form-control-lg" id="lgFormGroupInput" placeholder="rating_quantity" name="rating_quantity" value="{{$task->rating_quantity}}">
      </div>
    </div>
    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Effort</i></label>
      <div class="col-sm-6">
        <input type="number" min="0" max="5" step="1" pattern="[1-5]"class="form-control form-control-lg" id="lgFormGroupInput" placeholder="rating_effort" name="rating_effort" value="{{$task->rating_effort}}">
      </div>
    </div>

    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Timeliness</i></label>
      <div class="col-sm-6">
        <input type="number" min="0" max="5" step="1" pattern="[1-5]"class="form-control form-control-lg" id="lgFormGroupInput" placeholder="rating_timeliness" name="rating_timeliness" value="{{$task->rating_timeliness}}">
      </div>
    </div>

    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">REMARKS</label>
      <div class="col-sm-6">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="remarks" name="remarks" value="{{$task->remarks}}">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
</div>
