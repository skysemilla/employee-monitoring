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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#88a097;">Template report</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('storeTemplate', [$report_id]) }}">
                        {{ csrf_field() }}
                          <div class="form-group" >
                            <label for="oldreport_id" class="col-md-4 control-label">Report ID to use</label>

                            <div class="col-md-6">
                                <input id="oldreport_id" type="number" class="form-control" name="oldreport_id" value="{{$report_id}}" required disabled>
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Duration</label>

                            <div class="col-md-6">

                                <select id="duration" type="number" name="duration" class="form-control" required>
                                    <option hidden >Choose here</option>
                                    <option value="1" selected>1st Semester</option>
                                    <option value="2">2nd Semester</option>
                                   
                                    
                                  </select>
                              <!--   <input id="isAdmin" type="number" class="form-control" name="isAdmin" value="{{ old('isAdmin') }}" required> -->

                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">Year</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control" name="year" value="{{ old('year') }}" required autofocus>

                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
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
