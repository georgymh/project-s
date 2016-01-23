@extends('layouts.dashboardMain')

@section('content')

   
    
        <div class="col-sm-3 col-md-2 sidebar" style="padding-top: 3.67em; position: fixed" id="dashboard-nav">
          <ul class="nav nav-sidebar" id="dashboard-sidebar">
            <li id="dashboard-li-active"><a href="#"><i class="fa fa-tachometer"> Dashboard</i></a></li>
            <li id="dashboard-li"><a href="#"><i class="fa fa-newspaper-o"> My Schedules</i></a></li>
            <li id="dashboard-li"><a href="#"><i class="fa fa-wrench"> Create a schedule</i></a></li>
            <li id="dashboard-li"><a href="#"><i class="fa fa-cogs"> Settings</i></a></li>
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
          <ul class="nav nav-sidebar" id="dashboard-sidebar">
            <li id="dashboard-li"><a href="">Nav item again</a></li>
            <li id="dashboard-li"><a href="">One more nav</a></li>
            <li id="dashboard-li"><a href="">Another nav item</a></li>
          </ul>

      </div>
        <div>
            <h1 class="col-md-3 col-md-offset-5" style="padding-top:4em">Welcome {{{isset(Auth::user()->first_name) ? Auth::user()->first_name : NULL}}}!</h1>
        </div>

    </div>


@stop