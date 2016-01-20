<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


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
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

   
           <!-- Registration form - START -->
          <div class="container" id="sign-up-form">

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
                        
                 {!! Form::close() !!}
              </div>
          </div>

        <div class="container" style="position: relative; bottom: 0">
              <hr>
              <footer>
                <p>&copy; 2015 Schedulezilla, Inc.</p>
              </footer>
             </div>


            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
            <script src="/js/bootstrap.min.js"></script>
            <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
            <script src="js/ie10-viewport-bug-workaround.js"></script>
          </body>
        </html>