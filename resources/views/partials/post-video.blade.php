<input type="hidden" name="serviceid" value="{{ $id }}">
<div class="form-group">
  	<label>
  		<span class="fui-windows">&nbsp;</span> Title?
  	</label>
  	<input type="text" class="form-control" name="title" placeholder="Video title">
</div>
{{ $errors->first('title', '<p class="has-error">:message</p>') }} 
<div class="form-group">
  	<label for="exampleInputFile">
  		<span class="fui-clip">&nbsp;</span> Attach Video
  	</label>
  	<input type="file" name="jvideo" id="exampleInputFile">
  	<p class="help-block">Max size:10mb</p>
</div>	
{{ $errors->first('jvideo', '<p class="has-error">:message</p>') }} 					            
<button type="submit" class="btn btn-primary">Submit</button>