<!-- home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
  @if(\Session::has('error'))
    <div class="alert alert-danger">
      {{\Session::get('error')}}
    </div>
  @endif
  @if (Auth::user()->status == "active" || Auth::user()->status == "NULL")
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Where to go?</b></div>
                <!-- {{ Auth::user()->type }}  -->
                @if(Auth::user()->type == "admin")
                <div class="panel-body">
                    <a href="{{url('admin/home')}}">Admin</a>
                     
                </div>
                @elseif(Auth::user()->type=="permanent"||Auth::user()->type=="nonpermanent")
                    @if(Auth::user()->hasActiveReport==true)
                    <div class="panel-body">
                        <a href="{{url('employee/home')}}">View active report</a>
              
                    </div>
                    @else
                    <div class="panel-body">
                        <a href="{{url('employee/create-report')}}">Create new report</a>
              
                    </div>
                    @endif
                    <div class="panel-body">
                        <a href="{{url('employee/all-reports')}}">View all reports</a>
              
                    </div>
                    <div class="panel-body">
                        <a href="{{url('employee/choose-template')}}">Use template report</a>
              
                    </div>
                @elseif(Auth::user()->type=="supervisor")
                    <div class="panel-body">
                        <a href="{{url('supervisor/home')}}">Reports for Approval</a>
              
                    </div>
                    <div class="panel-body">
                        <a href="{{url('supervisor/approved-reports')}}">View all approved reports</a>
              
                    </div>
                    @if(Auth::user()->hasActiveReport==false)
                    <div class="panel-body">
                        <a href="{{url('supervisor/create-report')}}">Create report</a>
                        
                    </div>
                    @else
                    <div class="panel-body">
                     <a onclick="myFunction()" href="#">Create report</a>
                    <script>
                    function myFunction() {
                    alert("You still have an active report.");
                    }
                    </script>   
                    </div>
                    @endif
                    <div class="panel-body">
                        <a href="{{url('supervisor/add-tasks')}}">Own ongoing report</a>
                    </div>
                @else
                <div class="panel-body">
                    <a href="{{url('headofoffice/home')}}">Reports for Assessment</a>
          
                </div>
                <div class="panel-body">
                        <a href="{{url('headofoffice/reports-for-approval')}}">Reports for Approval (for Supervisors)</a>
              
                </div>
                @endif
            </div>
        </div>
    </div>
    @else
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Where to go?</div>
                <div class="panel-body">
                    <h1>Please request for account activation.</h1>
                     
                </div>
                
            </div>
        </div>
    </div>
    @endif
</div>
@endsection