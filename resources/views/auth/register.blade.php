<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mouthpiece') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Titillium:300,400,600,700&amp;lang=en" />

    <!-- Styles -->
    <link href="{{ asset('public/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/css/font-awesome/css/font-awesome.min.css') }}">

    <!-- Loading Flat UI -->
    <link href="{{ asset('public/css/flat-ui.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('public/img/favicon.ico') }}">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">    
</head>
<body>          
    <div class="login-wrapper">
        <div class="container">
            <div class="row">
                <div class="logins">
                    <div class="col-md-6 clearpadding">
                        <div class="leftloginwrap">
                            <div class="imgholder text-center">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('public/img/mouthpiece.png') }}" class="img-responsive">            
                                </a>
                            </div>
                            <div class="page-header text-center">
                                <h5 class="text-center">CREATE ACCOUNT</h5>
                            </div> 
                            {{ csrf_field() }}         
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            @if ($message = Session::get('warning'))
                                <div class="alert alert-warning text-center">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            @if ($status = Session::get('status'))
                            <div class="alert alert-info">
                                {{ $status }}
                            </div>
                            @endif    
                            <form class="form-signin" method="post" action="{{ route('register') }}">
                                {{ csrf_field() }}                  
                                @if (Session::get('login_error'))                             
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        {{  Session::get('login_error') }}
                                    </div>
                                @endif                         
                                <div class="form-group text-left">
                                  <!-- <label class="control-label">Telephone*:</label> -->
                                    <div class="input-group">
                                      <div class="input-group-addon"><span class="fa fa-phone"></span></div>
                                      <input id="telephone" type="text" placeholder="Telephone" class="form-control" name="telephone" value="{{ old('telephone') }}" required autofocus>
                                      {{ $errors->first('telephone', '<p class="has-error">:message</p>') }}            
                                    </div>
                                </div>
                                <div class="form-group text-left">
                                    <!-- <label class="control-label">Username*:</label> -->
                                    <div class="input-group">
                                      <div class="input-group-addon"><span class="fa fa-user"></span></div>
                                      <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required>
                                      {{ $errors->first('username', '<p class="has-error">:message</p>') }}
                                    </div>
                                </div>
                                <div class="form-group text-left">
                                  <!-- <label class="control-label">Email:</label> -->
                                  <div class="input-group">
                                    <div class="input-group-addon"><span class="fa fa-envelope"></span></div>
                                      <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                      {{ $errors->first('email', '<p class="has-error">:message</p>') }}
                           
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group text-left">
                                      <!-- <label class="control-label">Password*:</label> -->
                                      <div class="input-group">
                                        <div class="input-group-addon"><span class="fa fa-lock"></span></div>
                                        <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required autofocus>
                                        {{ $errors->first('password', '<p class="has-error">:message</p>') }}
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group text-left">
                                      <!-- <label class="control-label">Confirm Password*:</label> -->
                                      <div class="input-group">
                                        <div class="input-group-addon"><span class="fa fa-lock"></span></div>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required autofocus>
                                        {{ $errors->first('password_confirmation', '<p class="has-error">:message</p>') }}
                                      </div>
                                    </div>                                                                  
                                  </div>
                                  
                                </div>
                                <div class="form-group form-group-lg">
                                    <div class="control-label">
                                       <button type="submit" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-circle-arrow-up">&nbsp;</span>Sign Up</button>
                                    </div>
                                </div>
                                <div class="form-group form-group-lg">
                                  <div class="control-label text-center">
                                    Already have an account? &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="{{ route('login') }}">Log in</a> 
                                  </div>
                                </div>        
                            </form> 
                            <!-- <div class="form-group form-group-lg">
                                <div class="control-label">
                                   <a class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-circle-arrow-up">&nbsp;</span>Sign up</a>
                                </div>
                            </div> -->
                            
                        </div>
                    </div>                
                    <div class="col-md-6 clearpadding hidden-xs hidden-sm"> 
                        <div id="carousel-example-generics" class="carousel slide" data-ride="carousel">
                          <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generics" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generics" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generics" data-slide-to="2"></li>
                                <li data-target="#carousel-example-generics" data-slide-to="3"></li>
                                <li data-target="#carousel-example-generics" data-slide-to="4"></li>
                            </ol>

                              <!-- Wrapper for slides -->
                            <div class="carousel-inner" id="logincarousel" role="listbox">
                                <div class="item active">
                                  <img src="{{ asset('public/img/jumbotron.png') }}" class="img-responsive" alt="...">
                                  <div class="carousel-caption">
                                    
                                  </div>
                                </div>
                                <div class="item">
                                   <img src="{{ asset('public/img/jumbotron.png') }}" class="img-responsive" alt="...">
                                  <div class="carousel-caption">                        
                                  </div>
                                </div>
                                 <div class="item">
                                   <img src="{{ asset('public/img/jumbotron.png') }}" class="img-responsive" alt="...">
                                  <div class="carousel-caption">                        
                                  </div>
                                </div>
                                <div class="item">
                                   <img src="{{ asset('public/img/jumbotron.png') }}" class="img-responsive" alt="...">
                                  <div class="carousel-caption">                        
                                  </div>
                                </div>
                                <div class="item">
                                   <img src="{{ asset('public/img/jumbotron.png') }}" class="img-responsive" alt="...">
                                  <div class="carousel-caption">                        
                                  </div>
                                </div>
                                
                              </div>

                              <!-- Controls -->
                              <!-- <a class="left carousel-control" href="#carousel-example-generics" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#carousel-example-generics" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a> -->
                        </div>
                    </div>        
                </div>                
            </div>
        </div>
    </div>         
    <script src="http://code.jquery.com/jquery-1.8.3.min.js" ></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('public/js/vendor/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('public/js/flat-ui.min.js') }}"></script>

    <script src="{{ asset('public/js/application.js') }}"></script>
</body>
</html>
