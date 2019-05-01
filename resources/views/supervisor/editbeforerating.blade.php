@extends('employee.navbar')

@section('content')
<div class="container">
   
                <div class="panel-body">
                   <!--  @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif -->
                     <div class="table-div" style="float: center" >
                        <div class="col-lg-12">
                        <div class="panel panel-default" >
                        <div class="panel-heading" style="background-color: #88a097;"><h3><strong>EDIT TASK {{$id}}</strong></h3></div>
                        <div class="panel-body">
                        <br>
                        <div class="container">
                          <form method="post" action="{{action('TaskController@update', $id)}}">

                            <div class="form-group row">
                              {{csrf_field()}}
                               <input name="_method" type="hidden" value="PATCH">
                              <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">TITLE</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title" value="{{$task->title}}" >
                              </div>
                            </div>

                             <div class="form-group row">
                           
                              <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">CATEGORY</label>
                              <div class="col-sm-6">
                            
                                <select name="category_id" id="category_id" class="form-control">

                                       @foreach($categories as $category)
                                            @if($chosenCategory->id == $category->id)
                                            <option selected value=" {{$category['id']}}"> {{$category['name']}}</option>
                                            @continue
                                            @endif

                                            <option value=" {{$category['id']}}"> {{$category['name']}}</option>
                                     
                                        @endforeach
                                   </select>

                              </div>
                            </div>

                            <div class="form-group row">
                           
                              <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">PROJECT</label>
                              <div class="col-sm-6">
                            
                                
                                      @if($task->projname_id == NULL)
                                       
                                        <select name="projname_id" id="projname_id" class="form-control">
                                        <option selected hidden disabled>Optional Project name</option>
                                             @foreach($projnames as $projname)
                                             
                                              <option value=" {{$projname['id']}}"> {{$projname['name']}}</option>
                                           
                                              @endforeach
                                        </select>
                                      @else
                                        <select name="projname_id" id="projname_id" class="form-control">
                                          @foreach($projnames as $projname)
                                            @if($chosenProjname->id == $projname->id)
                                            <option selected value=" {{$projname['id']}}"> {{$projname['name']}}</option>
                                            @continue
                                            @endif

                                            <option value=" {{$projname['id']}}"> {{$projname['name']}}</option>
                                     
                                        @endforeach
                                   </select>
                                      @endif
                                       

                              </div>
                            </div>

                            <div class="form-group row">
                               <input name="_method" type="hidden" value="PATCH">
                              <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">TARGET</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="target_no" name="target_no" value="{{$task->target_no}}" >
                              </div>
                            </div>

                            <div class="form-group row">
                               <input name="_method" type="hidden" value="PATCH">
                              <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">ACTUAL</label>
                              <div class="col-sm-6">
                                <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="actual_no" name="actual_no" value="{{$task->actual_no}}" required readonly>
                              </div>
                            </div>
                            <div class="form-group row">
                            
                            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">RATING</label>
                           
                          </div>
                            <div class="form-group row">
                               <input name="_method" type="hidden" value="PATCH">
                              <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Quantity</i></label>
                              <div class="col-sm-6">
                                <input type="number" min="0" max="5" step="1" pattern="[1-5]"class="form-control form-control-lg" id="lgFormGroupInput" placeholder="rating_quantity" name="rating_quantity" value="{{$task->rating_quantity}}" readonly>
                              </div>
                            </div>
                            <div class="form-group row">
                               <input name="_method" type="hidden" value="PATCH">
                              <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Effort</i></label>
                              <div class="col-sm-6">
                                <input type="number" min="0" max="5" step="1" pattern="[1-5]"class="form-control form-control-lg" id="lgFormGroupInput" placeholder="rating_effort" name="rating_effort" value="{{$task->rating_effort}}" readonly>
                              </div>
                            </div>

                            <div class="form-group row">
                               <input name="_method" type="hidden" value="PATCH">
                              <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>Timeliness</i></label>
                              <div class="col-sm-6">
                                <input type="number" min="0" max="5" step="1" pattern="[1-5]"class="form-control form-control-lg" id="lgFormGroupInput" placeholder="rating_timeliness" name="rating_timeliness" value="{{$task->rating_timeliness}}" readonly>
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
   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection