<input type="hidden" name="jobid" value="{{ str_shuffle('0123456789') }}">
<div class="form-group">
  	<label><span class="fui-windows">&nbsp;</span> Describe the service you're looking to purchase - please be as detailed as possible:</label>
		<textarea class="form-control" name="description" rows="3"></textarea>            
</div>
<div class="form-group">
  	<label><span class="fa fa-list-alt">&nbsp;</span> Choose a category:</label>
  	<select data-toggle="select" name="category" class="form-control select-default select-lg">
      <optgroup label="Profile">
        <option value="0">My Profile</option>
        <option value="1">My Friends</option>
      </optgroup>
      <optgroup label="System">
        <option value="2">Messages</option>
        <option value="3">My Settings</option>
        <option value="4" class="highlighted">Logout</option>
      </optgroup>
    </select>
</div>
<div class="form-group">
  	<label>
  		<span class="fui-time">&nbsp;</span> Once you place your order, when would you like your service delivered?
  	</label>
  	<input type="text" class="form-control" name="duration" placeholder="Duration of service delivery">
</div>
<div class="form-group">
  	<label><span class="fui-credit-card">&nbsp;</span> What is your budget for this service?</label>
  	<div class="input-group">
      <span class="input-group-addon">&#8358;</span>
      <input type="text" name="price" class="form-control">
      <span class="input-group-addon">.00</span>
    </div>
</div>
<div class="form-group">
  <label><span class="fui-star">&nbsp;</span> Requirement:</label>
  <textarea name="requirement" class="form-control" rows="3"></textarea>            
</div>
<div class="form-group">
  	<label for="exampleInputFile">
  		<span class="fui-clip">&nbsp;</span> Attach Files
  	</label>
  	<input type="file" name="jobimg" id="exampleInputFile">
  	<p class="help-block">Max size:10mb</p>
</div>						            
<button type="submit" class="btn btn-primary">Submit</button>