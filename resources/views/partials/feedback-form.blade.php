<input type="hidden" name="orderid" value="{{ $order->oid }}">
<div class="form-group">
  	<label><span class="fui-star">&nbsp;</span> Rating*:</label>
  	<select data-toggle="select" name="rating" class="form-control select-default select-lg">      
        <option value="-1">Select Rating</option>
        <option value="5">Excellent</option>     
        <option value="4">Very good</option>
        <option value="3">Good</option>
        <option value="2" class="highlighted">Poor</option>      
        <option value="1">Very Poor</option>
    </select>
</div>
<div class="form-group">
  <label><span class="fa fa-comment">&nbsp;</span> Leave a brief comment about the Order:</label>
  <textarea name="comment" class="form-control" rows="3"></textarea>            
</div>		
<p class="help-block">Max. of 100 words</p>				            
<button type="submit" class="btn btn-primary">Submit</button>