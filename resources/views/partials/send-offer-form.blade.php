<input type="hidden" name="jobid" value="{{ str_shuffle('0123456789') }}">
<div class="form-group">
  	<label>
  		<span class="fui-time">&nbsp;</span> Estimated Service Timeline
  	</label>
  	<input type="text" class="form-control" name="duration" placeholder="Duration of service delivery">
</div>
<div class="form-group">
  	<label><span class="fui-credit-card">&nbsp;</span> Your Cost?</label>
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