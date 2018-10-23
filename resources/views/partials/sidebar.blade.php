<div class="col-lg-3 sidebar hidden-xs"> 
  <div class="row">
    <div class="list-group">
    </div>    
    <!-- <div class="well">
      <div class="media">
        <div class="media-left pull-left">
            <a href="#">
              <img class="img-circle" data-src="holder.js/40x40" alt="...">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">Username</h4>
            <p>
              <strong>User Package:</strong> Free
            </p>
            <p>
              <strong>Rating:</strong> jewfuiuehwfu
            </p> 
        </div>
      </div>                                        
    </div> -->
  </div>
    <div class="row">                  
      <div class="list-group">
        <div class="panel-heading list-group-item active">
          <h3 class="panel-title list-group-item-heading">SHORTCUTS</h3>
        </div>
            <a class="list-group-item" role="button" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExamples">
             <span class="glyphicon glyphicon-home">&nbsp;</span> Home
            </a>
           <div class="collapse" id="collapseExample1">
            <a href="{{ url('dashboard')}}" data-toggle= "modal" class="list-group-item">
             <span class="glyphicon glyphicon-dashboard">&nbsp;</span> Dashboard
            </a>
            <a href="{{ url('edit-profile') }}" data-toggle= "modal" class="list-group-item">
             <span class="glyphicon glyphicon-cog">&nbsp;</span> Account Settings
            </a>           
            <a href="{{ url('verify-profile') }}" data-toggle= "modal" class="list-group-item">
             <span class="glyphicon glyphicon-ok">&nbsp;</span> Verify Profile
            </a>
            <a href="{{ url('upgrade-account') }}" data-toggle= "modal" class="list-group-item">
             <span class="glyphicon glyphicon-arrow-up">&nbsp;</span> Upgrade Account
            </a>
           </div>
          <a class="list-group-item" role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
           <span class="glyphicon glyphicon-th">&nbsp;</span> My services
          </a> 
          <div class="collapse" id="collapseExample2">
            <a href="{{ url('services/myservices')}}" data-toggle= "modal" class="list-group-item">
             <span class="glyphicon glyphicon-th-list">&nbsp;</span> My Services
            </a>           
            <a href="{{ url('services/post-service')}}" data-toggle= "modal" class="list-group-item">
             <span class="glyphicon glyphicon-plus-sign">&nbsp;</span> New Service
            </a>
          </div>  
          <a class="list-group-item" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
            <span class="glyphicon glyphicon-briefcase">&nbsp;</span> Transactions
          </a>  
          <div class="collapse" id="collapseExample3">               
            <a href="{{ url('service-orders') }}" class="list-group-item">
              <span class="glyphicon glyphicon-briefcase">&nbsp;</span> Service Orders
            </a>  
            <a href="{{ url('product-orders') }}" class="list-group-item stable">
              <span class="glyphicon glyphicon-tasks">&nbsp;</span> Product Orders
            </a>
            <!-- <a href="{{ url('payment-history') }}" class="list-group-item stable">
              <span class="glyphicon glyphicon-th-list">&nbsp;</span> Payment History
            </a> -->
          </div>
          <a class="list-group-item" role="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4">
            <span class="glyphicon glyphicon-shopping-cart">&nbsp;</span> Products
          </a>
          <div class="collapse" id="collapseExample4">
            <a href="{{ url('products/myproducts') }}" class="list-group-item stable">
              <span class="glyphicon glyphicon-th">&nbsp;</span> My Products
            </a>
            <a href="{{ url('products/post-product') }}" class="list-group-item stable">
              <span class="glyphicon glyphicon-plus-sign">&nbsp;</span> New Product
            </a>
          </div>                 
          <a href="{{ url('messages') }}" class="list-group-item">
            <span class="glyphicon glyphicon-envelope">&nbsp;</span> Messages
          </a>
      </div>
    </div>
    <div class="row">
      <div class="list-group">
        <div class="panel-heading list-group-item active">
          <h3 class="panel-title list-group-item-heading">CUSTOMER SUPPORT <span class="glyphicon glyphicon-question-sign">&nbsp;</span></h3>
        </div>
        <span class="list-group-item">
          <a href="#">Click for help &gt;&gt;</a>                        
        </span>
      </div>
    </div>
</div>
<div class="col-lg-3 visible-xs">
   <div class="btn-group btn-lg btn-block">
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
      Action
    <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="#"> <span class="glyphicon glyphicon-th">&nbsp;</span>My services</a></li>
      <li><a href="{{ ('fund-wallet') }}"> <span class="glyphicon glyphicon-briefcase">&nbsp;</span>Fund Wallet</a></li>
      <li><a href="#"> <span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Insured services</a></li>
      <li><a href="#"> <span class="glyphicon glyphicon-shopping-cart">&nbsp;</span>My Purchases</a></li>
      <li role="separator" class="divider"></li>
      <li><a href="{{ url('mybid442') }}"> <span class="glyphicon glyphicon-dashboard">&nbsp;</span>My Account</a></li>
      <li><a href="#"> <span class="glyphicon glyphicon-envelope">&nbsp;</span>Messages</a></li>
      <li><a href="#"> <span class="glyphicon glyphicon-wrench">&nbsp;</span>Edit Account</a></li>
    </ul>
  </div>  
</div>