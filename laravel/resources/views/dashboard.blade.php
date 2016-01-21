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
	<h1 style="text-align: center; padding-top: 100px"> Welcome {{{ isset(Auth::user()->first_name) ? Auth::user()->first_name : Auth::user()->email}}}!</h1>


@stop