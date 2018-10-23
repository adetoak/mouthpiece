<div class="form-group">
    <label><span class="fa fa-phone">&nbsp;</span> Telephone:</label>
    <input class="form-control" name="telephone" value="{{ $user->telephone }}" />            
</div>
<div class="form-group">
    <label><span class="fa fa-pencil">&nbsp;</span> Full Name:</label>
    <input class="form-control" name="fullname" value="{{ $user->full_name }}" />            
</div>
<div class="form-group">
    <label><span class="fa fa-user">&nbsp;</span> Username:</label>
    <input class="form-control" disabled="disabled" name="username" value="{{ $user->username }}" />            
</div>
<div class="form-group">
    <label><span class="fa fa-envelope">&nbsp;</span> Email:</label>
    <input class="form-control" disabled="disabled" name="email" value="{{ $user->email }}" />            
</div>
<div class="form-group">
    <label><span class="fa fa-pencil">&nbsp;</span> Country:</label>
    <input class="form-control" name="country" value="{{ $user->country }}" />            
</div>
<div class="form-group">
    <label><span class="fa fa-pencil">&nbsp;</span> State:</label>
    <input class="form-control" name="state" value="{{ $user->state }}" />            
</div>
<div class="form-group">
    <label><span class="fa fa-pencil">&nbsp;</span> City:</label>
    <input class="form-control" name="city" value="{{ $user->city }}" />            
</div>
<div class="form-group text-right">    
    <button type="submit" class="btn btn-primary">Update</button>            
</div>
