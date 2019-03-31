@extends('layouts.app')

@section('content')
<script src="/js/table.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#88a097;">Add account</div>

                <div class="panel-body">
                    <form id="regForm" class="form-horizontal" method="POST" action="{{ route('register') }}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <!--  <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control" name="type" value="{{ old('type') }}" required autofocus>

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">

                                <select id="type" type="text" name="type" class="form-control" required>
                                    <option value="" hidden selected>Choose here</option>
                                    <option value="admin">Admin</option>
                                    <option value="headofoffice">Head of Office</option>
                                    <option value="nonpermanent">Non-permanent Employee</option>
                                    <option value="permanent">Permanent Employee</option>
                                    
                                    <option value="supervisor">Supervisor</option>
                                    
                                  </select>
                              <!--   <input id="isAdmin" type="number" class="form-control" name="isAdmin" value="{{ old('isAdmin') }}" required> -->

                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
          <!--           <div class="form-group">
                        <label for="seeAnotherField">Do You Want To See Another Field?</label>
                        <select class="form-control" id="seeAnotherField">
                              <option value="no">No Way.</option>
                              <option value="yes">Absolutely!</option>
                        </select>
                      </div> -->
                  <!--     <div class="form-group" id="otherFieldDiv">
                        <label class="col-md-4 control-label" for="otherField">Supervisor</label>
                            <div class="col-md-6">
                            <select name="supervisor_id" id="supervisor_id" type="number" class="form-control">
                                <option value="NULL" hidden selected>Choose supervisor</option>
                            @foreach($users as $user)
                                @if($user['type']=="supervisor" )
                                <option value="{{$user['id']}}"> {{$user['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                      </div> -->
                        <div class="form-group{{ $errors->has('supervisor_id') ? ' has-error' : '' }}" >
                        <label class="col-md-4 control-label" for="supervisor_id">Supervisor</label>
                            <div class="col-md-6">
                            <select name="supervisor_id" id="supervisor_id" type="number" class="form-control">
                                <option value="-1" hidden selected>Choose supervisor</option>
                            @foreach($users as $user)
                                @if($user['type']=="supervisor" )
                                <option value="{{$user['id']}}"> {{$user['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('supervisor_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('supervisor_id') }}</strong>
                                    </span>
                                @endif
                    </div>
                      </div>

                <!--        <script>
                            
                            function handleChange() {
                                 
                                 if (document.getElementById('type').options[document.getElementById('type').selectedIndex].value === 'admin'|| document.getElementById('type').options[document.getElementById('type').selectedIndex].value === 'head_of_office') {

                                      document.getElementById('functional_unit').disabled = true;
                                      document.getElementById('status').disabled = true;
                                 } else {
                                     document.getElementById('functional_unit').disabled = false;
                                     document.getElementById('status').disabled = false;
                                 }
                             }
                        
                            </script> -->
                        <div class="form-group{{ $errors->has('functional_unit') ? ' has-error' : '' }}">
                            <label for="functional_unit" class="col-md-4 control-label">Functional Unit</label>

                            <div class="col-md-6">
                                
                                
                                    <select id="functional_unit" type="text" name="functional_unit" class="form-control" >
                              
                                    
                                    <option value="NULL" selected hidden>Choose here</option>
                                    <option value="f1">Functional Unit 1</option>
                                    <option value="f2">Functional Unit 2</option>
                                    <option value="f3">Functional Unit 3</option>
                                    
                                    
                                  </select>
                              <!--   <input id="isAdmin" type="number" class="form-control" name="isAdmin" value="{{ old('isAdmin') }}" required> -->

                                @if ($errors->has('functional_unit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('functional_unit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select id="status" type="text" name="status" class="form-control">
                                    <option value="NULL" selected hidden>Choose here</option>
                                    <option value="active" >Active</option>
                                    <option value="inactive">Not Active</option>
                                    
                                    
                                    
                                  </select>
                              <!--   <input id="isAdmin" type="number" class="form-control" name="isAdmin" value="{{ old('isAdmin') }}" required> -->

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
@endsection
