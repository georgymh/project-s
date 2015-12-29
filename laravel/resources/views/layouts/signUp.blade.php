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

    <title>Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

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
          <form class="navbar-form navbar-right">
           
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

        <h1 style="padding-top: 100px; text-align: center">Create Your Schedulezilla Account</h1>
        <hr>
           <!-- Registration form - START -->
          <div class="container" id="sign-up-form">
              <div class="col-md-6 col-md-offset-3" style="background-color: #e6e6e6; padding: 25px">
                      <form role="form">
                          <div class="col-lg-8">
                              <div class="form-group">
                                  <label for="InputName">Name</label>
                                  <div class="input-group">
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="InputName" id="InputName" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Last Name" required>
                                    </div>
                                    </div>
                                  </div>
                              
                              <div class="form-group">
                                  <label for="InputName">Username</label>
                                  <div class="input-group">
                                      <div class="col-md-12">
                                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Username" required>
                                      </div>
                                    </div>
                                  </div>
                               <div class="form-group">
                                  <label for="InputName">School</label>
                                  <div class="input-group">
                                      <div class="col-md-12">
                                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="School name" required>
                                      </div>
                                    </div>
                                  </div>
                              <div class="form-group">
                                  <label for="InputName">Create a password</label>
                                  <div class="input-group">
                                      <div class="col-md-12">
                                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="" required>
                                      </div>
                                    </div>
                                  </div>
                              <div class="form-group">
                                  <label for="InputName">Confirm your password</label>
                                  <div class="input-group">
                                      <div class="col-md-12">
                                        <input type="text" class="form-control" name="InputName" id="InputName" placeholder="" required>
                                      </div>
                                    </div>
                                  </div>
                              <div class="form-group">
                                  <label for="InputEmail">Enter Email</label>
                                  <div class="input-group">
                                    <div class="col-md-12">
                                      <input type="email" class="form-control" id="InputEmailFirst" name="InputEmail" placeholder="Enter Email" required>
                                    </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="InputEmail">Confirm Email</label>
                                  <div class="input-group">
                                    <div class="col-md-12">
                                      <input type="email" class="form-control" id="InputEmailSecond" name="InputEmail" placeholder="Confirm Email" required>
                                    </div>
                                  </div>
                              </div>
                            <div>
                               <a href="{{ URL('/signUp/validate') }}" button type="submit" class="btn btn-info pull-right">Sign up</a>
                              <!-- <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right"> -->
                            </div>
                          </div>
                        </div>
                      </form>
              </div>
          </div>
          <!-- Registration form - END -->

      <hr>

      <footer>
        <p>&copy; 2015 Schedulezilla, Inc.</p>
      </footer>
    </div> <!-- /container -->


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
