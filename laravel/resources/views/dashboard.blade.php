@extends('layouts.main')

@section('content')


    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL('/') }}">Schedulezilla</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          {!! Form::open(['class' => 'text-right', 'style' => 'padding-top: 5px']) !!}
             <a href="{{ URL('/destroyToken') }}" button type="submit" class="btn btn-primary">Logout</a>
          {!! Form::close() !!}
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
   
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" style="padding-top: 3.67em" id="dashboard-nav">
          <ul class="nav nav-sidebar" id="dashboard-sidebar">
            <li id="dashboard-li-active"><a href="#">Dashboard</a></li>
            <li id="dashboard-li"><a href="#">Reports</a></li>
            <li id="dashboard-li"><a href="#">Analytics</a></li>
            <li id="dashboard-li"><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar" id="dashboard-sidebar">
            <li id="dashboard-li"><a href="">Nav item</a></li>
            <li id="dashboard-li"><a href="">Nav item again</a></li>
            <li id="dashboard-li"><a href="">One more nav</a></li>
            <li id="dashboard-li"><a href="">Another nav item</a></li>
            <li id="dashboard-li"><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar" id="dashboard-sidebar">
            <li id="dashboard-li"><a href="">Nav item again</a></li>
            <li id="dashboard-li"><a href="">One more nav</a></li>
            <li id="dashboard-li"><a href="">Another nav item</a></li>
          </ul>
      </div>

        <div>
            <h1 class="col-md-3 col-md-offset-3" style="padding-top:4em">Welcome {{{isset(Auth::user()->first_name) ? Auth::user()->first_name : NULL}}}!</h1>
        </div>

    </div>

@stop