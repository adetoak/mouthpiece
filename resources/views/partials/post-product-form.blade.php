<input type="hidden" name="productid" value="{{ str_shuffle('0123456789') }}">
<div class="form-group">
	<label><span class="fui-windows">&nbsp;</span> Product title:</label>
	<textarea class="form-control" name="title" rows="3" value="{{ old('title') }}" required autofocus></textarea>    
	<p class="help-block">
        <strong>{{ $errors->first('title') }}</strong>
    </p>        
</div>
<div class="form-group">
	<label><span class="fa fa-list-alt">&nbsp;</span> Choose a category:</label>
	<select data-toggle="select" name="category" value="{{ old('category') }}" required class="form-control select-default select-lg">
		@foreach($categorys as $category)		
			<option value="{{ $category->id }}">{{ $category->title }}</option>					
		@endforeach
	</select>
	<p class="help-block">
        <strong>{{ $errors->first('category') }}</strong>
    </p>
</div>
<div class="form-group">
	<label><span class="fui-new">&nbsp;</span> Description:</label>
	<textarea class="form-control" name="description" value="{{ old('description') }}" required rows="5"></textarea>  
	<p class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
    </p>          
</div>
<div class="form-group">
	<label>
		<span class="fui-time">&nbsp;</span> Delivery Duration?
	</label>
	<input type="text" class="form-control" name="duration" value="{{ old('duration') }}" required placeholder="e.g 2 days">
	<p class="help-block">
        <strong>{{ $errors->first('duration') }}</strong>
    </p>
</div>
<div class="form-group">
	<label><span class="fui-credit-card">&nbsp;</span> Product Cost?</label>
	<div class="input-group">
		<span class="input-group-addon">&#8358;</span>
		<input type="text" name="price" value="{{ old('price') }}" required class="form-control">
		<span class="input-group-addon">.00</span>
		<p class="help-block">
	        <strong>{{ $errors->first('price') }}</strong>
	    </p>
	</div>
</div>
<div class="form-group">
	<label><span class="fui-star">&nbsp;</span> Quantity Available:</label>
	<input type="number" class="form-control" name="available" value="{{ old('available') }}" required>
	<p class="help-block">
        <strong>{{ $errors->first('available') }}</strong>
    </p>           
</div>
<div class="form-group">
	<label for="exampleInputFile">
		<span class="fui-clip">&nbsp;</span> Attach Files
	</label>
	<input type="file" name="productimg" id="exampleInputFile">
	<p class="help-block">Max size:10mb</p>
</div>						            
<button type="submit" class="btn btn-primary">Submit</button>
