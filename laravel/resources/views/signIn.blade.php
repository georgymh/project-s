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
            <a href="{{ URL('/signUp') }}" button type="submit" class="btn btn-primary">Sign up</a>
          {!! Form::close() !!}
        </div><!--/.navbar-collapse -->
      </div>
    </nav>




	  <div class="container">
	    <div class="col-md-4 col-md-offset-4" style="padding-top: 10em">
	     {!! Form::open(['class' => 'form-signin', 'style' => 'padding-top: 5px']) !!}
		        <h2 class="form-signin-heading" style="text-align: center">Please sign in</h2>
		        <label for="inputEmail" class="sr-only">Email address</label>
		        <br>
		        {!! Form::text('email', NULL, array('placeholder' => 'Email address', 'class' => 'form-control', 'id' => 'emailSignIn')) !!}
		        <br>
		        <label for="inputPassword" class="sr-only">Password</label>
		        {!! Form::text('password', NULL, array('placeholder' => 'Password', 'class' => 'form-control', 'id' => 'passwordSignIn')) !!}
		        <br>
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		 {!! Form::close() !!}
		</div>
	  </div>
	    @if ($errors->any())
		   	<div class="container" style="padding-top: 1em">
			  <div class="col-md-4 col-md-offset-4" >
			    <ul class="alert alert-danger" >
			      @foreach ($errors->all() as $error)
			        <li> {{$error}} </li>
			      @endforeach
			    </ul>
			  </div>
			 </div>
		@endif

@stop