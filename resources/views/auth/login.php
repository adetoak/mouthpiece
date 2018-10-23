@extends('layouts.app')
@section('content')
<div class="jumbotron auth">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6 login">
                <div class="page-header text-center">
                    <h3 class="text-center">LOG IN</h3>
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
                <form class="form-signin" method="post" action="{{ route('login') }}">
                    {{ csrf_field() }}                  
                    @if (Session::get('login_error'))                             
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{  Session::get('login_error') }}
                        </div>
                    @endif                         
                    <div class="form-group text-left">
                      <label class="control-label">Username*:</label>
                      <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                      {{ $errors->first('email', '<p class="has-error">:message</p>') }}            
                    </div>
                    <div class="form-group text-left">
                      <label class="control-label">Password*:</label>
                      <input id="password" type="password" placeholder="password" class="form-control" name="password" required>
                      {{ $errors->first('password', '<p class="has-error">:message</p>') }}
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">                                
                            <label class="checkbox" for="checkbox">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>                                
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <div class="control-label">
                           <button type="submit" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-circle-arrow-up">&nbsp;</span>Log in</button>
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                      <div class="control-label text-center">
                        <a href="{{ route('password.request') }}">Forgot password?</a> 
                      </div>
                    </div>        
                </form> 
            </div>                
            <div class="col-md-3">                
            </div>
        </div>
    </div>    
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
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
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                <div class="col-md-6">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon fui-user"></span>
                                        <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    </div>                                
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">                                
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon fui-lock"></span>
                                        <input id="password" type="password" placeholder="password" class="form-control" name="password" required>
                                    </div> 
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">                                
                                    <label class="checkbox" for="checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>                                
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4 text-left">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <span class="fa fa-sign-in">&nbsp;</span> Login
                                    </button>
                                    <a class="btn btn-primary" href="{{ url('auth/facebook') }}" id="btn-fblogin">
                                        <span class="fa fa-facebook">&nbsp;</span> Connect with Facebook
                                    </a>                                  
                                    <a class="btn login-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>                                            
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
@endsection
