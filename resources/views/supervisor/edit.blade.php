
<div class="container">
  <form method="post" action="{{action('TaskController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title" value="{{$task->title}}" readonly>
      </div>
    </div>

     <div class="form-group row">
   
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Category</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="category_id" name="category_id" value="{{$category->name}}" readonly>
      </div>
    </div>

    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Target</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="target_no" name="target_no" value="{{$task->target_no}}" readonly>
      </div>
    </div>

    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Actual</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="actual_no" name="actual_no" value="{{$task->actual_no}}">
      </div>
    </div>

    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Quantity</label>
      <div class="col-sm-10">
        <input type="number" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="rating_quantity" name="rating_quantity" value="{{$task->rating_quantity}}">
      </div>
    </div>

    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Timeliness</label>
      <div class="col-sm-10">
        <input type="number" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="rating_timeliness" name="rating_timeliness" value="{{$task->rating_timeliness}}">
      </div>
    </div>
    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Effort</label>
      <div class="col-sm-10">
        <input type="number" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="rating_effort" name="rating_effort" value="{{$task->rating_effort}}">
      </div>
    </div>

    <div class="form-group row">
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Remarks</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="remarks" name="remarks" value="{{$task->remarks}}">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>
