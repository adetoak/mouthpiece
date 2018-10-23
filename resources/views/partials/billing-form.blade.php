<div class="form-group"> 
	<label class="control-label">Full Name*:</label>             
	<div class="form-group">			                                       
		<input type="text" name="fullname" placeholder="Full Name" value="{{ $user->full_name }}" class="form-control" required />	
		{{ $errors->first('fullname', '<p class="has-error">:message</p>') }}   
	</div>                              
</div>
<div class="form-group">
    <label class="control-label">Phone No*:</label>
    <div class="input-group">
        <span class="input-group-addon">+234</span>
        <input type="text" class="form-control" name="telephone" value="{{ $user->telephone }}" placeholder="phoneno">
        {{ $errors->first('phoneno', '<p class="has-error">:message</p>') }} 
    </div>
</div>							
<div class="form-group"> 
    <label class="control-label">Residency*:</label>             
    <div class="form-inline">                        
	    <input type="text" class="form-control" name="state" value="{{ $user->state }}" placeholder="state" /> 
	    {{ $errors->first('state', '<p class="has-error">:message</p>') }}   
		<input type="text"  class="form-control" name="city" value="{{ $user->city }}" placeholder="city" /> 
		{{ $errors->first('city', '<p class="has-error">:message</p>') }}   
	</div>                             
</div>                       
<div class="form-group">			                                       
	<input type="text" name="address" placeholder="Residential Address" value="{{ $user->address }}" class="form-control" required />	
	{{ $errors->first('address', '<p class="has-error">:message</p>') }}   
</div> 							
<div class="form-group">
	<button type="submit" class="btn btn-primary btn-large"> Submit </button> 			    	
</div>