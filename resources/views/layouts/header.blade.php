<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'MouthPiece.ng') }}
            </a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="sr-only">Toggle navigation</span>
            </button>                            
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <!-- nav-bar left -->                                
            </ul>            
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())                                        
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Buying <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('post-job') }}">Post a Job</a></li>
                            <li><a href="#">Manage Requests</a></li>                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Selling <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('services/post-service') }}">Post Service</a></li>
                            <li><a href="{{ url('job-offers') }}">Job Offers</a></li>
                            <li><a href="{{ url('products/post-product') }}">Post Product</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">profile</li>
                            <li><a href="{{ url('transactions') }}">My Orders</a></li>
                            <li><a href="{{ url('services/myservices') }}">My Services</a></li>
                            <li><a href="{{ url('products/myproducts') }}">My Products</a></li>
                        </ul>
                    </li>    
                    <li><a href="{{ url('cart') }}" class="fa fa-cart-plus icon"><span class="navbar-new" id="count-cart">X</span></a></li> 
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>    
                    <li><a href="{{ url('post-job') }}" class="btn btn-success post-job">Post a job</a></li>                                       
                    @else                                         
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Buying <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('post-job') }}">Post a Job</a></li>
                            <li><a href="#">Manage Requests</a></li>                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Selling <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('services/post-service') }}">Post Service</a></li>
                            <li><a href="{{ url('job-offers') }}">Job Offers</a></li>
                            <li><a href="{{ url('products/post-product') }}">Post Product</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Profile</li>
                            <li><a href="{{ url('transactions') }}">My Orders</a></li>
                            <li><a href="{{ url('services/myservices') }}">My Services</a></li>
                            <li><a href="{{ url('products/myproducts') }}">My Products</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('cart') }}" class="fa fa-cart-plus icon"><span class="navbar-new" id="count-cart">X</span></a></li> 
                    <li><a href="{{ route('register') }}"><span class="fa fa-bell icon"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="fa fa-user-circle icon">&nbsp;</span>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('dashboard') }}"><span class="fa fa-dashboard">&nbsp;</span> Dashboard</a></li>
                            <li><a href="{{ url('messages') }}"><span class="fa fa-envelope">&nbsp;</span> Messages</a></li>
                            <li><a href="{{ url('edit-profile') }}"><span class="fa fa-cog">&nbsp;</span> Edit Profile</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <span class="fa fa-power-off">&nbsp;</span> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>  
                    <li><a href="{{ url('post-job') }}" class="btn btn-success post-job">Post a job</a></li>
                    <li>                        
                        <!-- <div class="top_nav_right">
                            <div class="wthreecartaits wthreecartaits2 cart cart box_1">
                                <form action="#" method="post" class="last">
                                    <input type="hidden" name="cmd" value="_cart">
                                    <input type="hidden" name="display" value="1">
                                    <button class="w3view-cart" type="submit" name="submit" value="">
                                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>                         -->
                    </li>                  
                @endif
            </ul>          
        </div><!--/.nav-collapse -->
    </div>
    @if ($message = Session::get('payment_success'))
        <div class="alert alert-success text-center">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('payment_error'))
        <div class="alert alert-danger text-center">
            <p>{{ $message }}</p>
        </div>
    @endif  
</div>