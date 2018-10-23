<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>
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
                <div class="logins" style="padding: 10px 50px">
                    <div class=" clearpadding">
                        <div class="">
                            <div class="imgholder text-center">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('public/img/mouthpiece.png') }}" class="img-responsive">            
                                </a>
                            </div>
                            <p></p>
                            <div class="text-right">
                                <h5>Status: {{ $invoice->remark }}</h5>
                            </div>
                            <div class="well">
                                #{{ $invoice->order_id }}<br>
                                {{ date_format(date_create($invoice->icreatedat), 'Y-m-d -- h:i:s A') }}
                            </div>                
                            <div class="">
                                <strong>Invoiced To: {{ $invoice->username}}</strong><br>
                                <strong>Full Name:</strong> {{ $invoice->full_name }}
                            <p>
                                <strong>Email:</strong> {{ $invoice->email }}<br>
                            </p>
                            </div>
                            @if ($reference == 'services')
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                  <th class="text-left">Description</th>
                                                  <th class="text-center">Delivery Time</th>
                                                  <th class="text-center">Price</th>
                                                  <th class="text-center">Total</th>                                          
                                                </tr>
                                            </thead>
                                            <tbody>     
                                            @foreach ($orders as $order)                                                
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="media">
                                                          <div class="media-left pull-left">
                                                            @if ($reference == 'services')
                                                            <a href="#">
                                                              <img src="{{ asset('public/img/services/service-'.$order->sid.'/'.$order->image_path)}}" alt="{{ $order->title }}" class="img-circle img-responsive myProducts">
                                                            </a>
                                                            @else
                                                            <a href="#">
                                                              <img src="{{ asset('public/img/products/product-'.$order->pid.'/'.$order->image_path)}}" alt="{{ $order->title }}" class="img-circle img-responsive myProducts">
                                                            </a>
                                                            @endif
                                                          </div>
                                                          <div class="media-body">
                                                            <h6 class="media-heading">{{ $order->title }}</h6>
                                                          </div>
                                                        </div>                                                  
                                                    </td>
                                                    <td class="text-center">{{ $order->duration }}</td>
                                                    <td class="text-center">&#8358;{{  number_format($order->price) }}</td>
                                                    <td class="text-center">&#8358;{{ number_format($order->price) }}</td>         
                                                </tr>
                                                @endforeach  
                                                 <tr>
                                                    <td></td>                                                   
                                                    <td></td>
                                                    <td><strong>Total:</strong> </td>
                                                    <td><strong>&#8358;{{ number_format($sumorders,2, '.', ',')}}</strong></td>                       
                                                </tr>  
                                                 <tr>                                                    
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <!-- <button class="btn btn-primary">Pay</button> -->
                                                        <div class="form-group">                                        
                                                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" role="form">        
                                                              {{ csrf_field() }}   
                                                              <input type="hidden" name="email" value="{{ $email = isset($user->id)?$user->email:'admin@mouthpiece.ng' }}"> 
                                                              <input type="hidden" name="orderID" value="345">                          <input type="hidden" name="amount" value="{{ $sumorders*100 }}">                      
                                                              <?php $userid = isset($user->id)?$user->id:0; $refid= $invoice->order_id; $price = $sumorders; ?>
                                                              <input type="hidden" name="quantity" value="3">
                                                              <input type="hidden" name="metadata" value="{{ json_encode($array = ['userid' => $userid,'reference' => 'services','amount' => $price,'ref_id' => $refid,'paymentmethod' => 'Paystack',]) }}" > 
                                                              <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
                                                              <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> 


                                                              <div class="form-group text-left">
                                                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                                                Pay
                                                                </button>
                                                              </div>          
                                                            </form>                                 
                                                        </div>
                                                    </td>                      
                                                </tr>                                                                             
                                            </tbody>                                    
                                        </table>
                                    </div>                               
                                </div>  
                            @else
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                  <th class="text-left">Description</th>
                                                  <th class="text-left">Seller</th>
                                                  <th class="text-center">Unit Price</th>
                                                  <th class="text-center">Quantity</th>
                                                  <th class="text-center">Total</th>                                          
                                                </tr>
                                            </thead>
                                            <tbody>                                     
                                                @foreach ($orders as $order)                                          
                                                <tr>
                                                    <td class="text-center">
                                                        <div class="media">
                                                          <div class="media-left pull-left">
                                                            <a href="{{ url('product/') }}">
                                                              <img src="{{ asset('public/img/products/product-'.$order->product_id.'/'.$order->image_path)}}" alt="{{ $order->title }}" class="img-circle img-responsive myProducts">
                                                            </a>
                                                          </div>
                                                          <div class="media-body">
                                                            <h6 class="media-heading">{{ $order->ptitle }}</h6>
                                                          </div>
                                                        </div>                                                  
                                                    </td>
                                                    <td>{{ $order->susername }}</td>
                                                    <td class="text-center">&#8358;{{ number_format($order->pprice) }}</td>
                                                    <td class="text-center">{{ $order->quantity }}</td>
                                                    <td class="text-center">&#8358;{{ number_format($order->pprice*$order->quantity) }}</td>   
                                                </tr>                                     
                                                @endforeach 
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><strong>Total:</strong> </td>
                                                    <td><strong>&#8358;{{ number_format($sumorders,2, '.', ',')}}</strong></td>                       
                                                </tr>  
                                                 <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <!-- <button class="btn btn-primary">Pay</button> -->
                                                        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" role="form">        
                                                              {{ csrf_field() }}   
                                                              <input type="hidden" name="email" value="{{ $email = isset($user->id)?$user->email:'admin@mouthpiece.ng' }}"> 
                                                              <input type="hidden" name="orderID" value="345">                          <input type="hidden" name="amount" value="{{ $sumorders*100 }}">                      
                                                              <?php $userid = isset($user->id)?$user->id:0; $refid= $invoice->order_id; $price = $order->price; ?>
                                                              <input type="hidden" name="quantity" value="3">
                                                              <input type="hidden" name="metadata" value="{{ json_encode($array = ['userid' => $userid,'reference' => 'products','amount' => $sumorders,'ref_id' => $refid,'paymentmethod' => 'Paystack',]) }}" > 
                                                              <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
                                                              <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> 


                                                              <div class="form-group text-left">
                                                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                                                Pay
                                                                </button>
                                                              </div>          
                                                            </form>
                                                    </td>                      
                                                </tr>                                        
                                            </tbody>                                    
                                        </table>
                                    </div>                               
                                </div>                            
                            @endif
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
    
</body>
</html>
