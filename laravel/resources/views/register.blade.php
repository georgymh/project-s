@extends('layouts.main')

@section('content')
<h1 style="padding-top: 100px; text-align: center">Create Your Schedulezilla Account</h1>
        <hr>

        @if ($errors->any())
                 <div class="col-md-4 col-md-offset-4">
                  <ul class="alert alert-danger" >
                    @foreach ($errors->all() as $error)
                      <li> {{$error}} </li>
                    @endforeach
                  </ul>
                </div>
                @endif
           <!-- Registration form - START -->
          <div class="container" id="sign-up-form">
              <div class="col-md-6 col-md-offset-3" style="background-color: #e6e6e6; padding: 25px">

              {!! Form::open(['url' => '/signUp'  ]) !!}

                      
                          <div class="col-lg-8">
                              <div class="form-group">
                                  <label for="InputName">Name</label>
                                  <div class="input-group">

                                    <div class="col-md-6" id="first-name-initial">
                                      {!! Form::text('firstName', NULL, array('placeholder' => 'First Name', 'class' => 'form-control', 'id' => 'firstName')) !!}
                                    </div>

                                    <div class="col-md-6">
                                        {!! Form::text('lastName', NULL, array('placeholder' => 'Last Name', 'class' => 'form-control', 'id' => 'lastName')) !!}
                                    </div>
                                    </div>
                                  </div>
                              
                              <div class="form-group">
                                  <label for="InputName">Username</label>
                                  <div class="input-group">
                                      <div class="col-md-12">
                                         {!! Form::text('username', NULL, array('placeholder' => 'Enter Username', 'class' => 'form-control')) !!}
                                      </div>
                                    </div>
                                  </div>
                               <div class="form-group">
                                  <label for="InputName">School</label>
                                  <div class="input-group">
                                      <div class="col-md-12">
                                         {!! Form::text('school', NULL, array('placeholder' => 'School Name', 'class' => 'form-control')) !!}
                                      </div>
                                    </div>
                                  </div>
                              <div class="form-group">
                                  <label for="InputName">Create a password</label>
                                  <div class="input-group">
                                      <div class="col-md-12">
                                         {!! Form::password('password', array('class' => 'form-control', 'id' => 'passwordInitial')) !!}
                                      </div>
                                    </div>
                                  </div>
                              <div class="form-group">
                                  <label for="InputName">Confirm your password</label>
                                  <div class="input-group">
                                      <div class="col-md-12">
                                        {!! Form::password('password_confirmation', array('class' => 'form-control', 'id' => 'passwordInitial')) !!}
                                      </div>
                                    </div>
                                  </div>
                              <div class="form-group">
                                  <label for="InputEmail">Enter Email</label>
                                  <div class="input-group">
                                    <div class="col-md-12">
                                     {!! Form::text('email', NULL, array('placeholder' => 'Enter Email', 'class' => 'form-control')) !!}
                                    </div>
                                  </div>
                              </div>
                            <div>
                                  
                                  {!! Form::submit('Sign Up', array('class' => 'btn btn-info pull-right', 'id' => 'submit-signUp')) !!}
                            </div>
                          </div>
                        </div>
                  
                 {!! Form::close() !!}

                  

                   </div>
          </div>

    @stop







