<!-- home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
  @if(\Session::has('error'))
    <div class="alert alert-danger">
      {{\Session::get('error')}}
    </div>
  @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                {{ Auth::user()->type }} 
                @if(Auth::user()->type == "admin")
                <div class="panel-body">
                    <a href="{{url('admin/home')}}">Admin</a>
                     
                </div>
                @elseif(Auth::user()->type=="permanent"||Auth::user()->type=="nonpermanent")
                    @if(Auth::user()->hasActiveReport==true)
                    <div class="panel-body">
                        <a href="{{url('employee/home')}}">Employee (Permanent/Nonpermanent)</a>
              
                    </div>
                    @else
                    <div class="panel-body">
                        <a href="{{url('employee/create-report')}}">Employee (Permanent/Nonpermanent)</a>
              
                    </div>
                    
                    @endif
                @elseif(Auth::user()->type=="supervisor")
                <div class="panel-body">
                    <a href="{{url('supervisor/home')}}">Supervisor</a>
          
                </div>
                @else
                <div class="panel-body">
                    <a href="{{url('headofoffice/home')}}">Head of Office</a>
          
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection