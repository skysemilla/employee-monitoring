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
                <div class="panel-body">
                    <a href="{{url('admin/home')}}">Admin</a>
                     
                </div>
                <div class="panel-body">
                    <a href="{{url('employee/home')}}">Employee (Permanent/Nonpermanent)</a>
          
                </div>
              
                <div class="panel-body">
                    <a href="{{url('supervisor/home')}}">Supervisor</a>
          
                </div>

                <div class="panel-body">
                    <a href="{{url('headofoffice/home')}}">Head of Office</a>
          
                </div>
            </div>
        </div>
    </div>
</div>
@endsection